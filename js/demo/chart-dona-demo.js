//doughnut
var ctxD = document.getElementById("pie2Chart").getContext('2d');
var myLineChart = new Chart(ctxD, {
type: 'doughnut',
data: {
labels: ["Deudores", "No Deudores"],
datasets: [{
data: [20, 50],
backgroundColor: ["#ec401a", "#5aec1a"],
hoverBackgroundColor: ["#ec401a", "#5aec1a"]
}]
},
options: {
responsive: true
}
});