<?php
        include('process.php');
        $conn1 = connect();
        $result = viewSpecificItemCategory($conn1, $_GET['id']);
        $row=mysqli_fetch_assoc($result);
        $result2 = viewUnitOfMeasure($conn1);
        $result3 = viewTaxType($conn1);
        
	    	
        if(isset($_POST['edit'])){
	      $name=$_POST['name'];
	      $taxtype=$_POST['taxtype'];
	      $unit=$_POST['unit'];
	      
	    	editItemCategory($conn1, $_GET['id'], $name, $taxtype, $unit);
	    	echo "<script>alert('Category Has Been Edited');</script>"; 
	            
	    	header('Location: inventory_categories.php');
        }
        
        include('header.php');
        ?>

        <div id="page-wrapper">
            	
        
       
        
    	<legend><label>Inventory Categories</label></legend>
    	<form method="POST"> 
    	
        <div class="form-group">
         <label>Category Name</label>
         <input type="text" class="form-control" name="name" value="<?=$row['name']?>" disabled>
        </div> 
        
        <label>Item Tax Type</label>
        <select class="form-control" name="taxtype">
        <?php
         while($row3=mysqli_fetch_assoc($result3)){
        ?>
   		  <option value="<?=$row3['name']?>" <?php if($row['item_tax_type']==$row3['name']) echo 'selected="selected"';?> > <?=$row3['name']?></option>
   		<?php
		 }
   		?>
        </select> 


        <div class="form-group">
         <label>Unit of Measure(Grams)</label>
          <select class="form-control" name="unit">
      <?php
       while($row2=mysqli_fetch_assoc($result2)){
      ?>
         <option value="<?=$row2['id']?>" <?php if($row['unit_of_measure']==$row2['id']) echo 'selected="selected"';?> > [<?=$row2['id']?>] - <?=$row2['name']?> - <?=$row2['description']?> </option>
      <?php
       }
      ?>   
         </select>
        </div> 
        

    	
        <input class="btn btn-success" type="submit" name="edit" value="Edit This Category">
    	
        </form>
        
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php
 include('footer.php');
?>