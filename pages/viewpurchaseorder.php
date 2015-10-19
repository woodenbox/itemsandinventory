<?php
 include('header.php');
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