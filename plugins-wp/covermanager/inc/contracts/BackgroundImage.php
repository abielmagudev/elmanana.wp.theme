<?php namespace Inc\Contracts;

use Inc\Core\Filemanager;
use \Upload\File;
use \Upload\Validation\Mimetype;
use \Upload\Validation\Size;
use \Upload\Storage\FileSystem;

class BackgroundImage
{
    private static $uploaded_name = null;

    public static function verify()
    {
        return $_FILES['background-image']['error'] === 0;
    }

    public static function upload($path, $rename)
    {
        $storage = new FileSystem($path);
        $file = new File('background-image', $storage);

        $file->setName( $rename );
        $file->addValidations([
            new Mimetype([
                'image/jpg',
                'image/jpeg',
                'image/png',
                'image/gif'
            ]),
        ]);
                
        self::deleteIfExists( $path . '/' . $file->getNameWithExtension() );

        if( $result = $file->upload() )
            self::$uploaded_name = $file->getNameWithExtension();

        return $result;
    }

    public static function getUploadedName()
    {
        return self::$uploaded_name;
    }

    public static function deleteIfExists( $filepath )
    {
        return Filemanager::delete( $filepath );
    }
}