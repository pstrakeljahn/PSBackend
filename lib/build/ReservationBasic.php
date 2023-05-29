<?php

namespace PS\Build;

use Config;
use Exception;
use PS\Packages\Gans\Classes\Reservation;
use PS\Core\Database\DatabaseHelper;

class ReservationBasic extends DatabaseHelper
{
    const ID = 'ID';
    const NAME = 'name';
    const MAIL = 'mail';
    const DATETIME = 'datetime';
    const PHONE = 'phone';
    const PERSONCOUNT = 'personCount';
    const STATUS = 'status';
    const ENUM_STATUS_NEW = 'new';
    const ENUM_STATUS_ACCEPTED = 'accepted';
    const ENUM_STATUS_DECLINED = 'declined';

    const TABLENAME = 'reservations';

    const REQUIRED_VALUES = ['name', 'mail', 'datetime', 'status'];

    public function __construct()
    {
		$entityPath = Config::BASE_PATH . 'entities/' . self::getClassName() . '.json';
		if (!file_exists($entityPath)) {
			throw new Exception('Cannot instantiate class! Entity file missing.');
		}
		$entity = json_decode(file_get_contents($entityPath), true)['defintion'];
        // ID IS HARDCODED!
        $this->{'ID'} = null;
        foreach ($entity as $column) {
            $this->{$column['name']} = null;
        }
    }
    
	public static function getInstance() {
		return new Reservation();
	}

    public function getName()
	{
		return $this->{'name'};
	}

	public function setName($val): self
	{
		$this->{'name'} = $val;
		return $this;
	}

    public function getMail()
	{
		return $this->{'mail'};
	}

	public function setMail($val): self
	{
		$this->{'mail'} = $val;
		return $this;
	}

    public function getDatetime()
	{
		return $this->{'datetime'};
	}

	public function setDatetime($val): self
	{
		$this->{'datetime'} = $val;
		return $this;
	}

    public function getPhone()
	{
		return $this->{'phone'};
	}

	public function setPhone($val): self
	{
		$this->{'phone'} = $val;
		return $this;
	}

    public function getPersonCount()
	{
		return $this->{'personCount'};
	}

	public function setPersonCount($val): self
	{
		$this->{'personCount'} = $val;
		return $this;
	}

    public function getStatus()
	{
		return $this->{'status'};
	}

	public function setStatus($val): self
	{
		$this->{'status'} = $val;
		return $this;
	}
}