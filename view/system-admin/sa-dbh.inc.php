<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once('/Localhost/E-FINE/config/db_conn.php');
require_once('/Localhost/E-FINE/functions/main.func.php');
require_once('/Localhost/E-FINE/functions/system-admin.func.php');
