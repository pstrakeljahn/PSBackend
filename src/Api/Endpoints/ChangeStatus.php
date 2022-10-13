<?php

namespace PS\Source\Api\Endpoints;

use PS\Source\Api\ApiExtender;
use PS\Source\Classes\Reservation;

class ChangeStatus extends ApiExtender
{

    public function define()
    {
        $this->setAcceptableParamaters([
            "ID",
            "status"
        ]);
        $this->setAllowedMethodes(['POST']);
    }

    public function post()
    {
        if (!in_array(($this->requestParameter['status']), [Reservation::ENUM_STATUS_ACCEPTED, Reservation::ENUM_STATUS_DECLINED])) {
            $this->setResponse([], 'Status not allowed');
            return;
        }
        $objReservation = Reservation::getInstance()
            ->add(Reservation::ID, $this->requestParameter['ID'])->select();
        $objReservation[0]->setStatus($this->requestParameter['status'])->save();
        $this->setResponse($objReservation);
    }
}
