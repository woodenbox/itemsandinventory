<?php
        include('process.php');
        include('header.php');
        
        $connect = connect();
        $result = viewItemFinal($connect);

?>        
<div id="page-wrapper">
    <div class="table-responsive">
         <table class="table">
         <caption><h1><b><center>Item Status</center></b></h1></caption>
         		<tr>
                    <th>Item</th>
         			<th>Demand</th>
         			<th>Maximum Tolerance</th>
         			<th>In Demand</th>
         			<th>Remaining Stock/s</th>
                    <th>Out Demand For Supplier</th>
         		</tr>
         	
         		<?php
         			while($row=mysqli_fetch_assoc($result)){
         		?>
         		
         		<tr>
                    <td><?=$row['name']?></td>
         			<td><?=$row['demand']?></td>
         			<td><?=$row['stock']?></td>
         			<td><?=$row['indemand']?></td>
         			<td><?=$row['remaining']?></td>
                    <td><?=$row['outdemand']?></td>
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