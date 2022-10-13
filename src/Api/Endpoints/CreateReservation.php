<?php

namespace PS\Source\Api\Endpoints;

use PS\Source\Classes\Reservation;

class CreateReservation
{

    const ALLOWED_METHODS = ['POST'];

    public static function post()
    {
        if (file_get_contents('php://input') !== "") {
            $data = array();
            parse_str(file_get_contents('php://input'), $data);
            self::setHeaders();
            if (array_diff(self::NEEDED_KEYS, array_keys($data))) {
                echo json_encode(self::badRequest());
                die();
            }
            return self::prepareReservation($data);
        }
        echo json_encode(self::badRequest(true));
        die();
    }

    const NEEDED_KEYS = array(
        "timestamp",
        "name",
        "mail",
        "phone",
        "personCount",
    );

    private static function prepareReservation($data)
    {
        $objReservation = Reservation::getInstance()
            ->setName($data['name'])
            ->setMail($data['mail'])
            ->setPhone($data['phone'])
            ->setPersonCount($data['personCount'])
            ->setStatus(Reservation::ENUM_STATUS_NEW)
            ->setDatetime(date('Y-m-d H:i:s', $data['timestamp']))->save();

        return $objReservation;
    }

    private static function goodRequest($obj)
    {
        http_response_code(200);
        return [
            'status' => 200,
            'data' => $obj,
            'error' => null
        ];
    }

    private static function badRequest($noInput = false)
    {
        http_response_code(400);
        return [
            'status' => 400,
            'data' => null,
            'error' => $noInput ? 'No Parameters sent' : 'Parameters are not valid'
        ];
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
