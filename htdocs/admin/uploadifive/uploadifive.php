<?php
/*
Uploadify
Copyright (c) 2012 Reactive Apps, Ronnie Garcia
Released under the MIT License <http://www.opensource.org/licenses/mit-license.php> 
*/
session_start();
include("../clases/Upload.php");

// Define a destination
$targetFolder = $_POST['targetFolder']; // Relative to the root

$verifyToken = md5('unique_salt' . $_POST['timestamp']);

if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
	
	// Validate the file type
	$fileTypes = array('jpg','jpeg','gif','png','bmp'); // File extensions
	$fileParts = pathinfo($_FILES['Filedata']['name']);	
	
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = '../../' . $targetFolder;
	
	
	if (in_array(strtolower($fileParts['extension']),$fileTypes)) {
	
		$handle = new upload($_FILES['Filedata']);
		if ($handle->uploaded) {
			$handle->file_new_name_body   = $_POST['newFileName'];
			$handle->image_resize         = true;
			$handle->image_x              = $_POST['x'];
			if($_POST['y']){
				$handle->image_y          = $_POST['y'];
				$handle->image_ratio_crop = true;
			}
			else $handle->image_ratio_y   = true;
			
			$handle->process($targetPath);
			if ($handle->processed) {
				$_SESSION['slides'][$_POST['session']][] = "$handle->file_dst_name_body.$handle->file_dst_name_ext";
				$file_name = $handle->file_dst_name_body;
			} else {
				echo 'error : ' . $handle->error;
			}
		}
	
		$handle = new upload($_FILES['Filedata']);
		if ($handle->uploaded) {
			$handle->file_new_name_body   = $file_name;
			$handle->image_resize         = true;
			$handle->image_x              = $_POST['thumb_x'];
			if($_POST['thumb_y']){
				$handle->image_y          = $_POST['thumb_y'];
				$handle->image_ratio_crop = true;
			}
			else $handle->image_ratio_y   = true;
			$targetPath = '../../' . $_POST['targetFolderThumb'];
			
			$handle->process($targetPath);
			if ($handle->processed) {
				$handle->clean();
			} else {
				echo 'error : ' . $handle->error;
			}
		}
		
	} else {
		echo 'Invalid file type.';
	}
}
?>
