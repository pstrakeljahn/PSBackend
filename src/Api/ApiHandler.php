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
            if (in_array($method, (__NAMESPACE__ . "\Endpoints\\" . $endpoint)::ALLOWED_METHODS)) {
                $call = strtolower($method);
                $obj = (__NAMESPACE__ . "\Endpoints\\" . $endpoint)::$call();
            } else {
                $response->generateResponse(null, ['code' => Response::STATUS_CODE_BAD_REQUEST, 'message' => 'Method not allowed'], null, Response::STATUS_CODE_BAD_REQUEST);
            }
            $response->generateResponse($obj, null);
        } else {
            $response->generateResponse(null, ['code' => Response::STATUS_CODE_NOTFOUND, 'message' => 'Not found'], null, Response::STATUS_CODE_NOTFOUND);
        }
    }
}
