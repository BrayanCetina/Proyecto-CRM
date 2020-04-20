//line
var ctxL = document.getElementById("line2Chart").getContext('2d');
var myLineChart = new Chart(ctxL, {
type: 'line',
data: {
labels: ["Enero", "Febreo", "Marzo", "Abril", "Mayo", "Junio", "Julio"],
datasets: [{
label: "Clientes Retenidos",
data: [28, 48, 30, 19, 46, 27, 50],
backgroundColor: [
'rgba(90, 236, 26 , .2)',
],
borderColor: [
'rgba(90, 236, 26 , .7)',
],
borderWidth: 2
},
{
label: "Clientes No Retenidos",
data: [1, 5, 3, 12, 5, 10, 2],
backgroundColor: [
'rgba(236, 64, 26, .2)',
],
borderColor: [
'rgba(236, 64, 26, .7)',
],
borderWidth: 2
}
]
},
options: {
responsive: true
}
});