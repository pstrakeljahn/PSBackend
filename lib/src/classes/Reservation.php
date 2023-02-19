<?php

namespace PS\Source\Classes;

use DateTime;
use PS\Build\ReservationBasic;
use PS\Core\Mail\MailHelper;

/*
*   Logic can be implemented here that is not overwritten
*/

class Reservation extends ReservationBasic
{
    public function savePre()
    {
        $mail = new MailHelper;
        $date = new DateTime;
        $date->setTimestamp(strtotime($this->getDatetime()));
        if ($this->getStatus() === self::ENUM_STATUS_NEW) {
            $mail->createMail($this->getMail(), 'Tischreservierung - ' . $date->format('d.m.o'), $this->prepareTextNew($date));
        } elseif ($this->getStatus() === self::ENUM_STATUS_ACCEPTED) {
            $mail->createMail($this->getMail(), 'Tischreservierung - ' . $date->format('d.m.o'), $this->prepareTextAccepted($date));
        } elseif ($this->getStatus() === self::ENUM_STATUS_DECLINED) {
            $mail->createMail($this->getMail(), 'Tischreservierung - ' . $date->format('d.m.o'), $this->prepareTextDeclined($date));
        }
        $mail->send();
    }

    private function prepareTextNew($date): string
    {
        return "Hallo " . $this->getName() . ",\n\nwir freuen uns, dass Sie mit " . $this->getPersonCount() . " Personen zu uns kommen wollen. Der Reservierungswunsch für den " . $date->format('d.m.o') . " um " . $date->format('H:i') . " Uhr ist bei uns eingegangen. Zeitnah erhalten Sie Antwort ob wir Ihre Reservierung annehmen können.\n\nGruß\nIhr Gans-Team";
    }

    private function prepareTextAccepted($date): string
    {
        return "Hallo " . $this->getName() . ",\n\ndie Reservierung konnte erfolgreich angenommen werden. Wir freuen uns schon auf Euren Besuch.\n\nGruß\nIhr Gans-Team";
    }

    private function prepareTextDeclined($date): string
    {
        return "Hallo " . $this->getName() . ",\n\nleider könne wir an diesem Tag keine Reservierungen mehr annehemen. Aber schaut gern spontan vorbei. Platz ist bei uns immer.\n\nGruß\nIhr Gans-Team";
    }
}
