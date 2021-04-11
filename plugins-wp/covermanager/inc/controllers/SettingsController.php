<?php namespace Inc\Controllers;

use Inc\Settings;
use Inc\Core\Notice;
use Inc\Contracts\BackgroundImage;
use Inc\Factories\CoverFactory;

class SettingsController extends \Inc\Core\Controller
{
    public static function update()
    {
        if( !check_admin_referer('covermanager_update', 'covermanager_nonce') )
            return self::redirect( 'admin.php', ['page' => 'covermanager-home', 'notice' => 'error'] );

        if( self::coverUpdate() )
        {
            Notice::set('error', 'Error al actualizar contenido de la portada.');
            return wp_safe_redirect( wp_get_referer() );
        }
        
        $model = new Settings;
        $settings = $model->find(1);

        if( BackgroundImage::verify() )
            BackgroundImage::upload($settings->background_path, 'image');

        $data = self::getUpdateData($settings);
        $notice = $model->update($data, ['id' => 1]) 
                ? ['status' => 'success', 'message' => 'Actualización con exito.'] 
                : ['status' => 'error', 'message' => 'Error en la actualización.'];
       
        Notice::set($notice['status'], $notice['message']);
        return wp_safe_redirect( wp_get_referer() );
    }

    private static function coverUpdate( )
    {
        $cover_model = CoverFactory::make( self::request('layout') );
        $result = $cover_model->save( self::request() );
        return !empty($result) && $result === false;
    }

    private static function getUpdateData( $settings )
    {
        return [
            'cover_type' => self::request('layout'),
            'background_type' => self::request('background-type'),
            'background_color' => self::request('background-color'),
            'background_image' => BackgroundImage::getUploadedName() ?? $settings->background_image,
            'updated_by' => get_current_user_id(),
            'updated_at' => DATETIME_NOW,
        ];
    }
}



    // public static function update()
    // {
    //     $request = self::request();

    //     if(! wp_verify_nonce( $request['popub_nonce'], 'popub_settings_update') )
    //         return wp_die('Validación incorrecta.');
        
    //     $data = [
    //         'modo' => $request['modo'],
    //         'actualizado_at' => DATETIME_NOW,
    //     ];

    //     $model = new Settings;
    //     $notice = $model->update($data, ['id' => 1]) 
    //             ? 'updated'
    //             : 'error';

    //     return self::redirect( 'admin.php', ['page' => 'popub-settings', 'notice' => $notice] );
    // }

    // public static function updateManual()
    // {
    //     $request = self::request();
        
    //     if( wp_verify_nonce( $request['popub_nonce'], 'popub_settings_update_manual') )
    //     {
    //         $model = new Settings;
    //         if( $model->update(['publicidad_id' => $request['manual']], ['id' => 1]) )
    //         {
    //             echo json_encode([
    //                 'status' => true,
    //                 'element' => Notice::get('updated'),
    //             ]);
    //             return;
    //         }
    //     }
        
    //     echo json_encode([
    //         'status' => false,
    //         'element' => Notice::get('error'),
    //     ]);
    //     return;
    // }