<?php 
	include ('process.php');
    date_default_timezone_set("Asia/Manila");
    $date=date("Y/m/d");
    $connect = connect();
$printoutdate=date("Y/m/d");
$printouttime=date("h:i:sa");
$periodstart="09/19/2015";
$periodend="09/20/2015";
$item="any";
$tolerancelevel="Limit";
$quantity="2";
?>

<div>
	<a style="font-weight: bold; font-size: 30; font-family: Vrinda;">Inventory Purchasing Report</a></br>
	<a>Print Out Date:</a><a style="margin-left: 30px; font-family: Vrinda;"> <?php echo $printoutdate?>&nbsp<?php echo $printouttime?></a></br>
</div>


<div>
<table style="width:100%; font-family: Vrinda;">
<tr>
	<th>Item</th>
	<th>Tolerance Level</th>
	<th>Quantity</th>

</tr>
<tr style="text-align: center; font-family: Vrinda;">
		<td><?php echo $item ?></td>
		<td><?php echo $tolerancelevel ?></td>
		<td><?php echo $quantity ?></td>
</tr>
</table>
</div>



<script src="jquery-2.1.3.min.js"></script>
<script>
	$(function(){
		$(document).ready(function () {
    		window.print();
		});
	});
	window.history.back();
</script>