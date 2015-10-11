<?php 
$printoutdate="09/19/2015";
$printouttime="12:00 pm";
$category="All";
$location="All";
$productcode="101";
$productname="Electric Fan";
$customerorder="each";
$supplierorder="2";
$total="120.00";
?>

<div>
	<a style="font-weight: bold; font-size: 30;">Inventory Planning Report</a></br>
	<a>Print Out Date:</a><a style="margin-left: 30px"> <?php echo $printoutdate?>&nbsp<?php echo $printouttime?></a></br>
	<a>Category:</a><a style="margin-left: 66px"> <?php echo $category?></a></br>
	<a>Location:</a><a style="margin-left: 66px"> <?php echo $location?></a></br>
</div>
<div>
<table style="width:100%;">
<tr>
	<th>Product Code</th>
	<th>Product Name</th>
	<th>Customer Order</th>
	<th>Supplier Order</th>
	
</tr>
<tr style="text-align: center">
	<td><?php echo $productcode?></th>
	<td><?php echo $productname?></th>
	<td><?php echo $customerorder?></th>
	<td><?php echo $supplierorder?></th>
	</tr>
</table></div>




<script src="jquery-2.1.3.min.js"></script>
<script>
	$(function(){
		$(document).ready(function () {
    		window.print();
		});
	});
</script>