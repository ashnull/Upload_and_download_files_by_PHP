<?php include 'fileslogic.php';  ?>
<!DOCTYPE html>
<html>
<head>
	<title>PHP File Upload and Download</title>
	<link rel="stylesheet" href="style.css"></link>
</head>
<body>
	<div class="container">
		<div class="row">
			<form action="index.php" method="post" enctype="multipart/form-data">
				<h3>Upload Files Here</h3>
				<input type="file" name="myfile"><br>
				<button type="submit" name="save">Upload</button>
			</form>
		</div>
		<div class="row">
			<table>
				<thead>
					<th>ID</th>
					<th>Filename</th>
					<th>Size (in mb)</th>
					<th>Downloads</th>
					<th>Action</th>
				</thead>
				<tbody>
					<?php foreach ($files as $file): ?>
					<tr>
						<td><?php echo $file['id'] ?></td>
						<td><?php echo $file['name'] ?></td>
						<td><?php echo $file['size'] / 1000 . "KB" ?></td>
						<td><?php echo $file['downloads'] ?></td>
						<td>
							<a href="index.php?file_id=<?php echo $file['id'] ?>">Download</a>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>