<?php
    include('header.php');
    include('process.php');
    $conn1 = connect();
    date_default_timezone_set("Asia/Manila");
    $date=date("Y/m/d");
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $_SESSION['id']=$id;
    } else {
        $id=$_SESSION['id'];
    }   
    $viewPurchaseOrderEntry = viewPurchaseOrderEntry($conn1);
    $processPurchaseOrder=mysqli_fetch_assoc(processPurchaseOrder($conn1, $id));
    $viewOrderList=vieworderList($conn1, $id);

    if(isset($_POST['receive'])){
        $viewOrderList=vieworderList($conn1, $id);
        $pangalan;
        $lokasyon;
        $kwanti;
        while($row=mysqli_fetch_assoc($viewOrderList)){
            $pangalan=$row['item_id'];
            $lokasyon=$processPurchaseOrder['receive_into'];
            $kwanti=$row['quantity'];
        }
            
            if(mysqli_num_rows(checkItemOrder($conn1, $pangalan))==0){
	         if($kwanti>200){
		      echo "<script>alert('Quantity Could Not Be Greater Than 200')</script>";
	         }
	         else{
		      if($kwanti>100){
			   $out=$kwanti-100;
			   $in=100;
			   $sql="INSERT INTO item_status_final VALUES ('','$pangalan', '$kwanti', '100', '$in', '0', '$out')";
			   mysqli_query($conn1, $sql);
		      }
		      else{
			   $out=0;
			   $tira=100-$kwanti;
			   $sql="INSERT INTO item_status_final VALUES ('', '$pangalan', '$kwanti', '100', '$kwanti', '$tira', '0')";
			   mysqli_query($conn1, $sql);
		      }
	         }
            }
            
            else{
	        $b=mysqli_fetch_assoc(checkItemShuhada($conn1, $pangalan));
	         $shuhada[0]=$b['demand'];
  
            $shuhadamadafaka=$shuhada[0]+$kwanti;
	         if($shuhadamadafaka>200){
		      echo "<script>alert('Tolerance Level Cannot Be Greater Than 200')</script>";
	         }
	         else{
		         
		       if($shuhadamadafaka>100){
			   $out=$shuhadamadafaka-100;
			   $in=100;
			   $sql="UPDATE item_status_final set demand='$shuhadamadafaka', indemand='$in', remaining='0', outdemand='$out' where name='$pangalan'";
			   mysqli_query($conn1, $sql);
		      }
		      else{
			   $out=0;
			   $tira=100-$kwanti;
			   $sql="UPDATE item_status_final set demand='$shuhadamadafaka', indemand='$kwanti', remaining='$tira', outdemand='$out' where name='$pangalan'";
			   mysqli_query($conn1, $sql);
		      } 
		       
	         }
            }
            

    }
    
    if(isset($_POST['back'])){
        echo "<script>window.location = 'outstanding.php'</script>";
    }
    if(isset($_GET['remove'])){
        $removePurchaseOrder=removePurchaseOrder($conn1, $_GET["remove"]);
        echo "<script>window.location = 'viewpurchaseorder.php?id=".$id."'</script>";
    }
    if(isset($_POST['cancel'])){
        cancelPO($conn1, $id);
        echo "<script>window.location = 'outstanding.php'</script>";
    }
?>
        
        
        

        

        <div id="page-wrapper">
            	
        
       
        
    	<legend><label>Process Purchase Orders</label></legend>  
        <form method="POST">
            <label>Supplier:  </label><label><?=$processPurchaseOrder['supplier']?></label></br>
            <label>Date of Order:</label><label><?=$processPurchaseOrder['order_date']?></label></br>
            <label>Order Curreny: </label><label><?=$processPurchaseOrder['currency']?></label></br>
            <label>Receive Into:</label><label><?=$processPurchaseOrder['receive_into']?></label></br>
            <label>Receive To: </label><label><?=$processPurchaseOrder['deliver_to']?></label></br>
            <label>Status: </label><label>In Process</label></br>
            <div class="table-responsive">
                <table class="table">
                
                    <tr>
                        <td>Item Id</td>
                        <td>Quantity</td>
                        <td>Delivery Date</td>
                        <td>Price</td>
                        <td>Memo</td>
                        <td>Remove</td>
                    </tr>
                
                    <?php
                        while($row=mysqli_fetch_assoc($viewOrderList)){
                    ?>
                    
                    <tr>
                        <td><?=$row['item_id']?></td>
                        <td><?=$row['quantity']?></td>
                        <td><?=$row['delivery_date']?></td>
                        <td><?=$row['pbt']?></td>
                        <td><?=$row['memo']?></td>
                        <td><a href="viewpurchaseorder.php?remove=<?=$row["id"]?>">Delete</a></td>
                    </tr>
                        
                    <?php
                    }
                    
                    ?>              
                
                </table>
             </div>
        
            <input type="submit" class="btn btn-success" value="Receive" name="receive">
            <input type="submit" class="btn btn-success" value="Cancel Purchase Order" name="cancel">
            <input type="submit" class="btn btn-success" value="Back" name="back">
        </form>
         
    	
        
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
<?php
include('footer.php');
?>


















<!--
     
        

-->




<!--

        
        
        
        
        
        

-->