export var ChartData = {
    type: "line",
    data: {
    labels: [],
      datasets: []
    },
    options: {
      responsive: true,
      scales: {
        yAxes: [
          {
            ticks: {
              beginAtZero: true,
              max:100,
              padding: 10
            }
          }
        ]
      }
    }
  };
  
  export default ChartData;