<!DOCTYPE html>
<html lang="en">
<?php
include 'action/check-login.php';
error_reporting(0);
?>
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Eartistic System | Barcodes</title>
        <link type="text/css" href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="../css/theme.css" rel="stylesheet">
        <link type="text/css" href="../images/icons/css/font-awesome.css" rel="stylesheet">
		<link rel="icon" href="../images/icon.png">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <?php
include 'header.php';
?>
            </div>
     
        </div>
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <?php
include 'sidemenu.php';
?>
            
                    <div class="span9">
                        <div class="content">
                            <div class="module">
                                <div class="module-head">
                                    <h3>
                                        Barcodes</h3>
                                </div>
                                <div class="module-body table">
                                 <?php
								 include '../config/db_config.php';
								 
								 $sql = "SELECT * FROM products WHERE shop_id = '$SEshopno'";
                                 $result = $conn->query($sql);

                                 if ($result->num_rows > 0) {
									 print '
									  <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display"
                                        width="100%">
                                        <thead>
                                            <tr>
                                                <!--<th>
                                                    Product ID
                                                </th-->>
                                                <th>
                                                    Product Name
                                                </th>
                                                <th>
                                                    Serial No.
                                                </th>
                                                <th>
                                                    Barcode
                                                </th>
											
                                            </tr>
                                        </thead>
                                        <tbody>';
    
                                  while($row = $result->fetch_assoc()) {
									  $exdate = ''.$row['expire_date'].'-'.$row['expire_month'].'-'.$row['expire_year'].'';
                               print '<tr class="odd gradeX">
                                                <!--<td>
                                                    '.$row['product_id'].'
                                                </td>-->
                                                <td>
                                                    '.$row['item_description'].'
                                                </td>
                                                <td>
                                                    '.$row['barcode'].'
                                                </td>
                            
												<td>';?>  <?php
                                            $text=$row['barcode'];
 echo "<center><img src='barcode/barcode.php?codetype=Code128&size=40&text=".$text."&print=true'/></center>";
 print '
                                                </td>

                                            </tr>';
                                    }
                                    } else {
                                     print '
									<div class="module-body">
                                 <div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<h3 style="color:green">No Product Found!</h3>
										All products barcode you register will be generated here.
									</div>
									</div>';
                                       }
									   
									   print ' </tbody>
                                
                                    </table>';
                                     $conn->close();
								 ?>
                                </div>
                            </div>

                       
                        </div>
                 
                    </div>
    
                </div>
            </div>
   
        </div>

        <?php
include 'footer.php';
?>
        <script src="../scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="../scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="../scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="../scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="../scripts/common.js" type="text/javascript"></script>
      
    </body>
