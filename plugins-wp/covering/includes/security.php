<?php

function cvr_generate_token()
{
    $passcode = 'c0v3r!ng'.date('dmY');
    return sha1( strrev($passcode) );
}

function cvr_get_token()
{
    return cvr_generate_token();
}

function cvr_verify_token($token)
{
    return $token === cvr_get_token();
}

function cvr_has_token($post)
{
    return isset($post['token']);
}