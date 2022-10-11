<?php

use PS\Source\Classes\User as User;
use PS\Source\Core\Builder\ClassBuilder;
use PS\Source\Core\Logging\Logging;

require_once __DIR__ . '/autoload.php';

// Logging::generateFiles();

// $builderInstance = new ClassBuilder();
// try{
// 	$builderInstance->buildClass();
// } catch(\Exception $e) {
// 	Logging::getInstance()->add(Logging::LOG_TYPE_ERROR, $e->getMessage());
// }

// Insert admin if there is no User in the database
if (class_exists('PS\Source\Classes\User')) {
	// $arrUser = User::getInstance()->add(User::ROLE, User::ENUM_ROLE_ADMIN)->select();
	if (true) {
		$user = User::getInstance()
			->setUsername('admin')
			->setPassword(password_hash('admin', PASSWORD_DEFAULT))
			->setMail('service')
			->setFirstname('a')
			->setSurname('a')
			->setRole(User::ENUM_ROLE_ADMIN)
			->save();
		Logging::getInstance()->add(Logging::LOG_TYPE_DEBUG, 'Admin added');
	}
}
die();
