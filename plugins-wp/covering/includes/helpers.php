<?php 

function cvr_import($file)
{
    $path = cvr()->getSetting('path').$file;
    if( file_exists($path) ) include $path;
}

function cvr_template($view, $data = null)
{
    $path = cvr()->getSetting('path').'views/'.$view.'.php';
    if( file_exists($path) )
    {
        if( is_array($data) && count($data) ) 
            extract($data);

        include_once $path;
    }
}

function cvr_timestamp_now()
{
    $timezone_format = _x('Y-m-d H:i:s', 'timezone date format');
    return date_i18n( $timezone_format ) ; //date('d-m-Y h:i:s')
}

function cvr_url($query)
{
    return cvr()->getSetting('url').$query;
}
