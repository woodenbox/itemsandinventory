   
        <?php
        	include('header.php');
        	include('process.php');
       
        	$conn1 = connect();
        	
        	$result = viewStandardCost($conn1);
        	$result2 = viewItems($conn1);
        	        	
        	if(isset($_POST['add'])){
	        	
	        	
	        	$item_code = $_POST['item_code'];
	        	$standard_cost_per_unit = $_POST['standard_cost_per_unit'];
	        	$labor_cost_per_unit = $_POST['labor_cost_per_unit'];
	        	$overhead_cost_per_unit = $_POST['overhead_cost_per_unit'];
	        	
	        	
	        	$addStandardCost = addStandardCost($conn1, $item_code, $standard_cost_per_unit, $labor_cost_per_unit, $overhead_cost_per_unit);
	        	
	        	if($addStandardCost){
		        	echo "Standard Cost Added!";
	        	}else{
		        	echo "Failed to Add!";
	        	}
	        	
        	}
        
        
        ?>
        
        

        <div id="page-wrapper">
       
        
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
        
        
        
         <legend><label>Supplier Information</label></legend>    	
        
         <form method="POST">
        
         <label>Item Code</label>
       <select class="form-control" name="item_code">
  		  		  <?php
  		  while($row=mysqli_fetch_assoc($result2)){
	  		  ?>
   		       <option value="<?=$row['name']?>"><?=$row['id']?> - <?=$row['name']?></option>
    	   <?php    
	       } ?>
        </select> 
        
        
         <label>Standard Cost</label>
         <input type="text" class="form-control" name="standard_cost_per_unit">
        
        
         <label>Labor Cost</label>
         <input type="text" class="form-control" name="labor_cost_per_unit">
       
       
         <label>Over Head Cost</label>
         <input type="text" class="form-control" name="overhead_cost_per_unit">
       
    
         
         <input type="submit" class="btn btn-success" value="Add" name="add">
        
        </form>
        
        
        
        </table>
        
        

        
        

 
       </div> <!-- number 2 div->
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php
 include('footer.php');
?>