<?php

namespace PS\Source\Api\Endpoints;

class ChangeStatus
{

    const ALLOWED_METHODS = ['POST'];

    public static function post()
    {
    }



    private static function setHeaders(): void
    {
        header('Content-Type: application/json, charset=utf-8');
        header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
        header("Access-Control-Allow-Origin: *");
        header('Access-Control-Allow-Method: POST, GET, OPTIONS');
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Allow-Headers: Authorization, Content-Type, x-xsrf-token, x_csrftoken, Cache-Control, X-Requested-With, pragma');
    }
}
