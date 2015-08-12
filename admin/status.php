<?php
    namespace site_import_namespace;
	$headers = @get_headers($_GET['url']);
	echo $headers ? 'ok' : 'error';
?>