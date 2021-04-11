<?php

function cvr_add_admin_pages()
{
    add_menu_page(
        'Portadas de inicio',      // Page title
        'Portadas',                // Menu title
        'manage_options',          // Capability,
        'covering_plugin',         // Menu slug
        'cvr_admin_index',         // Call function string'function_name' | array[instance,'method_name']
        'dashicons-screenoptions', // Menu icon
        2                          // Menu position
    );
}
