
        <?php
            include('header.php');
            include('process.php');
       
            $conn1 = connect();
            
         	$result = viewSalesPricing($conn1);
        	$result2 = viewItems($conn1);
        	$result3 = viewCurrencies($conn1);
        	
            $editSalePricing=mysqli_fetch_assoc(editSalesPricing($conn1, $_GET['id']));
                        
            if(isset($_POST['add'])){
                
                
     
	        	$item_code = $_POST['item_code'];
	        	$currency = $_POST['currency'];
	        	$sale_type = $_POST['sale_type'];
	        	$price = $_POST['price'];
	        	
	        	$id=$_GET['id'];
         	$addSalesPricing = saveEditSalesPricing($conn1, $item_code, $currency,$sale_type, $price, $id);
                if($addSalesPricing){
                    echo "Sales Pricing Added!";
                    echo "<script>window.location = 'salepricing.php'</script>";
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
               <option value="<?=$row['id']?>" <?php if($editSalePricing['item_code']==$row['id']) echo "selected";?> ><?=$row['id']?> - <?=$row['name']?></option>
           <?php    
           } ?>
        </select> 
        
        
       
       <label>Currency</label>
        <select class="form-control" name="currency">
          <?php
          while($row=mysqli_fetch_assoc($result3)){
              ?>
               <option value="<?=$row['id']?>" <?php if($editSalePricing['currency']==$row['id']) echo "selected";?> ><?=$row['short_name']?></option>
           <?php    
           } ?>
        </select> 
        
        
         <label>Sale Type</label>
         <select class="form-control" name="sale_type">
  		  		 <option <?php if($editSalePricing['sale_type']==1) echo "selected";?>>Retail</option>
               <option <?php if($editSalePricing['sale_type']==2) echo "selected";?>>Wholesale</option>
        </select> 
       
       
         <label>Price</label>
            <input type="text" class="form-control" value="<?=$editSalePricing['price']?>" name="price">
    
         
         <input type="submit" class="btn btn-success" value="Save" name="add">
        
        </form>
        
        
        
        </table>
        
        
        

        
        

 
       </div> <!-- number 2 div->
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php
 include('footer.php');
?>