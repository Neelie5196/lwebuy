<?php

require_once '../connection/config.php';
session_start();
$counter = 0; 

$query1 = "SELECT *
            FROM payment p
            JOIN users us
            ON us.user_id = p.user_id
            WHERE status = 'Completed'";
$result1 = mysqli_query($con, $query1);

?>

<!DOCTYPE html>
<html data-ng-app="myApp">
    <head>
        <title>LWE Buy</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initialscale=1.0"/>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!--stylesheet-->
        <link href="../frameworks/css/style.css" rel="stylesheet"/>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
        
    </head>

    <body>
        <div class="row">
            <?php include_once('nav.php')?>
        </div>

        <section class="content">
            <div class="container">
                <div class="row" style="padding-top: 10px; padding-bottom: 15px;">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <h2>Credit History</h2>
                    </div>
					<div class="box-tools pull-right">
                            <div class="has-feedback">
                                <input type="text" class="form-control input-sm" id="myInput2" onkeyup="myFunction2()" placeholder="Filter List">
                                <span class="glyphicon glyphicon-search form-control-feedback"></span>
                            </div>
                        </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12 jumbotron">
                        <?php 
                        if(mysqli_num_rows($result1) > 0)
                        {
                        ?>
                        <table id ="tbl_credit" class="table thead-bordered table-hover" id="receive">
                            <thead>
                                <tr>
                                    <th width = "5%">#</th>
                                    <th width = "60%">Description</th>
                                    <th width = "20%">Receipt</th>
                                    <th width = "15%">Date / Time</th>
                                </tr>
                            </thead>
                            <?php
                                while($row = mysqli_fetch_array($result1))
                                {
                                    $counter++;
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $counter; ?></td>
                                            <td><strong><?php echo $row['title']; ?> To <?php echo $row['fname']; ?> <?php echo $row['lname']; ?></strong></td>
                                            <td>
                                                <a href="#" class="pop">
                                                    <img src="../resources/img/receipts/<?php echo $row['file']; ?>" style="width: 0px; height: 0px;"><?php echo $row['title']; ?>
                                                </a>
                                            </td>
                                            <td><?php echo $row['datetime']; ?></td>
                                        </tr>
                                    </tbody>
                                    <?php
                                }
                            }else{
                                ?>
                                    <p>There is no credit history.</p>
                                <?php
                            }
                        ?>
                        </table>                              
                    </div>
                </div>
            </div>
        </section>
    </body>
    <div class="modal fade" id="imagedialog" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">              
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal"></button>
                    <img src="" class="image" style="width: 100%;" >
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            $('.pop').on('click', function() {
                $('.image').attr('src', $(this).find('img').attr('src'));
                $('#imagedialog').modal('show');   
            });		
        });
    </script>
	<script>
	function myFunction2() {
	  var input, filter, table, tr, td, i;
	  input = document.getElementById("myInput2");
	  filter = input.value.toUpperCase();
	  table = document.getElementById("tbl_credit");
	  tr = table.getElementsByTagName("tr");
	  for (i = 0; i < tr.length; i++) {
		td = tr[i].getElementsByTagName("td")[2];
		if (td) {
		  if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
			tr[i].style.display = "";
		  } else {
			tr[i].style.display = "none";
		  }
		}       
	  }
	}
</script>
</html>