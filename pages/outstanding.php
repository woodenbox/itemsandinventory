<?php
        include('process.php');
        $conn1 = connect();
        
        $viewPurchaseOrderEntry = viewPurchaseOrderEntry($conn1);
        
include('header.php');   
        ?>

        <div id="page-wrapper">
            	
        
       
        
    	<legend><label>Outstanding Purchase Orders</label></legend>
    
    	<div class="table-responsive">
         	<table class="table">
         		
         		<tr>
         			<td>Supplier</td>
         			<td>Order Date</td>
         			<td>Currency</td>
         			<td>Receive Into</td>
         			<td>Deliver To</td>
         			<td>Order Status</td>
         			<td>Receive</td>
         		</tr>
         		
         		<?php 
         			while($row=mysqli_fetch_assoc($viewPurchaseOrderEntry)){
         		?>
         		
         		<tr>
         			<td><?=$row["supplier"]?></a></td>
         			<td><?=$row["order_date"]?></td>
         			<td><?=$row["currency"]?></td>
         			<td><?=$row["receive_into"]?></td>
         			<td><?php $getaddressloc=mysqli_fetch_assoc(getaddressloc($conn1, $row["receive_into"])); echo $getaddressloc['address']; ?></td>
         			<td>In Process</td>
         			<td><a class="glyphicon glyphicon-log-in" href="viewpurchaseorder.php?id=<?=$row['id']?>"></a></td>
         		</tr>
         		
         		<?php 
     		}
     		?>
         	
         	</table>
         </div>
         
    	
        
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php
 include('footer.php');
?>