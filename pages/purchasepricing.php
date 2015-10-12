
        <?php
        	include('header.php');
        	include('process.php');
       
        	$conn1 = connect();
        	
        	$result = viewPurchasePricing($conn1);
        	$result2 = viewItems($conn1);
        	$result3 = viewSuppliers($conn1);
        	$result4 = viewUnitOfMeasure($conn1);
        	        	   
  
        	if(isset($_POST['add'])){
	        	$checkpp=mysqli_fetch_assoc(checkpp($conn1, $_POST['item_code'], $_POST['supplier']));

                if($checkpp['1']==1){
                    echo "<script>alert('Price is already set for item and supplier');</script>";
                } else {

	        	$item_code = $_POST['item_code'];
	        	$supplier = $_POST['supplier'];
	        	$price = $_POST['price'];
	        	$supplier_unit_measure = $_POST['supplier_unit_measure'];
	        	$conversion_factor = $_POST['conversion_factor'];
	        	$supplier_code = $_POST['supplier_code'];
	        	
	        	$addPurchasePricing = addPurchasePricing($conn1, $item_code, $supplier, $price, $supplier_unit_measure, $conversion_factor, $supplier_code);
                echo "<script>window.location = 'purchasepricing.php';</script>";
                }
                
	        	
	        	
	        	
        	}
        
        
        ?>
        
        

        <div id="page-wrapper">
       
        
         <div class="table-responsive">
         	<table class="table">
         	    <caption><b><center><h1>Purchase Pricing</h1></center></b></caption>
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
        <hr>
        
        
         <legend><label>Purchase Pricing Information</label></legend>    	
        
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
        
          <label>Supplier</label>
       <select class="form-control" name="supplier">
  		  		  <?php
  		  while($row=mysqli_fetch_assoc($result3)){
	  		  ?>
   		       <option value="<?=$row['name']?>"><?=$row['id']?> - <?=$row['name']?></option>
    	   <?php    
	       } ?>
        </select> 
        
         <label>Price</label>
         <input type="text" class="form-control" name="price">
         
             <label>Unit of Measure</label>
       <select class="form-control" name="supplier_unit_measure">
  		  		  <?php
  		  while($row=mysqli_fetch_assoc($result4)){
	  		  ?>
   		       <option value="<?=$row['name']?>"><?=$row['id']?> - <?=$row['name']?></option>
    	   <?php    
	       } ?>
        </select> 
        
            <label>Conversion Factor</label>
         <input type="text" class="form-control" name="conversion_factor">
         
             <label>Supplier Code</label>
         <input type="text" class="form-control" name="supplier_code">
        
        
         <br>
         <input type="submit" class="btn btn-success" value="Add" name="add">
        
        </form>
        
        
        
        
        
        

        
        

 
       </div> <!-- number 2 div->
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php
 include('footer.php');
?>