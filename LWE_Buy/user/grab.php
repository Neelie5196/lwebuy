<!DOCTYPE html>
<html>
	<head>
	<title></title>
	</head>
	<body>
	<p>Name:</p>
	<input type="text" id="name">
	<input type= "submit" id ="name-submit" value="grab" >
	<table class="table">
	<div id ="name-data"></div>
	</table>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="js/global.js"></script>
		<script type="text/javascript" src="js/typeahead.js"></script>
	</body>
	<script>
    $(document).ready(function () {
        $('#name').typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "server.php",
					data: 'query=' + query,            
                    dataType: "json",
                    type: "POST",
                    success: function (data) {
						result($.map(data, function (item) {
							return item;
                        }));
                    }
                });
            }
        });
    });
</script>
</html>