
        <?php
        	include('header.php');
        	include('process.php');
       
        	$conn1 = connect();
        	
        	$result = viewSalesPricing($conn1);
        	$result2 = viewItems($conn1);
        	$result3 = viewCurrencies($conn1);
        	
        	        	
        	if(isset($_POST['add'])){
	        	
	        	
	        	$item_code = $_POST['item_code'];
	        	$currency = $_POST['currency'];
	        	$sale_type = $_POST['sale_type'];
	        	$price = $_POST['price'];
	        	
	        	$id=$_GET['id'];
	        	
	        	
	        	$addSalesPricing = addSalesPricing($conn1, $item_code, $currency, $sale_type, $price);
	        	
	        	if($addSalesPricing){
		        	echo "Sales Pricing Added!";
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
         			<td>Currency</td>
         			<td>Sale Type</td>
         			<td>Price</td>
         			<td></td>
         		</tr>
         		
         		<?php
         			while($row=mysqli_fetch_assoc($result)){
         		?>
         		
         		<tr>
         			<td><?=$row['item_code']?></td>
         			<td><?=$row['currency']?></td>
         			<td><?=$row['sale_type']?></td>
         			<td><?=$row['price']?></td>
        	
                    <td><a href="<?php echo "salepricingedit.php?id=".$row['id']?>"><img src="../images/edit.png" width="3%"></a></td>
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
        
        
    <label>Currency</label>
   		<select class="form-control" name="currency">
  		  <?php
  		  while($row=mysqli_fetch_assoc($result3)){
	  		  ?>
   		       <option value="<?=$row['id']?>"><?=$row['id']?> - <?=$row['name']?></option>
    	   <?php    
	       } ?>
        </select> 
        
        
         <label>Sale Type</label>
         <select class="form-control" name="sale_type">
  		  		<option value="Retail">Retail</option>
  		  		<option value="Wholesale">Wholesale</option>
        </select> 
       
       
         <label>Price</label>
         <input type="text" class="form-control" name="price">
       
    
         
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