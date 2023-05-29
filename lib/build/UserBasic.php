<?php

namespace PS\Build;

use Config;
use Exception;
use PS\Packages\System\Classes\User;
use PS\Core\Database\DatabaseHelper;

class UserBasic extends DatabaseHelper
{
	const ID = 'ID';
	const USERNAME = 'username';
	const PASSWORD = 'password';
	const MAIL = 'mail';
	const FIRSTNAME = 'firstname';
	const SURNAME = 'surname';
	const DATEOFBIRTH = 'dateofbirth';
	const STREET = 'street';
	const NUMBER = 'number';
	const ZIP = 'zip';
	const CITY = 'city';
	const PHONE = 'phone';
	const ROLE = 'role';
	const ENUM_ROLE_ADMIN = 'admin';
	const ENUM_ROLE_USER = 'user';

	const TABLENAME = 'users';

	const REQUIRED_VALUES = ['username', 'password', 'mail', 'firstname', 'surname', 'street', 'number', 'zip', 'city', 'phone', 'role'];

	public function __construct()
	{

		$classIndex = require(Config::BASE_PATH . 'lib/build/_index.php');
		$className = self::getClassName();
		$namespace = isset($classIndex[$className]) ? $classIndex[$className] : "";
		$explodedString = explode("\\", $namespace);
		if (!count($explodedString)) {
			throw new Exception('Cannot instantiate class! Entity file missing.');
		};



		$entityPath = Config::BASE_PATH . 'lib/packages/' . strtolower($explodedString[2]) . '/database/' . $explodedString[4] . '.json';
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

	public static function getInstance()
	{
		return new User();
	}

	public function getUsername()
	{
		return $this->{'username'};
	}

	public function setUsername($val): self
	{
		$this->{'username'} = $val;
		return $this;
	}

	public function getPassword()
	{
		return $this->{'password'};
	}

	public function setPassword($val): self
	{
		$this->{'password'} = $val;
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

	public function getFirstname()
	{
		return $this->{'firstname'};
	}

	public function setFirstname($val): self
	{
		$this->{'firstname'} = $val;
		return $this;
	}

	public function getSurname()
	{
		return $this->{'surname'};
	}

	public function setSurname($val): self
	{
		$this->{'surname'} = $val;
		return $this;
	}

	public function getDateofbirth()
	{
		return $this->{'dateofbirth'};
	}

	public function setDateofbirth($val): self
	{
		$this->{'dateofbirth'} = $val;
		return $this;
	}

	public function getStreet()
	{
		return $this->{'street'};
	}

	public function setStreet($val): self
	{
		$this->{'street'} = $val;
		return $this;
	}

	public function getNumber()
	{
		return $this->{'number'};
	}

	public function setNumber($val): self
	{
		$this->{'number'} = $val;
		return $this;
	}

	public function getZip()
	{
		return $this->{'zip'};
	}

	public function setZip($val): self
	{
		$this->{'zip'} = $val;
		return $this;
	}

	public function getCity()
	{
		return $this->{'city'};
	}

	public function setCity($val): self
	{
		$this->{'city'} = $val;
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

	public function getRole()
	{
		return $this->{'role'};
	}

	public function setRole($val): self
	{
		$this->{'role'} = $val;
		return $this;
	}
}
