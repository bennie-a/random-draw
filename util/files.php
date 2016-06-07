<?php
function file_upload($file, $dir) {
	$image = date('YmdHis') . $file['name'];
	move_uploaded_file($file['tmp_name'], $dir . $image);
	return $image;
}
?>