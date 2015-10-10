<?php
        include('process.php');
        $conn1 = connect();
        $result=viewItemCategory($conn1);
        
        if(isset($_POST['add'])){
	     header('Location: add_inventory_categories.php');
        }
        
        include('header.php');
?>
        
        <div id="page-wrapper">
            	
        
           	<form method="POST"> 
        
    	<legend><label>Inventory Categories</label></legend>

    	
    	<div>
    	 <table class="table table-hover">
    	  <tr>
    	   <th>Category Name</th>
    	   <th>Type of Tax</th>
    	   <th>Unit of Measure(Grams)</th>
    	   <th>Edit</th>
    	  </tr>
    	  
      <?php
       while($row=mysqli_fetch_assoc($result)){
       ?>
    	<tr>
    	 <td><?=$row['name']?></td>
    	 <td><?=$row['item_tax_type']?></td>
    	 <td><?=$row['unit_of_measure']?></td>
    	 <td><a href="edit_inventory_categories.php?id=<?=$row['id']?>" class="btn btn-primary glyphicon glyphicon-pencil" method="GET"></a></td>
    	</tr>
       <?php
	   }
       ?>
    	 </table>
    	</div>
        <input class="btn btn-success" type="submit" name="add" value="Add New Category">
    	
        </form>
        
        <!-- /#page-wrapper -->

    </div>
<?php
 include('footer.php')
?>
