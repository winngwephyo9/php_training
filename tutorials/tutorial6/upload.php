 <?php
	$new_folder=$_POST['newfolder'];
	$image=$_FILES['myfile'];
	echo "New Folder Name:: $new_folder <br/>";
	echo "File Name<b>::</b> ".$image['name'];

	move_uploaded_file($image['tmp_name'],"img/".$image['name']);

	echo "Uploading Successfully";
	?>