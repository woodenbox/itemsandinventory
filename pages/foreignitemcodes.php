<?php
    include('header.php');
    include('process.php');

    $connect = connect();
       	
    if(isset($_POST['add'])){
        $checkfic = mysqli_fetch_assoc(checkfic($connect, $_POST['fic']['ean']));
        if($checkfic['1']==1){
            echo "<script>alert('EAN is already set for a particular item');</script>";
        } else {
            addfic($connect, $_POST['fic']);
        }
        echo "<script>window.location = 'foreignitemcodes.php'</script>";
    }
?>

<script>
function showUser(str) {
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
        xmlhttp.open("GET","getuser.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

<div id="page-wrapper">
    <label><h1><b><center>Foreign Item Codes</center></b></h1></label>
    <select name="items" class="form-control" onchange="showUser(this.value)">
        <option>Please select an item</option>
<?php $listitems=listitems($connect); while($row=mysqli_fetch_assoc($listitems)){ ?>   
        <option value="<?=$row['name']?>"><?=$row['name']?></option>
<?php } ?>
    </select>
<div id="txtHint"></div>


    <hr>

    <label><h3>Add New Foreign Item Code</h3></label>  	
    <form method="POST">
        <label>Item</label>
        <select class="form-control" name="fic[item]">
<?php
        $listitems = viewItems($connect);
        while($row=mysqli_fetch_assoc($listitems)){
?>
            <option value="<?=$row['name']?>"><?=$row['name']?></option>
<?php    
        }
?>
        </select>
        <label>European Article Number</label>
        <input type="text" class="form-control" name="fic[ean]" pattern="[0-9]{6}" required>
        <label>Quantity</label>
        <input type="text" class="form-control" name="fic[quantity]" pattern="[0-9]+" required>
        <label>Unit of Measure</label>
        <select class="form-control" name="fic[uom]">
            <option value="CM">Centimeter</option>
        </select>
        <label>Description</label>
        <input type="text" class="form-control" name="fic[description]" required>
        <label>Category</label>
        <select class="form-control" name="fic[category]">
            <option value="Cat">Category</option>
        </select>        
        <br>
        <input type="submit" class="btn btn-success" value="Add" name="add">
    </form>
</div> 
</div> <!--shuhada?-->
<?php
include('footer.php');
?>