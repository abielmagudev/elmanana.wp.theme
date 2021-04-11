<?php 

function cvr_admin_index()
{
    $message = cvr_get_message();
    $stored = cvr_get_stored();
    return cvr_template('admin/index', compact('stored', 'message'));
}

function cvr_get_message()
{
    $message = [];
    if( isset($_GET['status']) )
    {
        if( $_GET['status'] )
        {
            $message['text'] = 'Actualización correcta!';
            $message['color'] = 'lime';
        }
        elseif( $_GET['status'] == 2 )
        {
            $message['text'] = 'Información incompleto.';
            $message['color'] = 'gold';
        }
        else
        {
            $message['text'] = 'Error al actualizar, contactar administrador.';
            $message['color'] = 'red';
        }
    }
    return $message;
}