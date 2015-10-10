
        <?php
            include('header.php');
            include('process.php');
       
            $conn1 = connect();
            
            $result = viewSuppliers($conn1);
            $result2 = viewCurrencies($conn1);

            $editSupplier=mysqli_fetch_assoc(editSuppliers($conn1, $_GET['id']));
                        
            if(isset($_POST['add'])){
                
                
                $name = $_POST['name'];
                $shortname = $_POST['shortname'];
                $website = $_POST['website'];
                $currency = $_POST['currency'];
                $bank = $_POST['bank'];
                $credit_limit = $_POST['credit_limit'];
                $email = $_POST['email'];   
                $address = $_POST['address'];
                $memo = $_POST['memo'];
                $status = $_POST['status'];
                $phone = $_POST['phone'];
                $fax = $_POST['fax'];
                $id= $_GET['id'];
                
                /*$addSuppliers = saveEditSuppliers($conn1, $name, $shortname, $website, $currency, $bank, $credit_limit, $email, $address, $memo, $status, $phone, $fax, $id);
                */

                $addSuppliers = saveEditSuppliers($conn1, $name, $shortname, $website, $currency,$bank, $credit_limit, $email, $address, $memo, $status, $phone, $fax,  $id);
                if($addSuppliers){
                    echo "Supplier Added!";
                    echo "<script>window.location = 'suppliers.php'</script>";
                }else{
                    echo "Failed to Add!";
                }
                
            }
        
        
        ?>
        
        

        <div id="page-wrapper">
       
        
         <div class="table-responsive">
            <table class="table">
                <tr>
                    <td>Name</td>
                    <td>Short name</td>
                    <td>Website</td>
                    <td>Currency</td>
                    <td>Bank</td>
                    <td>Credit limit</td>
                    <td>Email</td>
                    <td>Address</td>
                    <td>Memo</td>
                    <td>Status</td>
                    <td>Phone</td>
                    <td>Fax</td>
                    <td>Edit</td>
                </tr>
                
                <?php
                    while($row=mysqli_fetch_assoc($result)){
                ?>
                
                <tr>
                    <td><?=$row['name']?></td>
                    <td><?=$row['short_name']?></td>
                    <td><?=$row['website']?></td>
                    <td><?=$row['currency']?></td>
                    <td><?=$row['bank']?></td>
                    <td><?=$row['credit_limit']?></td>
                    <td><?=$row['email']?></td>
                    <td><?=$row['address']?></td>
                    <td><?=$row['memo']?></td>
                    <td><?=$row['status']?></td>
                    <td><?=$row['phone']?></td>
                    <td><?=$row['fax']?></td>
                     <td><a class="glyphicon glyphicon-pencil" href="<?php echo "suppliersedit.php?id=".$row['id']?>"></a></td>
                </tr>
                
                <?php
                    }
                ?>
                
            </table>
         </div>
        
        
        
         <legend><label>Edit Supplier Information</label></legend>       
        
         <form method="POST">
        
         <label>Company Name</label>
         <input type="text" class="form-control" value="<?=$editSupplier['name']?>" name="name">
        
        
        
         <label>Short Name</label>
         <input type="text" class="form-control" value="<?=$editSupplier['short_name']?>" name="shortname">
        
        
         <label>Website</label>
         <input type="text" class="form-control" value="<?=$editSupplier['website']?>" name="website">
       
       
         <label>Address</label>
         <input type="text" class="form-control" value="<?=$editSupplier['address']?>" name="address">
       
       <label>Currency</label>
        <select class="form-control" name="currency">
          <?php
          while($row=mysqli_fetch_assoc($result2)){
              ?>
               <option value="<?=$row['id']?>" <?php if($editSupplier['currency']==$row['id']) echo "selected";?> ><?=$row['id']?> - <?=$row['name']?></option>
           <?php    
           } ?>
        </select> 
        
        
              
       <div>
        <legend><label>Purchasing</label></legend>
        
        
         <label>Bank Name/Account</label>
         <input type="text" class="form-control" value="<?=$editSupplier['bank']?>" name="bank">
       
         <label>Credit Limit</label>
         <input type="text" class="form-control" value="<?=$editSupplier['credit_limit']?>"  name="credit_limit">
        
        <label>Status</label>
        <select class="form-control" name="status">
               <option <?php if($editSupplier['status']==1) echo "selected";?>>Enabled</option>
               <option <?php if($editSupplier['status']==2) echo "selected";?>>Disabled</option>
        </select> 
         
         
        <legend><label>Contact Information</label></legend>
        
        <label>Email</label>
         <input type="text" class="form-control" value="<?=$editSupplier['email']?>" name="email">
        
        <label>Phone</label>
         <input type="text" class="form-control" value="<?=$editSupplier['phone']?>" name="phone">
         
         <label>Memo</label></legend>
         <input type="text" class="form-control" value="<?=$editSupplier['memo']?>" name="memo">
         
         <label>Fax</label>
         <input type="text" class="form-control" value="<?=$editSupplier['fax']?>"name="fax">
        
         
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