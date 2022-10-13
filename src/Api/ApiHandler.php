<?php

namespace PS\Source\Api;

use PS\Source\Core\RequestHandler\Response;

class ApiHandler
{
    public static function run($path, $method)
    {
        $response = new Response();
        if (count($path) !== 3) {
            $response->generateResponse(null, ['code' => Response::STATUS_CODE_NOTFOUND, 'message' => 'Not found'], null, Response::STATUS_CODE_NOTFOUND);
        }

        // Get Endpoint
        $endpoint = $path[2];
        if (class_exists(__NAMESPACE__ . "\Endpoints\\" . $endpoint)) {
            $call = strtolower($method);
            $class = __NAMESPACE__ . "\Endpoints\\" . $endpoint;
            $obj = new $class;
            $obj->define();
            if (!is_callable([$obj, $call])) {
                $response->generateResponse(null, ['code' => Response::STATUS_CODE_BAD_REQUEST, 'message' => 'Method not allowed'], null, Response::STATUS_CODE_BAD_REQUEST);
                return;
            }
            if ($obj->getAcceptableParamaters() != array_keys($obj->requestParameter)) {
                echo json_encode($obj->badRequest());
                die();
            }
            $obj->$call();
            $response->generateResponse($obj->response, $obj->error);
        } else {
            $response->generateResponse(null, ['code' => Response::STATUS_CODE_NOTFOUND, 'message' => 'Not found'], null, Response::STATUS_CODE_NOTFOUND);
        }
    }
}
