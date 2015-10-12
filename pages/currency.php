  		<?php
  			
  			include('process.php');
  		
  			$conn1 = connect();
  			
  			$result = viewCurrencies($conn1);

            if (isset($_GET['id'])) {
                deletecurrency($conn1, $_GET['id']);
                header('Location: currency.php');
            }
  			
  			if(isset($_POST['add'])){
	  			
	  			$name = $_POST['name'];
	  			$short_name = $_POST['short_name'];	
	  			$rate = $_POST['rate'];
	  			
	  			$addCurrency = addCurrency($conn1, $name, $short_name, $rate);
	  			
	  			if($addCurrency){
		  			echo "New currency added!";
                    header('Location: currency.php');
	  			}else{
		  			echo "Failed to add!";
	  			}
	  			
  			}
  		include('header.php');	
  		?>
        <div id="page-wrapper">
       
        <form method="POST">
        
        <legend><center></h1><b>Setup Currencies</b></h1></center></legend>
        
        <label>Currency name</label>
         <input type="text" class="form-control" name="name">
         
         <label>Short name</label>
         <input type="text" class="form-control" name="short_name">
         
         <label>Rate</label>
         <input type="text" class="form-control" name="rate">
         <br>
         <input type="submit" class="btn btn-success" value="Add" name="add">
         
         </form>
         <hr>
        
         
        <table class="table table-sttripped">
        	<tr>
        		<td>Name</td>
        		<td>Short name</td>
        		<td>Rate</td>
                <td>Delete</td>
        	</tr>
        	
        	<?php
                while($row=mysqli_fetch_assoc($result)){
            ?>
        	
        	<tr>
        		<td><?=$row['name']?></td>
        		<td><?=$row['short_name']?></td>
        		<td><?=$row['rate']?></td>
                <td><a href='<?php echo "currency.php?id=".$row['id']?>'><img src="../images/delete.png" width="3%"></a></td>
        	</tr>
    		<?php
    		}
    		?>

       </div> <!-- number 2 div->
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php
 include('footer.php');
?>
   