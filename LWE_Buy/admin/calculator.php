<?php

require_once '../connection/config.php';
session_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <title>LWE Buy</title>

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

    </body>
	    <body background="../resources/img/bg.jpg">
        <center>
            <div class="row">
                <?php include_once('nav.php')?>
            </div>
            
            <div class="container">
                <h2>Calculate Volumetric Weight</h2>
            </div>
            
            <section class = "content">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <form method="post">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xs-12 col-md-12 jumbotron">
                                        <h3 class="title">Calculate</h3>
                                        <table>
                                            <tbody>
                                                <tr>
													<td>Length: </td>
													<td><input type="text"  name="length"></td>
												 </tr>
												  <tr>
													<td>Breadth: </td>
													<td><input type="text"  name="breadth"></td>
												   </tr>
												
												   <tr>
													<td>Height: </td>
													<td><input type="text"  name="height"></td>
													</tr>
													<tr>
													 
													<td>Result: </td>
													<td> <?php
																	$length = $_POST['length'];
																	$breadth = $_POST['breadth'];
																	$height = $_POST['height'];
																	if(isset($_POST['submit']))
																	{
																			$result = ($length*$breadth*$height)/5000;
																			echo $result."kg";
																	}
														?></td>
													</tr>
                                            </tbody>
                                        </table>
										<input type="submit" class="btn btn-default" name="submit" value="Calculate">
                                    </div>
                                </div>
                            </div>
                        </form>
					
                    </div>
                </div>
            </section>
        </center>
    </body>
</html>