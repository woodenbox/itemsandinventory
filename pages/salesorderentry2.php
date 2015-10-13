      <?php

        include('process.php');
        
        $conn1 = connect();
        $result = viewItems($conn1);

        $getLastId=getSOEid($conn1);
        $getSOEid=mysqli_fetch_assoc($getLastId);
        date_default_timezone_set("Asia/Manila");//timezone
        $dates=date('Y-m-d');//current date
        
        
        
        
        $showSalesOrderItems=showSalesOrderItems($conn1, $getSOEid['id']);
        
        if(isset($_POST['add'])){

            $checkquantity=mysqli_fetch_assoc(checkquantity($conn1, $_POST['item_code']));
            if($checkquantity['quantity']<$_POST['quantity']){
            echo "<script>alert('Quantity is more than the available units');</script>";
            $getcurrentstocks=mysqli_fetch_assoc(getcurrentstocks($conn1, $_POST['item_code']));
            recorddemand($conn1, $_POST['item_code'], $_POST['quantity'], $dates, $getcurrentstocks['value']);
            } else {
                $checklistifexist=mysqli_fetch_assoc(checklistifexist($conn1, $_POST['item_code'], $getSOEid['id']));
                if($checklistifexist['1']==1){
                    echo "<script>alert('Item is already present. Delete or select another item');</script>";
                } else {
                $item_code=$_POST['item_code'];
                $quantity=$_POST['quantity'];
                $sql="SELECT price FROM sales_pricing WHERE item_code = '$item_code'";
                $result = mysqli_query($conn1, $sql);
                $pricepro=mysqli_fetch_assoc($result);
               $price=$pricepro['price'] * $_POST['quantity'];
               $sales_order_id=$getSOEid['id'];
            
               $addSalesOrderItems=addSalesOrderItems($conn1, $item_code, $quantity, $price, 0, $sales_order_id);
                echo "<script>window.location = 'salesorderentry2.php';</script>";
            }
            }           
	        echo "<script>window.location = 'salesorderentry2.php';</script>";
	    	
        }

        if(isset($_GET['remove'])){
            $deletee=$_GET['remove'];
            $sql="DELETE FROM sales_order_items WHERE id=$deletee";
            $result=mysqli_query($conn1, $sql);
            echo "<script>window.location='salesorderentry2.php';</script>";
            //tinatamad na akoooooo
        }
        
        if(isset($_POST['cancel'])){
	        
	        $removeSalesOrderEntry=removeSalesOrderEntry($conn1, $getSOEid['id']);
	        
	        echo "<script>window.location='salesorderentry.php';</script>";
	        
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
                    <td>Remove</td>
         		</tr>
         	
         		<?php
         			while($row=mysqli_fetch_assoc($showSalesOrderItems)){
         		?>
         		
         		<tr>
         			<td><?=$row['item_code']?></td>
         			<td><?=$row['quantity']?></td>
         			<td><?=$row['price']?></td>
                    <td><a href="salesorderentry2.php?remove=<?=$row['id']?>">Remove</a></td>
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