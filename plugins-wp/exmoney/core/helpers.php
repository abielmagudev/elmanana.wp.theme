<?php 

function exm_view($path, $data = null)
{
    return Exmoney\Core\View::render($path, $data);
}

function exm_get_contents($file)
{
    return Exmoney\Core\Finder::content($file);
}

function exm_put_contents($file, $content)
{
    return Exmoney\Core\Finder::put($file, $content);
}

function exm_exists($path)
{
    return Exmoney\Core\Finder::exists($path);
}
