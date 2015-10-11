<?php 
$printoutdate="09/19/2015";
$printouttime="12:00 pm";
$enddate="09/19/2015";
$category="All";
$location="All";
$productcode="101";
$productname="Electric Fan";
$uom="each";
$quantity="2";
$unitcost="100.00";
$value="120.00";
$total="120.00";
?>

<div>
	<a style="font-weight: bold; font-size: 30;">Inventory Valuation Report</a></br>
	<a>Print Out Date:</a><a style="margin-left: 30px"> <?php echo $printoutdate?>&nbsp<?php echo $printouttime?></a></br>
	<a>End Date:</a><a style="margin-left: 63px"> <?php echo $enddate?></a></br>
	<a>Category:</a><a style="margin-left: 66px"> <?php echo $category?></a></br>
	<a>Location:</a><a style="margin-left: 66px"> <?php echo $location?></a></br>
</div>
<div>
<table style="width:100%;">
<tr>
	<th>Product Code</th>
	<th>Product Name</th>
	<th>UOM</th>
	<th>Quantity</th>
	<th>Unit Cost</th>
	<th>Value</th>
</tr>
<tr style="text-align: center">
	<td><?php echo $productcode?></th>
	<td><?php echo $productname?></th>
	<td><?php echo $uom?></th>
	<td><?php echo $quantity?></th>
	<td><?php echo $unitcost?></th>
	<td><?php echo $value?></th>
</tr>
</table></div>


<div>
</br></br>
<a>Total:</a>
<a style="margin-left: 574px;"><?php echo $total?></a>
</div>



<script src="jquery-2.1.3.min.js"></script>
<script>
	$(function(){
		$(document).ready(function () {
    		window.print();
		});
	});
</script>