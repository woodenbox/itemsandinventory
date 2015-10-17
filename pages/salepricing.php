
        <?php
        	include('header.php');
        	include('process.php');
       
        	$conn1 = connect();
        	
        	$result = viewSalesPricing($conn1);
        	$result2 = viewItems($conn1);
        	$result3 = viewCurrencies($conn1);
        	
        
        	        	
        	if(isset($_POST['add'])){
	        	$checksp=mysqli_fetch_assoc(checksp($conn1, $_POST['item_code']));
                if($checksp['1']==1){
                    echo "<script>alert('Price is already set for ".$_POST['item_code']."');</script>";
                } else {

	        	$item_code = $_POST['item_code'];
	        	$currency = $_POST['currency'];
	        	$sale_type = $_POST['sale_type'];
	        	$price = $_POST['price'];
	     
	        	$addSalesPricing = addSalesPricing($conn1, $item_code, $currency, $sale_type, $price);    
                echo "<script>windo.location = 'salepricing.php';</script>";
                }
	        	
        	}
        	
        	if(isset($_GET['search'])){
	     	$result=searchSales($conn1, $_GET['search']); 
	     	
	     	$searchSales=$_GET['search'];  
        }
        
        
        ?>
        
        

        <div id="page-wrapper">
       
        
        <form method="GET" style="position: absolute; left: 85%; top: 10%;">
								<div class="form-group" >
									<label style="margin-right: 158px; width: 200px;">Search:</label><br>
									<input type="text" name="search" style="color: black;" placeholder="Enter to search">
									
								</div>
							</form>
        
        
        
         <div class="table-responsive">
         	<table class="table">
         	    <caption><b><center><h1>Sales Pricing</h1></center></b></caption>
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
         <hr>
        
        
        
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
       
    
         <br>
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