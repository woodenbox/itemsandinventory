
        
        
        <?php
        include('header.php');
        include('process.php');
        
        $conn1 = connect();
        
        $result = viewItems($conn1);
        
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
         			<td>Unit Measure</td>
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
   		       <option value="1">Components</option>
    	       <option value="2">Charges</option>
    	       <option value="3">Systems</option>
    	       <option value="4">Services</option>
        </select> 
        
        
        <label>Tax Type</label
        <select class="form-control" name="tax_type">
        	<option value="1">Regular</option>
        </select>
        
        
        <label>Item Type</label>
  		<select class="form-control" name="item_type">
   		       <option value="1">Purchased</option>
    	       <option value="2">Manufactured</option>
    	       <option value="3">Service</option>
        </select> 
        
   
        <label>Unit of Measure</label>
  		<select class="form-control" name="unit_measure">
   		       <option value="1">Each</option>
    	       <option value="2">Hours</option> 	
        </select> 
             
         
        <label>Dimenstion</label>
  		<select class="form-control" name="dimension">
   		       <option>Support</option>
    	       <option>Development</option>
        </select>
        
        <label>Item Status</label>
  		<select class="form-control" name="item_status">
   		       <option value="1">Active</option>
    	       <option value="2">Inactive</option>
        </select>  
        
        <input type="submit" class="btn btn-success" value="Add" name="add">
        
        
    </form>
        
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php
 include('footer.php');
?>  