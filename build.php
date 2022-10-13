<?php

use PS\Source\Classes\User as User;
use PS\Source\Core\Builder\ClassBuilder;
use PS\Source\Core\Logging\Logging;

require_once __DIR__ . '/autoload.php';

Logging::generateFiles();

// $builderInstance = new ClassBuilder();
// try {
// 	$builderInstance->buildClass();
// } catch (\Exception $e) {
// 	Logging::getInstance()->add(Logging::LOG_TYPE_ERROR, $e->getMessage());
// }

// // Insert admin if there is no User in the database
// if (class_exists('PS\Source\Classes\User')) {
// 	// $arrUser = User::getInstance()->add(User::ROLE, User::ENUM_ROLE_ADMIN)->select();
// 	if (true) {
// 		$user = User::getInstance()
// 			->setUsername('service')
// 			->setPassword(password_hash('', PASSWORD_DEFAULT))
// 			->setMail('service')
// 			->setFirstname('')
// 			->setSurname('')
// 			->setRole(User::ENUM_ROLE_USER)
// 			->save();
// 		Logging::getInstance()->add(Logging::LOG_TYPE_DEBUG, 'Service added');
// 	}
// }
die();
