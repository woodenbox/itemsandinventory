<?php
        include('process.php');
        $conn1 = connect();
        $result2=viewUnitOfMeasure($conn1);
        
        if(isset($_POST['add'])){
	        
	        $name=$_POST['name'];
	        $taxtype=$_POST['taxtype'];
	        $unit=$_POST['unit'];
	        
	    	addItemCategory($conn1, $name, $taxtype, $unit);
	    	echo "<script>alert('New Category Added');</script>"; 
	            
	    	header('Location: inventory_categories.php');


        }
        include('header.php');
        
        ?>
        
        <div id="page-wrapper">
            	
        
       
        
    	<legend><label>Inventory Categories</label></legend>
    	<form method="POST"> 
    	
        <div class="form-group">
         <label>Category Name</label>
         <input type="text" class="form-control" name="name">
        </div> 
        

        <label>Item Tax Type</label>
        <select class="form-control" name="taxtype">
   		  <option value="a">Wala pa to</option>
        </select> 


        <div class="form-group">
         <label>Unit of Measure(Grams)</label>
          <select class="form-control" name="unit">
      <?php
       while($row2=mysqli_fetch_assoc($result2)){
      ?>
         <option value="<?=$row2['id']?>"> [<?=$row2['id']?>] - <?=$row2['name']?> - <?=$row2['description']?> </option>
      <?php
       }
      ?>   
         </select>
        </div> 
  
        

    	
        <input type="submit" name="add" value="Add New Item Category">
    	
        </form>
        
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    
<?php
 include('footer.php');
?>