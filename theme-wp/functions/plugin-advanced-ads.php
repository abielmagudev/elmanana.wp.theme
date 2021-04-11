<?php 

if( !function_exists('elm_filter_add_classes_image_ad') )
{
    function elm_filter_add_classes_image_ad()
    {
        return 'class="img-fluid"';
    }
    add_filter('advanced-ads-ad-image-tag-attributes', 'elm_filter_add_classes_image_ad');
}