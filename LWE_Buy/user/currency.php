<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Curency Converter</title>
</head>
<body>
	<h1 class="center">Simple Currency Converter</h1>
	<form class="center" action="" method="post">

		<label for="from">From</label>
		<select name="from">
			<option value="myr">MYR</option>
			<option value="rmb">RMB</option>
			<option value="usd">USD</option>
		</select>

		<label for="to">To</label>
		<select name="to">
			<option value="myr">MYR</option>
			<option value="rmb">RMB</option>
			<option value="usd">USD</option>
		</select>

		<label>Enter Amount</label>
		<input type="number" name="camount" required=""/>

		<input type="submit" value="Convert" name="convert"/>
	</form>
	<br /><br /><br />
</body>
</html>

<?php 
	if (isset($_POST['convert'])) {
		$from=$_POST['from'];
		$to=$_POST['to'];
		$amount=$_POST['camount'];

		if($amount==''||is_int($amount))
		{
			echo "Please Enter Valid Amount";
			exit();
		}

		echo '<div class="center">';
		if($from=='myr'){
			if($to=='myr'){
				$result=$amount*1;
				echo "MYR to   ".$result." MYR";
			}
			else if ($to=='rmb') {
				$result=$amount*1.57;
				echo "MYR==>   ".$result." RMB";
			}
			else if ($to=='usd') {
				$result=$amount*0.24;
				echo "MYR==>   ".$result." USD";
			}
		}
		else if ($from=='rmb') {
			if($to=='myr'){
				$result=$amount*0.64;
				echo "RMB==>   ".$result." MYR";
			}
			else if ($to=='rmb') {
				$result=$amount*1;
				echo "RMB==>   ".$result." RMB";
			}
			else if ($to=='usd') {
				$result=$amount*0.15;
				echo "RMB==>   ".$result." USD";
			}
		}
		else if ($from=='usd') {
			if($to=='usd'){
				$result=$amount*1;
				echo "USD==>   ".$result." USD";
			}
			else if ($to=='rmb') {
				$result=$amount*6.65;
				echo "USD==>   ".$result." RMB";
			}
			else if ($to=='usd') {
				$result=$amount*4.24;
				echo "USD==>   ".$result." MYR";
			}
		}
		echo '</div>';
	}
 ?>