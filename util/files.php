<?php
function file_upload($file, $dir) {
	$image = date('YmdHis') . $file['name'];
	move_uploaded_file($file['tmp_name'], $dir . $image);
	return $image;
}

function get_root() {
	return 'http://'.$_SERVER['SERVER_NAME'].'/random-draw/';
}

function get_document_root() {
	return $_SERVER['DOCUMENT_ROOT']. '/random-draw/';
}
?>
