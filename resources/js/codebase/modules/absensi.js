console.log("absensi");
import axios from "axios";
const tgl_absen = document.getElementById("tgl_absen");
// 2023-07-02
// get params tgl_absen from params url
const location = window.location;
const queryString = location.search;
const urlParams = new URLSearchParams(queryString);

// when tgl_absen is changed, go to link absensi?tgl_absen
if (tgl_absen) {
  tgl_absen.addEventListener("change", (e) => {
    const { pathname } = location;
    console.log(tgl_absen.value);
    console.log({ pathname });
    // window.location.href = "/admin/absensi?tgl_absen=" + tgl_absen.value;
    window.location.href = `${pathname}?tgl_absen=${tgl_absen.value}`;
  });

  const tgl_params = urlParams.get("tgl_absen");
  // set tgl_absen to tgl_params
  tgl_absen.value = tgl_params;
}

// simpan absensi
const simpan_absen = document.querySelectorAll(".simpan_absen");

simpan_absen.forEach((el) => {
  el.addEventListener("click", (e) => {
    // get data-id
    const personal_id = el.dataset.personal_id;
    const url = el.dataset.url;
    // ambil value dari jam_masuk, jam_pulang dan keterangan
    const jam_masuk = document.getElementById(`jam_masuk_${personal_id}`).value;
    const jam_pulang = document.getElementById(
      `jam_pulang_${personal_id}`
    ).value;
    const keterangan = document.getElementById(
      `keterangan_${personal_id}`
    ).value;
    // if jam_masuk empty show error
    if (!jam_masuk) {
      // remove class d-none
      document
        .getElementById(`jam_masuk_error_${personal_id}`)
        .classList.remove("d-none");
      return false;
    } else {
      // add class d-none
      document
        .getElementById(`jam_masuk_error_${personal_id}`)
        .classList.add("d-none");
    }
    // if jam_pulang empty show error
    if (!jam_pulang) {
      // remove class d-none
      document
        .getElementById(`jam_pulang_error_${personal_id}`)
        .classList.remove("d-none");
      return false;
    } else {
      // add class d-none
      document
        .getElementById(`jam_pulang_error_${personal_id}`)
        .classList.add("d-none");
    }
    // if keterangan empty show error
    if (!keterangan) {
      // remove class d-none
      document
        .getElementById(`keterangan_error_${personal_id}`)
        .classList.remove("d-none");
      return false;
    } else {
      // add class d-none
      document
        .getElementById(`keterangan_error_${personal_id}`)
        .classList.add("d-none");
    }
    // call simpan data absensi
    simpanData(jam_masuk, jam_pulang, keterangan, personal_id);
  });
});

const simpanData = (jam_masuk, jam_pulang, keterangan, personal_id) => {
  console.log({ jam_masuk, jam_pulang, keterangan, personal_id });
  // save data absensi to database with axios
  axios
    .post("/api/absensi", {
      jam_masuk,
      jam_pulang,
      keterangan,
      personal_id,
      tgl_absen: tgl_absen.value,
    })
    .then((res) => {
      // reload page
      window.location.reload();
    });
};
