<?php

use PS\Source\Helper\CreateMembership;
session_start();

// Clear session after 15min; security reasons
if(!isset($_SESSION['timer'])) {
    $_SESSION['timer'] = time();
}

if($_SESSION['timer'] < time() - 900) {
    session_destroy();
    session_start();
}
if (!isset($_SESSION['page'])) {
    $_SESSION['page'] = 0;
}
if (count($_POST)) {
    switch ($_SESSION['page']) {
		// Landing Page
		case 0:
			if(isset($_POST['option'])) {
				$_SESSION['type'] = $_POST['option'] ?? 'new';
				$_SESSION['page'] = 1;
			}
			break;
        // PAGE 1
        case 1:
            $arrRequiredFields = [
                "firstname", "street", "zip", "mail", "sport", "lastname", "number", "city", "phone", "date", "family"
            ];

            // Check fields
            foreach ($arrRequiredFields as $requiredFields) {
                if (!isset($_POST[$requiredFields]) && !isset($_SESSION['userdata']['sport'])) {
                    $valid = false;
                    break;
                }
                $valid = true;

                // Workaround to bypass select
                if (!isset($_POST['sport'])) {
                    $_POST['sport'] = $_SESSION['userdata']['sport'];
                }
                $_SESSION['userdata'][$requiredFields] = strip_tags($_POST[$requiredFields]);
                $_SESSION['family'] = $_POST['family'] === 'Ja' ? true : false;
            }
            if ($valid) {
                $_SESSION['family'] ? $_SESSION['page'] = 2 : $_SESSION['page'] = 3;
            }
            $_SESSION['timer'] = time();
            break;
        // PAGE 2
        case 2:
            $key = array_search(' X ', $_POST);
            if (is_numeric($key)) {
                unset($_SESSION['familyMembers'][$key]);
            } else {
                if (isset($_POST['add'])) {
                    $_SESSION['page'] = 2;
                }
                if (isset($_POST['back'])) {
                    $_SESSION['page'] = 1;
                }
                if (isset($_POST['go'])) {
                    $_SESSION['page'] = 3;
                }
                $arrRequiredFields = [
                    "firstname", "sport", "lastname", "date"
                ];

                $isEmpty = false;
                foreach ($arrRequiredFields as $requiredFields) {
					if(!isset($_POST[$requiredFields])) {
						$_POST[$requiredFields] = '';
					}
                    if (empty($_POST[$requiredFields])) {
                        $isEmpty = true;
                    }
					$memeberData[$requiredFields] = strip_tags($_POST[$requiredFields]);
                }
                if (!$isEmpty) {
                    $_SESSION['familyMembers'][] = $memeberData;
                }
            }
            $_SESSION['timer'] = time();
            break;
        // PAGE 3
        case 3:
            $arrRequiredFields = [
                "firstname_account", "lastname_account", "bic", "iban"
            ];

            // Check fields
            foreach ($arrRequiredFields as $requiredFields) {
                $_SESSION['userdata'][$requiredFields] = strip_tags($_POST[$requiredFields]);
            }
            if (isset($_POST['back'])) {
                $_SESSION['family'] ? $_SESSION['page'] = 2 : $_SESSION['page'] = 1;
            }
            if (isset($_POST['go'])) {
                $_SESSION['page'] = 4;
            }
            $_SESSION['timer'] = time();
            break;
        // PAGE 4
        case 4:
            if (isset($_POST['back'])) {
                $_SESSION['page'] = 3;
            }
            if (isset($_POST['go'])) {
                $creationInstance = new CreateMembership($_SESSION);
                if($creationInstance->send()) {
                    $_SESSION['page'] = 5;
                }
            }
            $_SESSION['timer'] = time();
            break;
    }
}
$include = './page/assets/page_0' . (string)$_SESSION['page'] . '.php';

// Page beginns here
include './page/assets/header.php';

// Needed to create dynmic pages
include $include;
include './page/assets/footer.php';
