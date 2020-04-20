//pie
var ctxP = document.getElementById("pieChart").getContext('2d');
var myPieChart = new Chart(ctxP, {
type: 'pie',
data: {
labels: ["Perfectos", "No Perfectos"],
datasets: [{
data: [25, 45],
backgroundColor: ["#5aec1a", "#ec401a"],
hoverBackgroundColor: ["#5aec1a", "#ec401a"]
}]
},
options: {
responsive: true
}
});