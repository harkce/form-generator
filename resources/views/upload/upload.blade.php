<!DOCTYPE html>
<html>
<head>
	<title>Tes Upload</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<br>
	<div class="col-lg-offset-4 col-lg-4">
		<h1>Upload File</h1>
		<form action="store" enctype="multipart/form-data" method="POST">
		{{ csrf_field() }}
			<input type="file" name="bahaha">
			<br>
			<input type="submit" name="Upload" class="btn">
		</form>
	</div>
</body>
</html>