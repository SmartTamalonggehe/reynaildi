const location = window.location;
const queryString = location.search;
const urlParams = new URLSearchParams(queryString);

const tipeSurat = document.querySelectorAll(
  'input[type="radio"][name="tipe_surat"]'
);

const tujuan = document.getElementById("tujuan_surat");

if (tipeSurat) {
  const tipe = urlParams.get("tipe");
  tipeSurat.forEach((radioGroup) => {
    // menangkap perubahan
    radioGroup.addEventListener("change", (event) => {
      const selectedValue = event.target.value;
      const { pathname } = location;
      // Lakukan tindakan lain sesuai dengan nilai yang dipilih
      window.location.href = `${pathname}?tipe=${selectedValue}`;
    });
    // get value
    const { value } = radioGroup;
    // checked if value is tipe
    if (tipe === value) {
      radioGroup.checked = true;
    }
    console.log({ value, tujuan });
    // change text tujuan ke tipe
    if (tipe === "Surat Masuk") {
      tujuan.innerText = "Dari";
    } else if (tipe === "Surat Keluar") {
      tujuan.innerText = "Ke";
    }
  });
}

// create surat
const tipe = document.querySelectorAll('input[type="radio"][name="tipe"]');
if (tipe) {
  const label_dari_ke = document.querySelector("label[for='val-dari_ke']");
  const val_dari_ke = document.getElementById("val-dari_ke");
  tipe.forEach((radioGroup) => {
    // menangkap perubahan
    radioGroup.addEventListener("change", (event) => {
      const selectedValue = event.target.value;
      console.log({ selectedValue });
      // change text label_dari_ke ke tipe
      if (selectedValue === "Surat Masuk") {
        label_dari_ke.innerText = "Dari";
        // add placeholder ke val_dari_ke
        val_dari_ke.placeholder = "Masukan Dari...";
      } else if (selectedValue === "Surat Keluar") {
        label_dari_ke.innerText = "Ke";
        val_dari_ke.placeholder = "Masukan Ke...";
      }
    });
  });
}
