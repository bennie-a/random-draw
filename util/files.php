<?php
function file_upload($file, $dir) {
	$image = date('YmdHis') . $file['name'];
	move_uploaded_file($file['tmp_name'], $dir . $image);
	return $image;
}

function get_document_root() {
	return $_SERVER['DOCUMENT_ROOT'].'/github/random-draw';
}
?>
