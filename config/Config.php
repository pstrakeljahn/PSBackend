<?php

class Config
{
    // GLOBALS
    const BASE_PATH = __DIR__ . '/../';

    // DATABASE CONNECTION
    const SERVERNAME = 'localhost';
    const USERNAME = 'root';
    const PASSWORD = '';
    const DATABASE = 'gans';

    // JWT Configuration (exp in seconds / null is forever)
    const SECRET = "asjdfhkj&/(13asd";
    const EXPIRATION = "7200";

    // Mail Server information
    const MAIL_SENDER = "Grüne Gans Osnabrück";
    const MAIL_HOST = "";
    const MAIL_PORT = "";
    const MAIL_USERNAME = "";
    const MAIL_PASSWORD = "";
}
