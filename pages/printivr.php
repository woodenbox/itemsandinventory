<?php 
    include ('process.php');
    date_default_timezone_set("Asia/Manila");
    $date=date("Y/m/d");
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
?>

         <div class="table-responsive">
         	<table class="table">
         		<tr>
         			<td>Item Code</td>
         			<td>Standard Cost</td>
         			<td>Labor Cost</td>
         			<td>Over Head Cost</td>
         			<td></td>
         		</tr>
         		
         		<?php
         			while($row=mysqli_fetch_assoc($result)){
         		?>
         		
         		<tr>
         			<td><?=$row['item_code']?></td>
         			<td><?=$row['standard_cost_per_unit']?></td>
         			<td><?=$row['labor_cost_per_unit']?></td>
         			<td><?=$row['overhead_cost_per_unit']?></td>
        	
                    <td><a href="<?php echo "standardcostedit.php?id=".$row['id']?>"><img src="../images/edit.png" width="3%"></a></td>
         		</tr>
         		
         		<?php
     				}
         		?>
         		
         	</table>
         </div>




<div>
	<a style="font-weight: bold; font-size: 30;">Inventory Valuation Report</a></br>
	<a>Print Out Date:</a><a style="margin-left: 30px"> <?php echo $printoutdate?>&nbsp<?php echo $printouttime?></a></br>
	<!--<a>End Date:</a><a style="margin-left: 63px"> <?php echo $enddate?></a></br>!-->
	<!--<a>Category:</a><a style="margin-left: 66px"> <?php echo $category?></a></br>!-->
	<!--<a>Location:</a><a style="margin-left: 66px"> <?php echo $location?></a></br>!-->
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

	window.location ='pageinventoryvaluation.php';
</script>