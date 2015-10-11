<?php 
$printoutdate="09/19/2015";
$printouttime="12:00 pm";
$periodstart="09/19/2015";
$periodend="09/20/2015";
$category="All";
$location="All";
$supplier="All";
$item="All";
$categoryname="Computer Parts";
$description="Harddisk";
$date="09/14/2015";
$suppliername="Junk Beer ApS";
$quantity="10";
$unitprice="0.30";
$totalunitprice="2.99";
$total="2.99";
?>

<div>
	<a style="font-weight: bold; font-size: 30;">Inventory Purchasing Report</a></br>
	<a>Print Out Date:</a><a style="margin-left: 30px"> <?php echo $printoutdate?>&nbsp<?php echo $printouttime?></a></br>
	<a>Period:</a><a style="margin-left: 82px"> <?php echo $periodstart?>-<?php echo $periodend?></a></br>
	<a>Category:</a><a style="margin-left: 66px"> <?php echo $category?></a></br>
	<a>Location:</a><a style="margin-left: 66px"> <?php echo $location?></a></br>
	<a>Supplier:</a><a style="margin-left: 69px"> <?php echo $supplier?></a></br>
	<a>Item:</a><a style="margin-left: 93px"> <?php echo $item?></a></br>
</div>


<div>
<table style="width:100%;">
<tr>
	<th>Category</th>
	<th>Description</th>
	<th>Date</th>
	<th>Supplier</th>
	<th>Quantity</th>
	<th>Unit Price</th>
	<th>Total</th>
</tr>
<tr style="text-align: center">
	<td><?php echo $categoryname?></td>
	<td><?php echo $description?></td>
	<td><?php echo $date?></td>
	<td><?php echo $suppliername?></td>
	<td><?php echo $quantity?></td>
	<td><?php echo $unitprice?></td>
	<td><?php echo $totalunitprice?></td>
</tr>
</table>
</div>


<div>
</br></br>
<a>Total:</a>
<a style="margin-left: 595px;"><?php echo $total?></a>
</div>

<script src="jquery-2.1.3.min.js"></script>
<script>
	$(function(){
		$(document).ready(function () {
    		window.print();
		});
	});
</script>