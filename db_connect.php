<?php

define("LOCALHOST", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE", "pgdit_2017");


$db = new mysqli(LOCALHOST,USERNAME,PASSWORD,DATABASE);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}