<?php

namespace PS\Source\Settings;

class Config
{

    // AUTOLOADER CONFIG
    const PREFIX = 'PS\\Source\\';
    const BASE_DIR = __DIR__ . '/src/';

    // DATABASE CONNECTION
    const SERVERNAME = 'remotemysql.com';
    const USERNAME = 'wywmQwYBfw';
    const PASSWORD = 'IWqYyHOuOj';
    const DATABASE = 'wywmQwYBfw';

    // const SERVERNAME = 'db5010419335.hosting-data.io';
    // const USERNAME = 'dbu1959114';
    // const PASSWORD = 'Demhundtseinzugang1!';
    // const DATABASE = 'dbs8827251';

    // JWT Configuration (exp in seconds / null is forever)
    const SECRET = "asjdfhkj&/(13asd";
    const EXPIRATION = null;
}
