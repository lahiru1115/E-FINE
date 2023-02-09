<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
require_once('../../database/db_conn.php');
require_once('../../database/main.func.php');
require_once('../../database/system-admin.func.php');
