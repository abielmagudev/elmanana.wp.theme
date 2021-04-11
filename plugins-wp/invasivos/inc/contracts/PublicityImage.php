<?php namespace Inc\Contracts;

use Inc\Settings;
use Inc\Core\Filemanager;

use \Upload\File;
use \Upload\Validation\Mimetype;
use \Upload\Validation\Size;
use \Upload\Storage\FileSystem;

class PublicityImage implements \Inc\Interfaces\iContent
{
    public function generate( $request )
    {
        $rename_image = $this->setNameImage( $request['titulo'] );
        $settings = Settings::values();
        return $this->upload( $settings->ruta_imagenes, $rename_image );        
    }

    private function setNameImage($publicity_title)
    {
        $striped_title    = strip_tags( $publicity_title );
        $capitalize_title = ucwords( strtolower($striped_title ) );
        $spaceless_title  = str_replace(' ', '', $capitalize_title);
        return $spaceless_title . '_' . time();
    }

    private function upload($path, $rename)
    {
        $storage = new FileSystem($path);
        $file = new File('imagen', $storage);

        $file->setName( $rename );
        $file->addValidations([
            new Mimetype([
                'image/jpg',
                'image/jpeg',
                'image/png',
                'image/gif'
            ]),
        ]);

        if( $file->upload() )
        {
            // return basename($path) . '/' . $file->getNameWithExtension();
            return $file->getNameWithExtension();
        }

        // $errors = $file->getErrors();
        return false;

        //     'name'       => $file->getNameWithExtension(),
        //     'extension'  => $file->getExtension(),
        //     'mime'       => $file->getMimetype(),
        //     'size'       => $file->getSize(),
        //     'md5'        => $file->getMd5(),
        //     'dimensions' => $file->getDimensions()
    }

    public function delete( $publicity )
    {
        $settings = Settings::values();
        $image = $settings->ruta_imagenes . $publicity->contenido;
        return Filemanager::delete( $image );
    }
}