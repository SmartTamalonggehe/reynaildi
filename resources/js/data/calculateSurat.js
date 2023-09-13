import getDataSurat from "./getDataSurat";

async function dateFilter({ bulan, tahun }) {
  const data = await getDataSurat();
  // Bulan dan tahun yang digunakan untuk filter
  const tahunFilter = parseInt(tahun) || ""; // Ganti dengan tahun yang Anda inginkan, atau biarkan kosong
  const bulanFilter = parseInt(bulan) || ""; // Ganti dengan bulan yang Anda inginkan (1 untuk Januari, 2 untuk Februari, dan seterusnya), atau biarkan kosong
  // Melakukan filter berdasarkan bulan dan tahun jika filter tidak kosong
  const dataTerkaitBulanTahun = data.filter((item) => {
    const tglSurat = new Date(item.tgl_surat);
    const tahunSesuai =
      tahunFilter === "" || tglSurat.getFullYear() === tahunFilter;
    const bulanSesuai =
      bulanFilter === "" || tglSurat.getMonth() + 1 === bulanFilter;

    return tahunSesuai && bulanSesuai;
  });
  return dataTerkaitBulanTahun;
}

async function groupByTipe({ bulan, tahun }) {
  const hasilTipe = {};
  const dataTerkaitBulanTahun = await dateFilter({ bulan, tahun });
  // mengelompokan data berdasarkan tipe
  dataTerkaitBulanTahun.forEach((obj) => {
    const tipe = obj.tipe;

    if (hasilTipe[tipe]) {
      hasilTipe[tipe].push(obj);
    } else {
      hasilTipe[tipe] = [obj];
    }
  });
  return hasilTipe;
}
// hitung by tipe
async function byTipe({ bulan, tahun }) {
  const hasilTipe = await groupByTipe({ bulan, tahun });
  // menghitung data berdasarkan tipe
  const jmlhData = [];

  for (const tipe in hasilTipe) {
    const jumlahData = hasilTipe[tipe].length;
    jmlhData.push({ tipe, jumlahData });
  }
  return jmlhData;

  // count data by tipe="Surat Masuk" dan tipe="Surat Keluar"
}
// hitung by jenis
async function byJenis({ bulan, tahun }) {
  const dataTerkaitBulanTahun = await dateFilter({ bulan, tahun });
  const jenisSurat = {};

  for (const item of dataTerkaitBulanTahun) {
    const { tipe, jenis } = item;

    if (!jenisSurat[jenis]) {
      jenisSurat[jenis] = {
        jumlah_surat_masuk: 0,
        jumlah_surat_keluar: 0,
      };
    }

    if (tipe === "Surat Masuk") {
      jenisSurat[jenis].jumlah_surat_masuk++;
    } else if (tipe === "Surat Keluar") {
      jenisSurat[jenis].jumlah_surat_keluar++;
    }
  }

  const hasil = [];

  for (const jenis in jenisSurat) {
    hasil.push({
      jenis: jenis,
      jumlah_surat_masuk: jenisSurat[jenis].jumlah_surat_masuk || 0,
      jumlah_surat_keluar: jenisSurat[jenis].jumlah_surat_keluar || 0,
    });
  }
  return hasil;
}

export { byTipe, byJenis };
