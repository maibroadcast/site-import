<?php

    namespace site_import_namespace;

    // post types
    
    $post_types = get_post_types();
    $post_type = gpost('post-type', 'post');
        
    // input types

    global $input_types;

    $input_types = array(
        'string' => 'String',
        'int' => 'Integer',
        'float' => 'Float',
        'date' => 'Date',
    );

?>