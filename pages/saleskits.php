<?php
    include('header.php');
    include('process.php');

    $connect = connect();
        
    if(isset($_POST['add'])){
        $checksk = mysqli_fetch_assoc(checksk($connect, $_POST['sk']['name']));
        if($checksk['1']==1){
            echo "<script>alert('Sales Kit name is already set for a particular item');</script>";
        } else {
            $_SESSION['sk']=$_POST['sk'];
            addsk($connect, $_POST['sk']);
            echo "<script>window.location = 'addsaleskititems.php'</script>";
        }
        echo "<script>window.location = 'saleskits.php'</script>";
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
        xmlhttp.open("GET","getsaleskits.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

<div id="page-wrapper">
    <label>Sales Kits</label>
    <select name="saleskits" class="form-control" onchange="showUser(this.value)">
        <option>Please select a sales kit</option>
<?php $listsaleskits=listsaleskits($connect); while($row=mysqli_fetch_assoc($listsaleskits)){ ?>   
        <option value="<?=$row['id']?>"><?=$row['name']?></option>
<?php } ?>
    </select>
    <div id="txtHint"></div>
    </br>

    <label>Add New Sales Kit</label>    
    <form method="POST">
        <label>Sales Kit Name</label>
        <input type="text" class="form-control" name="sk[name]" required>
        <label>Description</label>
        <input type="text" class="form-control" name="sk[description]" required>
        <label>Category</label>
        <select name="sk[category]" class="form-control">
            <option value="Category">Category</option>
        </select>        
        <input type="submit" class="btn btn-success" value="Add" name="add">
    </form>
</div> 
</div> <!--shuhada?-->
<?php
include('footer.php');
?>