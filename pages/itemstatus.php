<?php
        include('process.php');
        include('header.php');
        
        $connect = connect();
        $result = viewItemsstatus($connect);
?>        
<div id="page-wrapper">
    <div class="table-responsive">
         <table class="table">
         		<tr>
         			<td>Item</td>
         			<td>Location</td>
         			<td>Reorder Level</td>
                    <td>Demand</td>
                    <td>Available</td>
                    <td>On Order</td>
         		</tr>
         	
         		<?php
         			while($row=mysqli_fetch_assoc($result)){
         		?>
         		
         		<tr>
         			<td><?=$row['code']?></td>
         			<td><?=$row['location']?></td>
         			<td><?php $getreorderlevel=mysqli_fetch_assoc(getreorderlevel($connect, $row['code'])); echo $getreorderlevel['reorder_level'];?></td>
         			<td></td>
                    <td><?=$row['value']?></td>
         			<td></td>
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