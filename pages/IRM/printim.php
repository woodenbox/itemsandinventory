<?php 
$printoutdate="09/19/2015";
$printouttime="12:00 pm";
$periodstart="09/19/2015";
$periodend="09/20/2015";
$category="All";
$location="All";
$productcode="101";
$productname="Electric Fan";
$uom="each";
$opening="80";
$quantityin="10";
$quantityout="22";
$balance="82";
?>

<div>
	<a style="font-weight: bold; font-size: 30;">Inventory Movements</a></br>
	<a>Print Out Date:</a><a style="margin-left: 30px"> <?php echo $printoutdate?>&nbsp<?php echo $printouttime?></a></br>
	<a>Period:</a><a style="margin-left: 82px"> <?php echo $periodstart?>-<?php echo $periodend?></a></br>
	<a>Category:</a><a style="margin-left: 66px"> <?php echo $category?></a></br>
	<a>Location:</a><a style="margin-left: 66px"> <?php echo $location?></a></br>
</div>

<div>
<table style="width:100%;">
<tr>
	<th>Category</th>
	<th>Description</th>
	<th>UOM</th>
	<th>Opening</th>
	<th>Quantity In</th>
	<th>Quasntity Out</th>
	<th>Balance</th>
</tr>
<tr style="text-align: center">
	<td><?php echo $productcode?></td>
	<td><?php echo $productname?></td>
	<td><?php echo $uom?></td>
	<td><?php echo $opening?></td>
	<td><?php echo $quantityin?></td>
	<td><?php echo $quantityout?></td>
	<td><?php echo $balance?></td>
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
</script>