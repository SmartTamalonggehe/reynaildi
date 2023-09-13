import ApexCharts from "apexcharts";

import { byTipe } from "../../data/calculateSurat";

const bulan_tipe = document.getElementById("bulan_tipe");
const tahun_tipe = document.getElementById("tahun_tipe");

async function garfikByTipe({ bulan = "", tahun = "" }) {
  const grafik_by_tipe = document.getElementById("grafik-by-tipe");
  // mereset container grafik
  grafik_by_tipe.innerHTML = "";
  const dataTipe = await byTipe({ bulan, tahun });
  const categories = [];
  const data = [];
  dataTipe.forEach((item) => {
    categories.push(item.tipe);
    data.push(item.jumlahData);
  });

  const options = {
    series: [
      {
        data,
      },
    ],
    chart: {
      height: 350,
      type: "bar",
      events: {
        click: function (chart, w, e) {
          // console.log(chart, w, e)
        },
      },
    },
    plotOptions: {
      bar: {
        columnWidth: "45%",
        distributed: true,
      },
    },
    dataLabels: {
      style: {
        colors: ["#333"],
      },
    },
    legend: {
      show: false,
    },
    xaxis: {
      categories,
      labels: {
        style: {
          fontSize: "12px",
        },
      },
    },
  };

  var chart = new ApexCharts(grafik_by_tipe, options);
  chart.render();
}

if (bulan_tipe && tahun_tipe) {
  garfikByTipe({});
  let bulan = "";
  let tahun = "";
  bulan_tipe.addEventListener("change", (e) => {
    bulan = e.target.value;
    garfikByTipe({ bulan, tahun });
  });

  tahun_tipe.addEventListener("change", (e) => {
    tahun = e.target.value;
    garfikByTipe({ bulan, tahun });
  });
}
