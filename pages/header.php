<?php
        session_start();
?>

<!DOCTYPE html>


<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Items and Inventory System</title>

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
                <a class="navbar-brand" href="index.html">Items and Inventory</a>
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
                                <li><a href="customers.php">Customers</a></li>
                                            <li><a href="items.php">Items</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Items Maintenance <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="foreignitemcodes.php">Foreign Item Codes</a></li>
                                            <li><a href="inventory_categories.php">Item Categories</a></li>
                                            <li><a href="saleskits.php">Sales Kits</a></li>
                                            <li><a href="inventory_locations.php">Inventory Locations</a></li>
                                            <li><a href="movementtypes.php">Inventory Movement Types</a></li>
                                            <li><a href="toleranceedit.php">Tolerance Levels</a></li>
                                            <li><a href="currency.php">Currencies</a></li>
                                            <li><a href="unitofmeasure.php">Unit of Measure</a></li>
                                        </ul>
                                </li>                    
        						
        						<li class="dropdown">
        							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Items Pricing and Costs <span class="caret"></span></a>
          								<ul class="dropdown-menu">
                								<li><a href="salepricing.php">Sales Pricing</a></li>
                                                <li><a href="purchasepricing.php">Purchasing Pricing</a></li>
                								<li><a href="standardcost.php">Standard Costs</a></li>
          								</ul>
        						</li>
        						<li>
                           			<a href="purchase.php"><i class="fa-fw"></i> Purchase Order Entry</a>
                        		</li>
                        		
                        		<li>
                           			<a href="outstanding.php"><i class="fa-fw"></i>Outstanding Purchase</a>
                        		</li>
                                             
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Transactions <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="inventory_location_transfer.php">Inventory Location Transfers</a></li>
                                        </ul>
                                </li>
                            
                                
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Inquiries and Reports <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="itemstatus.php">Item Status</a></li>
                                            <li><a href="printivr.php">Print Inventory Valuation Report</a></li>
                                            <li><a href="printip.php">Print Inventory Planning Reports</a></li>
                                            <li><a href="printipr.php">Print Inventory Purchasing Report</a></li>
                                            <li><a href="printim.php">Print Inventory Location Transfer Report</a></li>
                                            <li><a href="printisr.php">Print Inventory Sales Report</a></li>
                                            <li><a href="printiss.php">Print Inventory Sales Summary</a></li>
                                        </ul>
                                </li>
                                
                                <li>
                           			<a href="salesorderentry.php"><i class="fa-fw"></i>Sales Order Entry</a>
                        		</li>
                        		
                        		<li>
                           			<a href="listsalesorderentry.php"><i class="fa-fw"></i>Oustanding Sales Order</a>
                        		</li>
                                
                                
				
                                
                                
        						
        					
                                
                            </ul>
                        </li>
                        
                        
                        
                        
                       
                        
                   
                       
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>