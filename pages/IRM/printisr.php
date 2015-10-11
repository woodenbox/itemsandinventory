<?php 
$printoutdate="09/19/2015";
$printouttime="12:00 pm";
$enddate="09/19/2015";
$category="All";
$location="All";
$customer="All"
$categoryname="Computer Parts";
$description="Harddisk";
$customer="Dubanian";
$quantity="2";
$sales="23.00";
$cost="25.00";
$contribution="3.00";
$totalsales="23.00";
$totalcost="25.00";
$totalcontribution="3.00";

?>

<div>
	<a style="font-weight: bold; font-size: 30;">Inventory Sales Report</a></br>
	<a>Print Out Date:</a><a style="margin-left: 30px"> <?php echo $printoutdate?>&nbsp<?php echo $printouttime?></a></br>
	<a>End Date:</a><a style="margin-left: 63px"> <?php echo $enddate?></a></br>
	<a>Category:</a><a style="margin-left: 66px"> <?php echo $category?></a></br>
	<a>Location:</a><a style="margin-left: 66px"> <?php echo $location?></a></br>
	<a>Customer:</a><a style="margin-left: 66px"> <?php echo $customer?></a></br>
</div>

<div>
<table style="width:100%;">
<tr>
	<th>Category</th>
	<th>Description</th>
	<th>Customer</th>
	<th>Quantity</th>
	<th>Sales</th>
	<th>Cost</th>
	<th>Contribution</th>
</tr>
<tr style="text-align: center">
	<td><?php echo $categoryname?></td>
	<td><?php echo $description?></td>
	<td><?php echo $customer?></td>
	<td><?php echo $quantity?></td>
	<td><?php echo $sales?></td>
	<td><?php echo $sales?></td>
	<td><?php echo $contribution?></td>
</tr>
</table>
</div>

<div>
</br></br>
<a>Total:</a>
<a style="margin-left: 408px;"><?php echo $totalsales ?></a>
<a style="margin-left: 13px;"><?php echo $totalcost?></a>
<a style="margin-left: 54px;"><?php echo $totalcontribution?></a>
</div>

<script src="jquery-2.1.3.min.js"></script>
<script>
	$(function(){
		$(document).ready(function () {
    		window.print();
		});
	});
</script>