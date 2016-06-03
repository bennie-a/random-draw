<?php
	function escape($db, $value) {
		return mysqli_real_escape_string($db, $value);
	}
?>