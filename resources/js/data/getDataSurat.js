import axios from "axios";

function getDataSurat() {
  return axios
    .get("/api/surat")
    .then((res) => {
      return res.data;
    })
    .catch((err) => {
      console.log(err);
    });
}
export default getDataSurat;
