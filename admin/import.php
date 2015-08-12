<?php

	namespace site_import_namespace;

	require_once '../../../../wp-load.php';

	error_reporting(E_ERROR);
	$wp_error = '';

	// functions

    function gpost($id, $default=''){
        $result = isset($_POST[$id])?$_POST[$id]:$default;
        //$result = is_array($result)?array_map('stripslashes', $result):stripslashes($result);
        return $result;
    }

    ini_set('post_max_size', '1024M');
    ini_set('upload_max_filesize', '1024M');

	// post
	$post_id = NULL;
	$post = array('ID' => $post_id, 'post_status' => 'publish');

	// default fields
	$post['post_type'] = gpost('type');
	$post['post_title'] = gpost('title');
	$post['post_name'] = sanitize_title($post['post_title']);
	$post['post_content'] =  gpost('content');
	$post['post_date'] =  gpost('date');

	// add post
	$post_id = wp_insert_post($post, $wp_error);
	$post['ID'] = $post_id;

	// taxonomies
	foreach(gpost('taxonomies') as $taxonomy)
		wp_set_object_terms($post_id, array($taxonomy['value']), $taxonomy['name']);

	echo $post_id;

?>