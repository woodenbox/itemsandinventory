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
$productcode="101";
$productname="Electric Fan";
$uom="each";
$opening="80";
$quantityin="10";
$quantityout="22";
$balance="82";
$result=viewInventoryLocationTransfer($connect);
?>

<div>
	<a style="font-weight: bold; font-size: 30; font-family: Vrinda;">Inventory Movements</a></br>
	<a>Print Out Date:</a><a style="margin-left: 30px; font-family: Vrinda"> <?php echo $printoutdate?>&nbsp<?php echo $printouttime?></a></br>
</div>

<div>
<table style="width:100%; font-family: Vrinda;">
<tr>
	<th>Item</th>
	<th>From</th>
	<th>To</th>
	<th>Date of Transfer</th>
</tr>
                <?php
                    while($row=mysqli_fetch_assoc($result)){
                ?>
                
                
                <tr style="text-align: center; font-family: Vrinda;">
                    <td><?=$row['item']?></td>
                    <td><?=$row['from_location']?></td>
                    <td><?=$row['to_location']?></td>
                    <td><?=$row['date']?></td>
</tr>
<?php } ?>
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