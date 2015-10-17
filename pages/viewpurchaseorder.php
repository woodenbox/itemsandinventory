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
        while($row=mysqli_fetch_assoc($viewOrderList)){
            $pangalan=$row['item_id'];
            $lokasyon=$processPurchaseOrder['receive_into'];
            $kwanti=$row['quantity'];
            $sql="SELECT 1 FROM item_status WHERE code = '$pangalan' && location = '$lokasyon'";
            $checkmoito=mysqli_query($conn1, $sql);
            $checkmoito2=mysqli_fetch_assoc($checkmoito);
            if($checkmoito2['1']==1){
                $sql="UPDATE item_status set value = value + $kwanti where code = '$pangalan' && location = '$lokasyon'";
                mysqli_query($conn1, $sql);
            } else {
                receiveItems($conn1, $row['item_id'], $processPurchaseOrder['receive_into'], $row['quantity'], $date, $id);
            }
            receivePO($conn1, $id);
            echo "<script>window.location = 'outstanding.php'</script>";
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