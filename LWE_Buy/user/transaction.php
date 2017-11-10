<?php

require_once '../connection/config.php';
session_start();
$user_id = $_SESSION['user_id'];

$i= 0;
$query = "SELECT *
          FROM payment
          WHERE user_id='$user_id' AND status !='Completed'";
$result = mysqli_query($con, $query);

$is= 0;
$query1 = "SELECT *
          FROM payment
          WHERE user_id='$user_id' AND status='Completed'";
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
        <section class = "content"> 
		<center>
            <div class="row">
                <?php include_once('nav.php')?>
            </div>
   
            <div class="container">
                <h2>Transaction History</h2>
                <hr/>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12" style="background:#444; padding:10px; color:#fff; font-weight:bold; font-size:180%; text-align: left;">
                        <strong>Pending</strong>
						<div class="box-tools pull-right">
                            <div class="has-feedback">
                                <input type="text" class="form-control input-sm" id="myInput2" onkeyup="myFunction2()" placeholder="Filter List">
                                <span class="glyphicon glyphicon-search form-control-feedback"></span>
                            </div>
                        </div>
                    </div>
					
                </div>
					
            </div>
            <section class = "content">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <?php 
                            if(mysqli_num_rows($result) > 0)
                            {
                            ?>
                            <table id="transaction" class="table thead-bordered" style="width:80%">
                                <thead>
								
                                    <tr>
                                        <th width = "4%">#</th>
                                        <th width = "21%">Detail</th>
                                        <th width = "13%">Amount</th>
                                        <th width = "26%">Created</th>
                                        <th width = "23%">Receipt</th>
                                        <th width = "13%">Status</th>
                                    </tr>
                                </thead>
                            <?php
                                while($row = mysqli_fetch_array($result))
                                {
                                    $i++;
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $row['title']; ?></td>
                                            <td>RM <?php echo $row['amount']; ?></td>
                                            <td><?php echo $row['datetime']; ?></td>
                                            <td>
                                                <a href="#" class="pop">
                                                    <img src="../resources/img/receipts/<?php echo $row['file']; ?>" style="width: 0px; height: 0px;"><?php echo $row['title']; ?>
                                                </a>
                                            </td>
                                            <td><a href="#" class="btn btn-xs btn-info"><?php echo $row['status']; ?></a></td>
                                        </tr>
                                    </tbody>
                                    <?php
                                    }
                                }else{
                                ?>
                                    <p>There is no reload request.</p>
                                <?php
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </section>
            <br/>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12" style="background:#444; padding:10px; color:#fff; font-weight:bold; font-size:180%; text-align: left;">
                        <strong>Completed</strong>
						<div class="box-tools pull-right">
                            <div class="has-feedback">
                                <input type="text" class="form-control input-sm" id="myInput1" onkeyup="myFunction2()" placeholder="Filter List">
                                <span class="glyphicon glyphicon-search form-control-feedback"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section class = "content">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <?php 
                            if(mysqli_num_rows($result1) > 0)
                            {
                            ?>
                            <table id ="completed" class="table thead-bordered" style="width:80%">
                                <thead>
                                    <tr>
                                        <th width = "4%">#</th>
                                        <th width = "21%">Detail</th>
                                        <th width = "13%">Amount</th>
                                        <th width = "26%">Created</th>
                                        <th width = "23%">Receipt</th>
                                        <th width = "13%">Status</th>
                                    </tr>
                                </thead>
                            <?php
                                while($row = mysqli_fetch_array($result1))
                                {
                                    $is++;
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $is; ?></td>
                                            <td><?php echo $row['title']; ?></td>
                                            <td>RM <?php echo $row['amount']; ?></td>
                                            <td><?php echo $row['datetime']; ?></td>
                                            <td>
                                                <a href="#" class="pop">
                                                    <img src="../resources/img/receipts/<?php echo $row['file']; ?>" style="width: 0px; height: 0px;"><?php echo $row['title']; ?>
                                                </a>
                                            </td>
                                            <td><a href="#" class="btn btn-xs btn-info"><?php echo $row['status']; ?></a></td>
                                        </tr>
                                    </tbody>
                                    <?php
                                    }
                                }else{
                                ?>
                                    <p>No Transaction Record.</p>
                                <?php
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </section>
        </center>  
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
	  table = document.getElementById("transaction");
	  tr = table.getElementsByTagName("tr");
	  for (i = 0; i < tr.length; i++) {
		td = tr[i].getElementsByTagName("td")[1];
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
		<script>
	function myFunction2() {
	  var input, filter, table, tr, td, i;
	  input = document.getElementById("myInput1");
	  filter = input.value.toUpperCase();
	  table = document.getElementById("completed");
	  tr = table.getElementsByTagName("tr");
	  for (i = 0; i < tr.length; i++) {
		td = tr[i].getElementsByTagName("td")[1];
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