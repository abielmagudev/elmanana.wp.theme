<?php namespace Inc\Contracts;

use Inc\Publicity;

class Showtime
{
    private $settings;
    private $publicity_model;

    public function __construct( $settings )
    {
        $this->settings = $settings;
        $this->publicity_model = new Publicity;
    }
    
    public function render()
    {
        $publicity = $this->getPublicity();

        if( $publicity->en_movil && wp_is_mobile() )
            return $this->getTemplate( $publicity );
        
        if( $publicity->en_escritorio && !wp_is_mobile() )
            return $this->getTemplate( $publicity );
        
        return;
    }

    private function getPublicity()
    {
        if(! $publicities = $this->publicity_model->all() )
            return;

        if( $this->settings->modo === 'manual' )
            return $this->publicity_model->find( $this->settings->publicidad_id );

        $publicities_count = (count($publicities) - 1);
        $numberRand = rand(0, $publicities_count);
        return $publicities[ $numberRand ];
    }

    private function getTemplate( $publicity )
    {
        if( $publicity->tipo === 'imagen' )
            return $this->getCodeImage( $publicity );
        
        return $this->getCodeScript( $publicity );
    }

    private function getCodeImage( $publicity )
    {
        $url = get_stylesheet_directory_uri() . '/' . basename( $this->settings->ruta_imagenes ) . '/';
        $url_image = $url . $publicity->contenido;
        $comment_title = $this->getCodeCommentTitle( $publicity->titulo );
        return $comment_title . "<div style='display:none' id='popub-content'><img src='{$url_image}'></div>
        <a data-fancybox data-src='#popub-content' href='javascript:;' id='popub-link'></a> \n";
    }

    private function getCodeScript( $publicity )
    {
        $comment_title = $this->getCodeCommentTitle( $publicity->titulo );
        return $comment_title . stripslashes( html_entity_decode($publicity->contenido) );
    }

    private function getCodeCommentTitle( $title )
    {
        return "<!-- Invasivos-plugin {$title} -->";
    }
}