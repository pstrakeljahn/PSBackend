<?php

namespace PS\Source\Api;

use PS\Source\Core\RequestHandler\Response;

class ApiExtender
{

    public function __construct()
    {
        $this->acceptableParamaters = array();
        $this->allowsMethodes = array();
        $this->requestParameter = array();
        if (file_get_contents('php://input') !== "") {
            parse_str(file_get_contents('php://input'), $requestParameter);
            $this->setHeaders();
            $this->requestParameter = $requestParameter;
        }
    }

    protected function setAllowedMethodes($allowsMethodes)
    {
        $this->allowsMethodes = $allowsMethodes;
        return $this;
    }

    public function getAllowsMethodes(): array
    {
        return $this->allowsMethodes;
    }

    protected function setAcceptableParamaters($acceptableParamaters)
    {
        $this->acceptableParamaters = $acceptableParamaters;
        return $this;
    }

    public function getAcceptableParamaters(): array
    {
        return $this->acceptableParamaters;
    }

    protected function setResponse($response, $error = null, $status = null)
    {
        $this->response = $response;
        $this->error = ['code' => !is_null($status) ? $status : Response::STATUS_CODE_BAD_REQUEST, 'message' => $error];
    }

    private function setHeaders(): void
    {
        header('Content-Type: application/json, charset=utf-8');
        header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
        header("Access-Control-Allow-Origin: *");
        header('Access-Control-Allow-Method: POST, GET, OPTIONS');
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Allow-Headers: Authorization, Content-Type, x-xsrf-token, x_csrftoken, Cache-Control, X-Requested-With, pragma');
    }

    public function badRequest($noInput = false)
    {
        http_response_code(400);
        return [
            'status' => 400,
            'data' => null,
            'error' => $noInput ? 'No Parameters sent' : 'Parameters are not valid'
        ];
    }
}
