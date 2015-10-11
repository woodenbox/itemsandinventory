<?php
        include('process.php');
        $conn1 = connect();
        
        $viewSalesOrderEntry=viewSalesOrderEntry($conn1);
		
        include('header.php');   
        ?>

        <div id="page-wrapper">
            	
        
       
        
    	<legend><label>Sales Order Entry List</label></legend>
    
    	<div class="table-responsive">
         	<table class="table">
         		
         		<tr>
         			<td>Costumer</td>
         			<td>Date</td>
         			<td>Shipping Charge</td>
         			<td>Status</td>
         		</tr>
         		
         		<?php 
         			while($row=mysqli_fetch_assoc($viewSalesOrderEntry)){
         		?>
         		
         		<tr>
         			<td><a href="viewsalesorderitems.php?id=<?=$row['id']?>"><?=$row["costumer"]?></a></td>
         			<td><?=$row["date"]?></td>
         			<td><?=$row["shipping_charge"]?></td>
         			<td><?=$row["status"]?></td>
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