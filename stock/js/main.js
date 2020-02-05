const CHART = document.getElementById("chart");
console.log(CHART);
let lineChart = new Chart(CHART,{
  type: 'line',
  data: {
    labels: ["1hr","2hr","3hr","4hr","5hr","6hr","12hr","1D","3D","7D","1M","2M","3M","4M","5M","6M"],
    datasets: [
    {
      label: "Aplhabet Inc.(GOOG)",
      fill: false,
      lineTension: 0.1,
      backgroundColor: "rgba(75,192,192,0.4)",
      borderColor: "rgba(75,192,192,1)",
      borderCapStyle: 'butt',
      borderDash: [],
      borderDashOffset: 0.0,
      borderJoinStyle: 'miter',
      pointBorderColor: "rgba(75,192,192,1)",
      pointBackgroundColor: "#fff",
      pointBorderWidth: 1,
      pointHoverRadius: 5,
      pointHoverBackgroundColor: "rgba(75,192,192,1)",
      pointHoverBorderColor: "rgba(220,220,220,1)",
      pointHoverBorderWidth: 2,
      pointRadius: 1,
      pointHitRadius: 10,
      data: [1100,1000,1500,1350,1400,1450,1400,1800,1000,1150,1200,1400,1150,1230,1350,1200],
    }]
  }
});