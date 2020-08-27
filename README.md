# Upload_and_download_files_by_PHP

[![Codacy Badge](https://app.codacy.com/project/badge/Grade/45461638f9634108bf2ba680666f147e)](https://www.codacy.com/manual/viraldevpb/Upload_and_download_files_by_PHP?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=viraldevpb/Upload_and_download_files_by_PHP&amp;utm_campaign=Badge_Grade)

This github repositry is will be doing the Upload and download files from PHP Language.
First you have to create a folder name uploads to execute this porject in your PC.
Secondaly you have to open this files in your browser to execute this project.


## Technology used : PHP and CSS


## Usage
Just Clone this repositry in your PC or Laptop or Download this project in your PC
```PHP
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
```
For detailed explanation, visite [How To](https://code.visualstudio.com/docs/editor/github) 
```bash
$ git@github.com:viraldevpb/Upload_and_download_files_by_PHP.git
```
## Questions or Suggestions
Feel free to create issues [here](https://github.com/viraldevpb/Upload_and_download_files_by_PHP/issues) 
## [Try it](https://github.com/viraldevpb/Upload_and_download_files_by_PHP)
## [Follow me on Instagram for daily coding posts](https://www.instagram.com/prathamesh_borse_pb/)
