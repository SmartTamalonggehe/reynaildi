import getDataSurat from "../../data/getDataSurat";

const bulan_tipe_lap = document.getElementById("bulan_tipe_lap");
const tahun_tipe_lap = document.getElementById("tahun_tipe_lap");
const tipeSurat = document.querySelectorAll(
  'input[type="radio"][name="radio_tipe_lap"]'
);

const cetak_lap = document.getElementById("cetak_lap");

let bulan = "";
let tahun = "";
let tipe = "";

async function filterData({ bulan, tahun, tipe }) {
  const data = await getDataSurat();
  // Bulan dan tahun yang digunakan untuk filter
  const tahunFilter = parseInt(tahun) || ""; // Ganti dengan tahun yang Anda inginkan, atau biarkan kosong
  const bulanFilter = parseInt(bulan) || ""; // Ganti dengan bulan yang Anda inginkan (1 untuk Januari, 2 untuk Februari, dan seterusnya), atau biarkan kosong
  // Melakukan filter berdasarkan bulan dan tahun jika filter tidak kosong
  const dataFilter = data.filter((item) => {
    const tglSurat = new Date(item.tgl_surat);
    const tahunSesuai =
      tahunFilter === "" || tglSurat.getFullYear() === tahunFilter;
    const bulanSesuai =
      bulanFilter === "" || tglSurat.getMonth() + 1 === bulanFilter;
    const tipeSesuai = tipe === "" || item.tipe === tipe;

    return tahunSesuai && bulanSesuai && tipeSesuai;
  });
  lapSurat(dataFilter);
  // add atribute href in cetak_lap
  cetak_lap.setAttribute(
    "href",
    `/laporan/pdf/surat?bulan=${bulan}&tahun=${tahun}&tipe=${tipe}`
  );
  return dataFilter;
}

function init() {
  filterData({ bulan, tahun, tipe });
  tipeSurat.forEach((radioGroup) => {
    // menangkap perubahan
    radioGroup.addEventListener("change", (event) => {
      const selectedValue = event.target.value;
      tipe = selectedValue;
      filterData({ bulan, tahun, tipe });
    });
  });

  bulan_tipe_lap.addEventListener("change", (e) => {
    bulan = e.target.value;
    filterData({ bulan, tahun, tipe });
  });

  tahun_tipe_lap.addEventListener("change", (e) => {
    tahun = e.target.value;
    filterData({ bulan, tahun, tipe });
  });
}

function lapSurat(data) {
  const tujuan = document.getElementById("tujuan");
  switch (tipe) {
    case "Surat Masuk":
      tujuan.innerText = "Dari";
      break;
    case "Surat Keluar":
      tujuan.innerText = "Ke";
      break;
    default:
      tujuan.innerText = "Dari/Ke";
      break;
  }
  console.log({ data });
  const table_lap = document.getElementById("table_lap");
  let rows = "";
  data.forEach((item, index) => {
    rows += `<tr>
      <td class="text-center">${index + 1}</td>
      <td>${item.jenis}</td>
      <td>${item.no_surat}</td>
      <td>${item.tgl_surat}</td>
      <td>${item.hal}</td>
      <td>${item.dari_ke}</td>
      ${tipe === "" ? `<td class="text-center">${item.tipe}</td>` : ``}
    </tr>`;
  });
  table_lap.innerHTML = rows;
}

if (bulan_tipe_lap && tahun_tipe_lap && tipeSurat) {
  init();
}
