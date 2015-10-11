<?php 
	include ('process.php');
    date_default_timezone_set("Asia/Manila");
    $date=date("Y/m/d");
    $connect = connect();
$printoutdate=date("Y/m/d");
$printouttime=date("h:i:sa");
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
$result=listpurchases($connect);
$total =0;
?>

<div>
	<a style="font-weight: bold; font-size: 30;">Inventory Purchasing Report</a></br>
	<a>Print Out Date:</a><a style="margin-left: 30px"> <?php echo $printoutdate?>&nbsp<?php echo $printouttime?></a></br>
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
<?php 	while($row=mysqli_fetch_assoc($result)){ ?>
<tr style="text-align: center">
	<td><?php $getitemlist=mysqli_fetch_assoc(getitemlist($connect, $row['code'])); echo $getitemlist['category'];?></td>
	<td><?php echo $getitemlist['description'];?></td>
	<td><?php $getpoitem=mysqli_fetch_assoc(getpoitem($connect,$row['poid'])); echo $getpoitem['order_date'];?></td>
	<td><?php echo $getpoitem['supplier'];?></td>
	<td><?php $glofpo=mysqli_fetch_assoc(glofpo($connect, $row['poid'])); echo $glofpo['quantity']; ?></td>
	<td><?php $getunitprice=mysqli_fetch_assoc(getunitprice($connect, $getpoitem['supplier'], $row['code'])); echo $getunitprice['price']; ?></td>
	<td><?php echo $sum = $glofpo['quantity']*$getunitprice['price']; $total=$total+$sum;?></td>
</tr>
<?php } ?>
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
	window.location ='pageinventoryvaluation.php';
</script>