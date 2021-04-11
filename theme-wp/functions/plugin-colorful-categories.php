<?php

/**
 * Plugin Colorful Categories
 * 
 * How to assign new colour?
Open the page to edit tags or categories and change the colour in the column “Color”.

 * How does intelligent color selection work?
Plugin do checks if the category name contains one of the key words and set the pre-defined colour for this category.
For example category that contains Facebook will be colored to the dark blue colour.

 * How to get a color for a specific category?
Use WordPress default function: get_term_meta($term_id, ‘cc_color’, true);
 */

if(! function_exists('elm_get_category_color') )
{
    function elm_get_category_color ($category_id)
    {
        return get_term_meta($category_id, 'cc_color', true);
    }
}