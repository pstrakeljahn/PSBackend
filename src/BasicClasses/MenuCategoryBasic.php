<?php

namespace PS\Source\BasicClasses;

use Exception;
use PS\Source\Classes\MenuCategory;
use PS\Source\Core\Database\DatabaseHelper;

class MenuCategoryBasic extends DatabaseHelper
{
    const ID = 'ID';
    const NAME = 'name';
    const TITLE = 'title';
    const POSITION = 'position';

    const REQUIRED_VALUES = ['name', 'title', 'position'];

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
		return new MenuCategory();
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

    public function getTitle()
	{
		return $this->{'title'};
	}

	public function setTitle($val): self
	{
		$this->{'title'} = $val;
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
}