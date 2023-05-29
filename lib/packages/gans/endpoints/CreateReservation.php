<?php

namespace PS\Source\Endpoints;

use DateTime;
use PS\Core\Api\ApiExtender;
use PS\Core\RequestHandler\Response;
use PS\Source\Classes\Reservation;

class CreateReservation extends ApiExtender
{

    public function define()
    {
        $this->setAcceptableParamaters([
            'timestamp',
            Reservation::NAME,
            Reservation::MAIL,
            Reservation::PHONE,
            Reservation::PERSONCOUNT
        ]);
        $this->setAllowedMethodes(['POST']);
        $this->setNeedsAuth(false);
    }

    public function post()
    {
        if (filter_var($this->requestParameter[Reservation::MAIL], FILTER_VALIDATE_EMAIL)) {
            $reservation = new Reservation;
            $date = new DateTime();
            $date->setTimestamp($this->requestParameter['timestamp']);
            $reservation->setName($this->requestParameter[Reservation::NAME])
                ->setMail($this->requestParameter[Reservation::MAIL])
                ->setDatetime($date->format('Y-m-d H:i:s'))
                ->setPhone($this->requestParameter[Reservation::PHONE])
                ->setPersonCount($this->requestParameter[Reservation::PERSONCOUNT])
                ->setStatus(Reservation::ENUM_STATUS_NEW)
                ->save();

            $this->setResponse($reservation, null, Response::STATUS_CODE_OK);
        } else {
            $this->setResponse(null, 'Invalid E-Mail', Response::STATUS_CODE_BAD_REQUEST);
        }
    }
}
