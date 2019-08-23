<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	
	<script type="text/javascript" src="assets/jquery.js"></script>
	<script>
		//testar depois
		$(document).ready(function(){

			$.ajax({
				url: "http://localhost:8000/api/customers/",
				method: "get",
				dataType: "json"
			}).done(function(data){

				console.log(data)
			})


		});
	</script>
</body>
</html>