const chatCanvas = document.getElementById("graph");
if (chatCanvas) {
  const labels = ["January", "February", "March", "April", "May", "June"];
  const data = {
    labels: labels,
    datasets: [
      {
        label: "Site traffic",
        backgroundColor: "blue",
        borderColor: "#8CDEF0",
        data: [0, 10, 5, 2, 20, 30, 45],
      },
    ],
  };

  const chart = new Chart(chatCanvas, {
    type: "line",
    data: data,
    options: {},
  });
}
