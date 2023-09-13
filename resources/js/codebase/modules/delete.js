import Swal from "sweetalert2";
import axios from "axios";

const btnHapus = document.querySelectorAll(".hapus");

btnHapus.forEach((el) => {
  el.addEventListener("click", (e) => {
    // get data-id
    const id = el.dataset.id;
    const url = el.dataset.url;
    console.log(url + "/" + id);
    Swal.fire({
      title: "Yakin?",
      text: "Data yang dihapus tidak bisa dikembalikan!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yakin!",
      cancelButtonText: "Batal",
    }).then((result) => {
      if (result.isConfirmed) {
        axios.delete(url + "/" + id);
        Swal.fire("Data berhasil dihapus!", "", "success");
        location.reload();
      }
    });
  });
});
