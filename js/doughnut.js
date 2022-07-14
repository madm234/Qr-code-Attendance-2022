
new Chart(document.getElementById("doughnut-chart"), {
    type: 'doughnut',
    data: {
      labels: ["Present", "Absent"],
      datasets: [
        {
          label: "Population (millions)",
          backgroundColor: ["#3e95cd", "#8e5ea2"],
          data: [2478,5267]
        }
      ]
    },
    options: {
      title: {
        display: true,
        text: 'Attendance from the day of joining'
      }
    }
});