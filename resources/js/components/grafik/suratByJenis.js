import ApexCharts from "apexcharts";

import { byJenis } from "../../data/calculateSurat";
const bulan_jenis = document.getElementById("bulan_jenis");
const tahun_jenis = document.getElementById("tahun_jenis");

async function garfikByJenis({ bulan = "", tahun = "" }) {
  const grafik_by_jenis = document.getElementById("grafik-by-jenis");
  // mereset container grafik
  grafik_by_jenis.innerHTML = "";
  const dataJenis = await byJenis({ bulan, tahun });
  const categories = [];
  const surat_masuk = [];
  const surat_keluar = [];
  console.log({ dataJenis });
  dataJenis.forEach((item) => {
    categories.push(item.jenis);
    surat_masuk.push(item.jumlah_surat_masuk);
    surat_keluar.push(item.jumlah_surat_keluar);
  });

  var options = {
    series: [
      {
        name: "Surat Masuk",
        data: surat_masuk,
      },
      {
        name: "Surat Keluar",
        data: surat_keluar,
      },
    ],
    chart: {
      type: "bar",
      height: 350,
    },
    plotOptions: {
      bar: {
        horizontal: false,
        columnWidth: "55%",
        endingShape: "rounded",
      },
    },
    dataLabels: {
      enabled: false,
    },
    stroke: {
      show: true,
      width: 2,
      colors: ["transparent"],
    },
    xaxis: {
      categories,
    },
    yaxis: {
      title: {
        text: "Jumlah",
      },
    },
    fill: {
      opacity: 1,
    },
    tooltip: {
      y: {
        formatter: function (val) {
          return val + " surat";
        },
      },
    },
  };

  var chart = new ApexCharts(grafik_by_jenis, options);
  chart.render();
}

if (bulan_jenis && tahun_jenis) {
  garfikByJenis({});
  let bulan = "";
  let tahun = "";
  bulan_jenis.addEventListener("change", (e) => {
    bulan = e.target.value;
    garfikByJenis({ bulan, tahun });
  });

  tahun_jenis.addEventListener("change", (e) => {
    tahun = e.target.value;
    garfikByJenis({ bulan, tahun });
  });
}
