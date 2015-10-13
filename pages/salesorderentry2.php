      <?php

        include('process.php');
        
        $conn1 = connect();
        $result = viewItems($conn1);

        $getLastId=getSOEid($conn1);
        $getSOEid=mysqli_fetch_assoc($getLastId);
        
        
        
        
        $showSalesOrderItems=showSalesOrderItems($conn1, $getSOEid['id']);
        
        if(isset($_POST['add'])){
            $checkquantity=mysqli_fetch_assoc(checkquantity($conn1, $_POST['item_code']));
            if($checkquantity['quantity']>$quantity){
                echo "<scrip>alert('Quantity is more than the available units');</script>";
            } else {


	     
	        $item_code=$_POST['item_code'];
	        $quantity=$_POST['quantity'];
	        $price=$_POST['price'];
	        $discount=$_POST['discount'];
	        $sales_order_id=$getSOEid['id'];
	        
	        $addSalesOrderItems=addSalesOrderItems($conn1, $item_code, $quantity, $price, 0, $sales_order_id);
	        
	        //$bawas=bawas($conn1, $item_code, $quantity);
	        
	        
}	        
	        header('Location: salesorderentry2.php');
	    	
        }
        
        if(isset($_POST['cancel'])){
	        
	        $removeSalesOrderEntry=removeSalesOrderEntry($conn1, $getSOEid['id']);
	        
	        header('Location: salesorderentry.php');
	        
        }
	        
        include('header.php');
        
        
        ?>
        
         
        
        <div id="page-wrapper">
        
        
        <div class="table-responsive">
         	<table class="table">
         	
         		<tr>
         			<td>Item</td>
         			<td>Quantity</td>
         			<td>Price</td>
         		</tr>
         	
         		<?php
         			while($row=mysqli_fetch_assoc($showSalesOrderItems)){
         		?>
         		
         		<tr>
         			<td><?=$row['item_code']?></td>
         			<td><?=$row['quantity']?></td>
         			<td><?=$row['price']?></td>
         		</tr>
					
         		<?php
     			}
         		
         		?>         		
         	
         	</table>
         </div>
        
        
        
        
        
        
    	<form method="POST">    
        
    	<legend><label>Purchase Order Entry : Step 2</label></legend>
        
        
        <script>
function getprice(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","getitemprice.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
         
        <label>Item</label>
  		<select class="form-control" name="item_code" onchange="getprice(this.value)">
            <option>Select Item</option>
  		<?php
  		while($row=mysqli_fetch_assoc($result)){
  		?>
   		       <option value="<?=$row['name']?>">[<?=$row['item_code']?>] - <?=$row['name']?></option>
    	 <?php } 
    	       ?>
        </select> 
        
        <label>Quantity</label>
         <input type="text" class="form-control" name="quantity" id="quantity">
         
      
         <label>Price</label>
         <div id="txtHint" class="controls"><input type="text" readonly id="product_price" class="form-control" name="product_price" disabled></div>
         

         <label>Total Price</label>
         <input type="text" class="form-control" name="total_price" id="total_price" disabled>
        <br>
        <input type="submit" class="btn btn-success" value="Cancel" name="cancel">
        
        <input type="submit" class="btn btn-success" value="Add" name="add">
        
    </form>
    <script src="jquery-2.1.4.min.js"></script>
    <script>
        $('#quantity').change(function(){
            var qty = $('#quantity').val();
            var price = $('#product_price').val();
            
            var total = (price * qty);
            $('#total_price').val(total);
        });
        </script>
    
        
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php
 include('footer.php');
?>