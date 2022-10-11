<?php

namespace PS\Source\BasicClasses;

use Exception;
use PS\Source\Classes\Menu;
use PS\Source\Core\Database\DatabaseHelper;

class MenuBasic extends DatabaseHelper
{
    const ID = 'ID';
    const NAME = 'name';
    const PRICE = 'price';
    const DESCRIPTION = 'description';
    const SIZE = 'size';
    const MENUCATEGORYID = 'MenuCategoryID';
    const POSITION = 'position';
    const HIDDEN = 'hidden';

    const REQUIRED_VALUES = ['name', 'price', 'MenuCategoryID', 'position'];

    public function __construct()
    {
        $entityPath = __DIR__.'/../../entities/' . self::getClassName() . '.php';
        if (!file_exists($entityPath)) {
            throw new Exception('Cannot instantiate class! Entity file missing.');
        }
        $entity = include($entityPath);
        // ID IS HARDCODED!
        $this->{'ID'} = null;
        foreach ($entity as $column) {
            $this->{$column['name']} = null;
        }
    }
    
	public static function getInstance() {
		return new Menu();
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

    public function getPrice()
	{
		return $this->{'price'};
	}

	public function setPrice($val): self
	{
		$this->{'price'} = $val;
		return $this;
	}

    public function getDescription()
	{
		return $this->{'description'};
	}

	public function setDescription($val): self
	{
		$this->{'description'} = $val;
		return $this;
	}

    public function getSize()
	{
		return $this->{'size'};
	}

	public function setSize($val): self
	{
		$this->{'size'} = $val;
		return $this;
	}

    public function getMenuCategoryID()
	{
		return $this->{'MenuCategoryID'};
	}

	public function setMenuCategoryID($val): self
	{
		$this->{'MenuCategoryID'} = $val;
		return $this;
	}

    public function getPosition()
	{
		return $this->{'position'};
	}

	public function setPosition($val): self
	{
		$this->{'position'} = $val;
		return $this;
	}

    public function getHidden()
	{
		return $this->{'hidden'};
	}

	public function setHidden($val): self
	{
		$this->{'hidden'} = $val;
		return $this;
	}
}