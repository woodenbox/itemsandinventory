
        
        
        <?php
        include('header.php');
        include('process.php');
        
        $conn1 = connect();
        
        $result = viewItems($conn1);
        $result2 = viewItemCategory($conn1);
        $result3 = viewTaxType($conn1);
        $result4 = viewItemType($conn1);
        $result5 = viewUnitOfMeasure($conn1);
        $result6 = viewStatusType($conn1);
        
        if(isset($_POST['add'])){
	        
	        $item_code = $_POST['item_code'];
	        $name = $_POST['name'];
	        $description = $_POST['description'];
	        $category = $_POST['category'];
	        $tax_type = $_POST['tax_type'];
	        $item_type = $_POST['item_type'];
	        $unit_measure = $_POST['unit_measure'];
	        $dimension = $_POST['dimension'];
	        $item_status = $_POST['item_status'];
	        
	        $addItems = addItems($conn1, $item_code, $name, $description, $category, $tax_type, $item_type, $unit_measure, $dimension, $item_status);
	        
	        if($addItems){
		        echo "New Item Added!";
	        }else{
		        echo "Failed to Add!";
	        }
	        
        }
        
        ?>
        
        

        <div id="page-wrapper">
            	
        
        <div class="table-responsive">
         	<table class="table">
         	
         		<tr>
         			<td>Item code</td>
         			<td>Item name</td>
         			<td>Description</td>
         			<td>Category</td>
         			<td>Tax Type</td>
         			<td>Item Type</td>
         			<td>Unit of Measure</td>
         			<td>Dimension</td>
         			<td>Image</td>
         			<td>Item Status</td>
         		</tr>
         		<?php
         			while($row=mysqli_fetch_assoc($result)){
         		?>
         		<tr>
         			<td><?=$row['item_code']?></td>
         			<td><?=$row['name']?></td>
         			<td><?=$row['description']?></td>
         			<td><?=$row['category']?></td>
         			<td><?=$row['tax_type']?></td>
         			<td><?=$row['item_type']?></td>
         			<td><?=$row['unit_measure']?></td>
         			<td><?=$row['dimension']?></td>
         			<td></td>
         			<td><?=$row['item_status']?></td>
         		</tr>
         		
         		<?php
     			}
         		?>
         	
         	</table>
         </div>
        
        
            
     
    <form method="POST">    
        
        <label>Items/Components</label>
  		<select class="form-control" name="item">
   		       <option>a</option>
    	       <option>b</option>
    	       <option>c</option>
    	       <option>d</option>
        </select> 
        
        
        <legend><label>Item Information</label></legend>
        
        
        <label>Item Code</label>
         <input type="text" class="form-control" name="item_code">
        
         <label>Item Name</label>
         <input type="text" class="form-control" name="name">
        
        
         <label>Description</label>
         <input type="text" class="form-control" name="description">
        
         
        <label>Category</label>
  		<select class="form-control" name="category">
  		<?php
  		 while($row=mysqli_fetch_assoc($result2)){
  		?>
   		       <option value="<?=$row['id']?>"> <?=$row['id']?> - <?=$row['name']?></option>
   		<?php
		 }
   		?>
        </select> 
        
        
        <label>Tax Type</label>
        <select class="form-control" name="tax_type">
  		<?php
  		 while($row=mysqli_fetch_assoc($result3)){
  		?>
   		       <option value="<?=$row['id']?>"> <?=$row['id']?> - <?=$row['name']?></option>
   		<?php
		 }
   		?>
        </select>
        
        
        <label>Item Type</label>
  		<select class="form-control" name="item_type">
  		<?php
  		 while($row=mysqli_fetch_assoc($result4)){
  		?>
   		       <option value="<?=$row['id']?>"> <?=$row['id']?> - <?=$row['name']?></option>
   		<?php
		 }
   		?>
        </select> 
        
   
        <label>Unit of Measure</label>
        <select class="form-control" name="unit_measure">
  		<?php
  		 while($row=mysqli_fetch_assoc($result5)){
  		?>
   		       <option value="<?=$row['id']?>"> <?=$row['id']?> - <?=$row['name']?> - <?=$row['description']?></option>
   		<?php
		 }
   		?>
   		</select>
             
         
        <label>Dimenstion</label>
        <input type="text" class="form-control" name="dimension">
        
        <label>Item Status</label>
  		<select class="form-control" name="item_status">
  		<?php
  		 while($row=mysqli_fetch_assoc($result6)){
  		?>
   		       <option value="<?=$row['id']?>"> <?=$row['id']?> - <?=$row['name']?></option>
   		<?php
		 }
   		?>
        </select>  
        
        <input type="submit" class="btn btn-success" value="Add" name="add">
        
        
    </form>
        
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php
 include('footer.php');
?>  