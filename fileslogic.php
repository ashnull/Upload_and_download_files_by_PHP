<?php 

$conn = mysqli_connect("localhost","root","","files-management");
// files-management is the database name here You have to change by your database name..

$sql = "SELECT * FROM files";
// files is the table name here it is created in files-management database.
$result = mysqli_query($conn,$sql);

$files = mysqli_fetch_all($result,MYSQLI_ASSOC);

if (isset($_POST['save'])) {
	$filename = $_FILES['myfile']['name'];
	$destination = 'uploads/' . $filename;

	$extension = pathinfo($filename,PATHINFO_EXTENSION);

	$file = $_FILES['myfile']['tmp_name'];

	$size = $_FILES['myfile']['size'];

	if (!in_array($extension,['zip','pdf','png'])) {
		echo "Your file extension must be .zip, .pdf or .png";
	}
	else if ($_FILES['myfile']['size'] > 1000000) {
		echo "Your file is too large";
	}
	else{
		if (move_uploaded_file($file, $destination)) {
			$sql = "INSERT INTO files(name,size,downloads) VALUES('$filename','$size',0)";
			// In files You have to create four tables and you have assigned names to that table are as follows:- id, name, size,downloads.

			if (mysqli_query($conn,$sql)) {
			 	echo "file Uploaded Successfully";
			 } 
			 else{
			 	echo "Failded to upload your file";
			 }
		}
	}
}

if (isset($_GET['file_id'])) {
	
	$id = $_GET['file_id'];

	$sql = "SELECT * FROM files WHERE id=$id";

	$result = mysqli_query($conn,$sql);

	$file = mysqli_fetch_assoc($result);

	$filepath = 'uploads/' . $file['name'];

	if (file_exists($filepath)) {
		header('Content-Type: application/octet-stream');

		header('Content-Description: File Transfer');

		header('Content-Disposition: attachment; filename='.basename($filepath));

		header('Expires:0');

		header('Cache-Control:must-revalidate');

		header('Pragma:public');

		header('Content-Length:'.filesize('uploads/'.$file['name']));

		readfile('uploads/'.$file['name']);

		$newCount = $file['downloads'] + 1;

		$updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";

		mysqli_query($conn,$updateQuery);

		exit;
	}


}
?>