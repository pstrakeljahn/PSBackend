<?php

namespace PS\Source\Endpoints;

use PS\Core\Api\ApiExtender;
use PS\Core\RequestHandler\Response;
use PS\Source\Classes\Reservation;

class SetReservationStatus extends ApiExtender
{

    public function define()
    {
        $this->setAcceptableParamaters([
            Reservation::ID,
            Reservation::STATUS
        ]);
        $this->setAllowedMethodes(['POST']);
    }

    public function post()
    {
        if (in_array($this->requestParameter[Reservation::STATUS], [Reservation::ENUM_STATUS_ACCEPTED, Reservation::ENUM_STATUS_DECLINED])) {
            $reservation = Reservation::getInstance()->getByPK($this->requestParameter[Reservation::ID]);
            if ($reservation) {
                $reservation->setStatus($this->requestParameter[Reservation::STATUS])->save();
                $this->setResponse($reservation, null, Response::STATUS_CODE_OK);
            } else {
                $this->setResponse(null, 'Reservation ID not found', Response::STATUS_CODE_BAD_REQUEST);
            }
        } else {
            $this->setResponse(null, 'Status is not valid', Response::STATUS_CODE_BAD_REQUEST);
        }
    }
}
