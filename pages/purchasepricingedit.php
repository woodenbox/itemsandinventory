
        <?php
        	include('header.php');
        	include('process.php');
       
        	$conn1 = connect();
        	
        	$result = viewPurchasePricing($conn1);
        	$result2 = viewItems($conn1);
        	$result3 = viewSuppliers($conn1);
        	$result4 = viewUnitOfMeasure($conn1);
        	        	   
  
        	$resultShow=editPurchasePricing($conn1, $_GET['id']);
        	
        	$showEdit=mysqli_fetch_assoc($resultShow);
        	
        	if(isset($_POST['edit'])){
	        	
	        	
	        	$item_code=$_POST['item_code'];
	        	$supplier=$_POST['supplier'];
	        	$price=$_POST['price'];
	        	$supplier_unit_measure=$_POST['supplier_unit_measure'];
	        	$conversion_factor=$_POST['conversion_factor'];
	        	$supplier_code=$_POST['supplier_code'];
	        	
	        	$id=$_GET['id'];
	        	
	        	$saveEditPurchasePricing=saveEditPurchasePricing($conn1, $item_code, $supplier, $price, $supplier_unit_measure, $conversion_factor, $supplier_code, $id);
	        
	        	
	        	
	        	
        	}
        
        
        ?>
        
        

        <div id="page-wrapper">
       
        
         <div class="table-responsive">
         	<table class="table">
         		<tr>
         			<td>Item Code</td>
         			<td>Supplier</td>
         			<td>Price</td>
         			<td>Supplier Unit of measure</td>
         			<td>Conversion Factor</td>
         			<td>Supplier Code</td>
         			
                   <td>Edit</td>
         		</tr>
         		
         		<?php
         			while($row=mysqli_fetch_assoc($result)){
         		?>
         		
         		
         		<tr>
         			<td><?=$row['item_code']?></td>
         			<td><?=$row['supplier']?></td>
         			<td><?=$row['price']?></td>
         			<td><?=$row['supplier_unit_measure']?></td>
         			<td><?=$row['conversion_factor']?></td>
         			<td><?=$row['supplier_code']?></td>
        	
                    <td><a href="<?php echo "purchasepricingedit.php?id=".$row['id']?>"><img src="../images/edit.png" width="3%"></a></td>
         		</tr>
         		
         		<?php
     				}
         		?>
         		
         	</table>
         </div>
        
        
        
         <legend><label>Purchase Pricing Information</label></legend>    	
        
         <form method="POST">
        
         <label>Item Code</label>
       <select class="form-control" name="item_code">
  		  		  <?php
  		  while($row=mysqli_fetch_assoc($result2)){
	  		  ?>
   		       <option value="<?=$row['name']?>" <?php if($showEdit['item_code']==$row['id']) echo "selected"; ?> > <?=$row['id']?> - <?=$row['name']?></option>
    	   <?php    
	       } ?>
        </select> 
        
          <label>Supplier</label>
       <select class="form-control" name="supplier">
  		  		  <?php
  		  while($row=mysqli_fetch_assoc($result3)){
	  		  ?>
   		       <option value="<?=$row['name']?>" <?php if($showEdit['supplier']==$row['id']) echo "selected"; ?>><?=$row['id']?> - <?=$row['name']?></option>
    	   <?php    
	       } ?>
        </select> 
        
         <label>Price</label>
         <input type="text" class="form-control" value="<?=$showEdit['price']?>" name="price">
         
             <label>Unit of Measure</label>
       <select class="form-control" name="supplier_unit_measure">
  		  		  <?php
  		  while($row=mysqli_fetch_assoc($result4)){
	  		  ?>
   		       <option value="<?=$row['name']?>" <?php if($showEdit['price']==$row['id']) echo "selected"; ?> ><?=$row['id']?> - <?=$row['name']?></option>
    	   <?php    
	       } ?>
        </select> 
        
            <label>Conversion Factor</label>
         <input type="text" class="form-control" value="<?=$showEdit['conversion_factor']?>" name="conversion_factor">
         
             <label>Supplier Code</label>
         <input type="text" class="form-control" value="<?=$showEdit['supplier_code']?>" name="supplier_code">
        
        
         
         <input type="submit" class="btn btn-success" value="Done" name="edit">
        
        </form>
        
        
        
        
        
        

        
        

 
       </div> <!-- number 2 div->
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php
 include('footer.php');
?>