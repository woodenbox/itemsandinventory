<?php 
    include ('process.php');
    date_default_timezone_set("Asia/Manila");
    $date=date("Y/m/d");
    $connect = connect();
$printoutdate=date("Y/m/d");
$printouttime=date("h:i:sa");
/*$enddate="09/19/2015";
$category="All";
$location="All";
$productcode="101";
$productname="Electric Fan";*/
$uom="each";
$quantity="2";
$unitcost="100.00";
$value="120.00";
$total="120.00";
$result=listitems($connect);

?>

<div>
	<a style="font-weight: bold; font-size: 30; font-family: Vrinda;">Inventory Valuation Report</a></br>
	<a>Print Out Date:</a><a style="margin-left: 30px; font-family: Vrinda;"> <?php echo $printoutdate?>&nbsp<?php echo $printouttime?></a></br>
	<!--<a>End Date:</a><a style="margin-left: 63px"> <?php echo $enddate?></a></br>!-->
	<!--<a>Category:</a><a style="margin-left: 66px"> <?php echo $category?></a></br>!-->
	<!--<a>Location:</a><a style="margin-left: 66px"> <?php echo $location?></a></br>!-->
</div>
<div>
<table style="width:100%; font-family: Vrinda;">
<tr>
	<th>Product Code</th>
	<th>Product Name</th>
	<th>UOM</th>
	<th>Quantity</th>
	<th>Unit Cost</th>
	<th>Value</th>
</tr>
<?php 	while($row=mysqli_fetch_assoc($result)){ ?>
<tr style="text-align: center; font-family: Vrinda;">
	<td><?=$row['item_code']?></th>
	<td><?=$row['name']?></th>
	<td><?php echo $quantity?></th>
	<td><?php $getquan=mysqli_fetch_assoc(getquan($connect, $row['name'])); echo $getquan['value'];?></th>
	<td><?php $getcost=mysqli_fetch_assoc(getcost($connect, $row['name'])); echo $getcost['standard_cost_per_unit'];?></th>
	<td><?php echo $sum = $getquan['value']*$getcost['standard_cost_per_unit']; $total = $total +$sum;?>  </th>
</tr>
<?php } ?>

</table></div>


<div>
</br></br>
<a style="font-family: Vrinda">Total:</a>
<a style="margin-left: 574px;  font-family: Vrinda;"><?php echo $total?></a>
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