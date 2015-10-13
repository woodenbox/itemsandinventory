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
         			<th>Item</th>
         			<th>Location</th>
         			<th>Reorder Level</th>
                    <th>Demand</th>
                    <th>Available</th>
                    <th>On Order</th>
         		</tr>
         	
         		<?php
         			while($row=mysqli_fetch_assoc($result)){
         		?>
         		
         		<tr>
         			<td><?=$row['code']?></td>
         			<td><?=$row['location']?></td>
         			<td><?php $getreorderlevel=mysqli_fetch_assoc(getreorderlevel($connect, $row['code'])); echo $getreorderlevel['reorder_level'];?></td>
         			<td><?php $getSumDemand=mysqli_fetch_assoc(getSumDemand($connect, $row['code'])); echo $getSumDemand['Demand'];?></td>
                    <td><?=$row['value']?></td>
         			<td><?php $getSumOrder=mysqli_fetch_assoc(getSumOrder($connect, $row['code'])); echo $getSumOrder['Demand'];?></td>
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