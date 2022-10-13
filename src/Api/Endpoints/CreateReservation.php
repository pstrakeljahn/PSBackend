<?php

namespace PS\Source\Api\Endpoints;

use PS\Source\Api\ApiExtender;
use PS\Source\Classes\Reservation;

class CreateReservation extends ApiExtender
{
    public function define()
    {
        $this->setAcceptableParamaters([
            "timestamp",
            "name",
            "mail",
            "phone",
            "personCount",
        ]);
        $this->setAllowedMethodes(['POST']);
    }

    public function post()
    {
        $objReservation = Reservation::getInstance()
            ->setName($this->requestParameter['name'])
            ->setMail($this->requestParameter['mail'])
            ->setPhone($this->requestParameter['phone'])
            ->setPersonCount($this->requestParameter['personCount'])
            ->setStatus(Reservation::ENUM_STATUS_NEW)
            ->setDatetime(date('Y-m-d H:i:s', $this->requestParameter['timestamp']))->save();
        $this->setResponse($objReservation);
    }
}
