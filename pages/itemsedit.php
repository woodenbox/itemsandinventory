
        
        
        <?php
        include('header.php');
        include('process.php');
        
        $conn1 = connect();

        $result2 = viewItemCategory($conn1);
        $result3 = viewTaxType($conn1);
        $result4 = viewItemType($conn1);
        $result5 = viewUnitOfMeasure($conn1);
        $result6 = viewStatusType($conn1);

        $getitem=mysqli_fetch_assoc(getitem($conn1, $_GET['id']));
        
        if(isset($_POST['add'])){
          edititem($conn1, $_POST['ei']['name'], $_POST['ei']['description'],$_POST['ei']['category'],$_POST['ei']['tax_type'], $_POST['ei']['item_type'], $_POST['ei']['unit_measure'],$_POST['ei']['dimension'],$_POST['ei']['item_status'],$_GET['id']);
          echo "<script>window.location = 'items.php'</script>";
        }
        
        ?>
        
        

        <div id="page-wrapper">        
        
            
     
    <form method="POST">    
        <legend><label>Item Information</label></legend>
        
        
        <label>Item Code</label>
         <input type="text" class="form-control" name="" value="<?=$getitem['item_code']?>" disabled>
        
         <label>Item Name</label>
         <input type="text" class="form-control" name="ei[name]" value="<?=$getitem['name']?>">
        
        
         <label>Description</label>
         <input type="text" class="form-control" name="ei[description]" value="<?=$getitem['description']?>">
        
         
        <label>Category</label>
  		<select class="form-control" name="ei[category]">
  		<?php
  		 while($row=mysqli_fetch_assoc($result2)){
  		?>
   		       <option value="<?=$row['name']?>" <?php if($getitem['category']==$row['name']) echo "selected";?>> <?=$row['id']?> - <?=$row['name']?></option>
   		<?php
		 }
   		?>
        </select> 
        
        
        <label>Tax Type</label>
        <select class="form-control" name="ei[tax_type]">
  		<?php
  		 while($row=mysqli_fetch_assoc($result3)){
  		?>
   		       <option value="<?=$row['name']?>" <?php if($getitem['tax_type']==$row['name']) echo "selected";?>> <?=$row['id']?> - <?=$row['name']?></option>
   		<?php
		 }
   		?>
        </select>
        
        
        <label>Item Type</label>
  		<select class="form-control" name="ei[item_type]">
  		<?php
  		 while($row=mysqli_fetch_assoc($result4)){
  		?>
   		       <option value="<?=$row['name']?>" <?php if($getitem['item_type']==$row['name']) echo "selected";?>> <?=$row['id']?> - <?=$row['name']?></option>
   		<?php
		 }
   		?>
        </select> 
        
   
        <label>Unit of Measure</label>
        <select class="form-control" name="ei[unit_measure]">
  		<?php
  		 while($row=mysqli_fetch_assoc($result5)){
  		?>
   		       <option value="<?=$row['name']?>" <?php if($getitem['unit_measure']==$row['name']) echo "selected";?>> <?=$row['id']?> - <?=$row['name']?> - <?=$row['description']?></option>
   		<?php
		 }
   		?>
   		</select>
        <label>Dimenstion</label>
  		<select class="form-control" name="ei[dimension]">
   		       <option>Support</option>
    	       <option>Development</option>
        </select>
        
        <label>Item Status</label>
  		<select class="form-control" name="ei[item_status]">
  		<?php
  		 while($row=mysqli_fetch_assoc($result6)){
  		?>
   		       <option value="<?=$row['id']?>"> <?=$row['id']?> - <?=$row['name']?></option>
   		<?php
		 }
   		?>
        </select>  
        
        <input type="submit" class="btn btn-success" value="Save" name="add">
        
        
    </form>
        
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php
 include('footer.php');
?>  