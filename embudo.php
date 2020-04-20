<?php
 
$dataPoints = array( 
	array("label"=>"Prospects", "y"=>2130),
	array("label"=>"Inquiries", "y"=>1043),
	array("label"=>"Applicants", "y"=>501),
	array("label"=>"Admits", "y"=>295),
	array("label"=>"Enrolled", "y"=>135)
)
 
?>
<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	theme: "dark2",
	animationEnabled: true,
	title: {
		text: "School Admission Process"
    },
    element: 'area-example',
	data: [{
		type: "funnel",
		indexLabel: "{label} - {y}",
		yValueFormatString: "#,##0",
		showInLegend: true,
		legendText: "{label}",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>                                                      