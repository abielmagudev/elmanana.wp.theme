<?php namespace Inc\Controllers;

use Inc\Core\Controller;
use Inc\Publicity;
use Inc\Factories\PublicityContractFactory;

class PublicityController extends Controller
{
    public static function add()
    {
        $types = popub_config('types');
        return popub_render('publicity/add', compact('types'));
    }

    public static function store()
    {
        $request = self::request();
        
        if(! wp_verify_nonce( $request['popub_nonce'], 'popub_publicity_store') )
            return wp_die('Validación incorrecta.');
        
        $contract = PublicityContractFactory::make( $request['tipo'] );

        $data = [
            'titulo'    => sanitize_text_field( $request['titulo'] ),
            'tipo'      => sanitize_text_field( $request['tipo'] ),
            'contenido' => $contract->generate( $request ),
            'enlace'    => isset( $request['enlace'] ) ? $request['enlace'] : null,
            'en_movil'  => isset( $request['en_movil'] ) ? 1 : 0,
            'en_escritorio'  => isset( $request['en_escritorio'] ) ? 1 : 0,
            'creado_at' => DATETIME_NOW,
        ];
        
        $model = new Publicity;
        if( $model->store($data) )
            return self::redirect( 'admin.php', ['page' => 'popub-home', 'notice' => 'saved'] );

        return self::redirect( 'admin.php', ['page' => 'popub-add', 'notice' => 'error'] );
    }

    public static function delete()
    {
        $request = self::request();

        if(! wp_verify_nonce( $request['popub_nonce'], 'popub_publicity_delete') )
            return wp_die('Validación incorrecta.');

        $model = new Publicity;
        $publicity = $model->find( $request['publicidad'] );

        $contract = PublicityContractFactory::make( $publicity->tipo );
        $contract->delete( $publicity );

        $notice = $model->delete( ['id' => $publicity->id] ) ? 'deleted' : 'error';
        return self::redirect( 'admin.php', ['page' => 'popub-home', 'notice' => $notice] );
    }
}
