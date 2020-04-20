//pie
var ctxP = document.getElementById("pieChart").getContext('2d');
var myPieChart = new Chart(ctxP, {
type: 'pie',
data: {
labels: ["Suet", "Rode", "Punch"],
datasets: [{
data: [25, 45, 30],
backgroundColor: ["#f5f500", "#3ff500", "#a300f5"],
hoverBackgroundColor: ["#f5f500", "#3ff500", "#a300f5"]
}]
},
options: {
responsive: true
}
});