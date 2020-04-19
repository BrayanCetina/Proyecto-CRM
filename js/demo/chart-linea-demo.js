//line
var ctxL = document.getElementById("lineChart").getContext('2d');
var myLineChart = new Chart(ctxL, {
type: 'line',
data: {
labels: ["Enero", "Febreo", "Marzo", "Abril", "Mayo", "Junio", "Julio"],
datasets: [{
label: "SUET",
data: [65, 59, 80, 81, 56, 55, 40],
backgroundColor: [
'rgba(243, 243, 111, .2)',
],
borderColor: [
'rgba(245, 245, 0, .7)',
],
borderWidth: 2
},
{
label: "RODE",
data: [28, 48, 40, 19, 86, 27, 90],
backgroundColor: [
'rgba(71, 243, 72, .2)',
],
borderColor: [
'rgba(14, 165, 15, .7)',
],
borderWidth: 2
},
{
label: "PUNCH",
data: [1, 20, 15, 80, 86, 27, 90],
backgroundColor: [
'rgba(188, 22, 239, .2)',
],
borderColor: [
'rgba(109, 37, 130 , .7)',
],
borderWidth: 2
}
]
},
options: {
responsive: true
}
});