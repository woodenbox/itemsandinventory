<?php
        include('process.php');
        $conn1 = connect();
        
        $viewOrderList=vieworderList($conn1, $_GET["id"]);
        
        $viewSupplier = viewSupplier($conn1, $_GET["id"]);
        $supplier = mysqli_fetch_assoc($viewSupplier);
        
        /*
        $showItemId=showItemId($conn1, $id);
        
        
        $showItemName=showItemName($conn1, $id);
        $itemName=mysqli_fetch_assoc($showItemName);
        */
        ?>
        

<!DOCTYPE html>


<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Items and Iventory System</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Items and Iventory</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            
            

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                    
                    			 <li>
                           			<a href="suppliers.php"><i class="fa-fw"></i> Suppliers</a>
                        		</li>
                    
                  				             
                                <li class="dropdown">
        							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Transactions <span class="caret"></span></a>
          								<ul class="dropdown-menu">
            								<li><a href="inventory_locations.php">Inventory Location Transfers</a></li>
            								<li><a href="inventory_adjustments.php">Iventory Adjustments</a></li>
          								</ul>
        						</li>
        					
        						
        						<li class="dropdown">
        							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Inquiries and Reports <span class="caret"></span></a>
          								<ul class="dropdown-menu">
            								<li><a href="inventory_movements.php">Inventory Item Movements</a></li>
            								<li><a href="inventory_status.php">Inventory Item Status</a></li>
            								<li><a href="#">Inventory Reports</a></li>
          								</ul>
        						</li>
        						
        						
        						<li class="dropdown">
        							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Maintencance <span class="caret"></span></a>
          								<ul class="dropdown-menu">
            								<li><a href="items.php">Items</a></li>
            								<li><a href="#">Foreign Item Codes</a></li>
            								<li><a href="#">Sales Kits</a></li>
            								<li><a href="#">Item Categories</a></li>
            								<li><a href="#">Iventory Locations</a></li>
            								<li><a href="#">Iventory Movement Types</a></li>
            								<li><a href="#">Reorder Levels</a></li>
            								<li><a href="currency.php">Currencies</a></li>
          								</ul>
        						</li>
        						
        						
        						<li class="dropdown">
        							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Pricing and Costs <span class="caret"></span></a>
          								<ul class="dropdown-menu">
            								<li><a href="#">Sales Pricing</a></li>
            								<li><a href="purchase.php">Purchasing Pricing</a></li>
            								<li><a href="#">Standard Costs</a></li>
          								</ul>
        						</li>
        						
        						<li>
                           			<a href="purchase.php"><i class="fa-fw"></i> Purchase Order Entry</a>
                        		</li>
        						<li>
                           			<a href="outstanding.php"><i class="fa-fw"></i> View Outstanding Purchase Orders</a>
                        		</li>
        					
                                
                            </ul>
                        </li>
                        
                        
                        
                        
                       
                        
                   
                       
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        
        

        

        <div id="page-wrapper">
            	
        
       
        
    	<legend><label>List Order Items <?=$supplier['supplier']?></label></legend>
    	
    	<label>Supplier: <?=$supplier['supplier']?></label>
    
    	
    	<div class="table-responsive">
         	<table class="table">
         	
         		<tr>
         			<td>Item Id</td>
         			<td>Quantity</td>
         			<td>Delivery Date</td>
         			<td>Price</td>
         			<td>Memo</td>
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
         		</tr>
					
         		<?php
     			}
         		
         		?>         		
         	
         	</table>
         </div>
    	
         
         
         
    	
        
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../bower_components/raphael/raphael-min.js"></script>
    <script src="../bower_components/morrisjs/morris.min.js"></script>
    <script src="../js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>





















<!--
     
        

-->




<!--

        
        
        
        
        
        

-->