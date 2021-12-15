<?php
define('DB_SERVER','localhost');
define('DB_USER', 'root');
define('DB_PASS','');
define('DB_NAME','demo');

$link = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

if ($link === false) {
    die("ERROR: Could connect to DB ". mysqli_connect_error());
}

