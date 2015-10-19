<?php
      
    include('header.php');
    include('process.php');
    $conn1 = connect();
    $result = viewItemShuhada($conn1);

    if(isset($_POST['add'])){
        $pangalan=$_POST['item_code'];
        $lokasyon;
        $kwanti=$_POST['quantity'];
        $resulta=mysqli_fetch_assoc(Ou($conn1, $pangalan));
        $limit=$resulta['stock'];
        ?>
         <h1><?=$limit?></h1>
        <?php
        $totallimit=$limit*2;  
          
            if(mysqli_num_rows(checkItemOrder($conn1, $pangalan))==0){
	         if($kwanti>$totallimit){
		      echo "<script>alert('Quantity Exceeded Tolerance Level')</script>";
	         }
	         else{
		      if($kwanti>$limit){
			   $out=$kwanti-$limit;
			   $in=$limit;
			   $sql="INSERT INTO item_status_final VALUES ('','$pangalan', '$kwanti', '100', '$in', '0', '$out')";
			   mysqli_query($conn1, $sql);
		      }
		      else{
			   $out=0;
			   $tira=$limit-$kwanti;
			   $sql="INSERT INTO item_status_final VALUES ('', '$pangalan', '$kwanti', '100', '$kwanti', '$tira', '0')";
			   mysqli_query($conn1, $sql);
		      }
	         }
            }
            
            else{
	        $b=mysqli_fetch_assoc(checkItemShuhada($conn1, $pangalan));
	         $shuhada[0]=$b['demand'];
  
            $shuhadamadafaka=$shuhada[0]+$kwanti;
	         if($shuhadamadafaka>$totallimit){
		      echo "<script>alert('Quantity Exceeded Tolerance Level')</script>";
	         }
	         else{
		         
		       if($shuhadamadafaka>$limit){
			   $out=$shuhadamadafaka-$limit;
			   $in=$limit;
			   $sql="UPDATE item_status_final set demand='$shuhadamadafaka', indemand='$in', remaining='0', outdemand='$out' where name='$pangalan'";
			   mysqli_query($conn1, $sql);
		      }
		      else{
			   $out=0;
			   $tira=$limit-$kwanti;
			   $sql="UPDATE item_status_final set demand='$shuhadamadafaka', indemand='$kwanti', remaining='$tira', outdemand='$out' where name='$pangalan'";
			   mysqli_query($conn1, $sql);
		      }  
	         }
            }
    }
    
        
        
?>
        
         
        
        <div id="page-wrapper">
        
        <!--
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
         
         -->
        
        
        
        
        
        
    	<form method="POST">    
        
    	<legend><label>Sales Order Entry : Step 2</label></legend>
        
        
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
   		       <option value="<?=$row['name']?>"><?=$row['name']?></option>
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