<?php
        include('process.php');
        include('header.php');
        
        $connect = connect();
        $result = viewItemsstatus($connect);

?>        
<div id="page-wrapper">
    <div class="table-responsive">
         <table class="table">
         <caption><h1><b><center>Item Status</center></b></h1></caption>
         		<tr>
                    <th>Date</th>
         			<th>Item</th>
         			<th>Demand</th>
         			<th>Sales</th>
                    <th>Stock</th>
                    <th>Remaining Stock</th>
         		</tr>
         	
         		<?php
         			while($row=mysqli_fetch_assoc($result)){
         		?>
         		
         		<tr>
                    <td><?=$row['dates']?></td>
         			<td><?=$row['name']?></td>
         			<td><?=$row['demands']?></td>
         			<td><?=$row['sales']?></td>
                    <td><?=$row['stock']?></td>
         			<td><?php echo $row['stock'] - $row['sales']; ?></td>
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