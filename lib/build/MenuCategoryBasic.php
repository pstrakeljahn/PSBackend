<?php

namespace PS\Build;

use Config;
use Exception;
use PS\Packages\Gans\Classes\MenuCategory;
use PS\Core\Database\DatabaseHelper;

class MenuCategoryBasic extends DatabaseHelper
{
    const ID = 'ID';
    const NAME = 'name';
    const TITLE = 'title';
    const POSITION = 'position';

    const TABLENAME = 'menucategories';

    const REQUIRED_VALUES = ['name', 'title', 'position'];

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