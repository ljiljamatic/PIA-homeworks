<?php
session_start();
include "db_conn.php";

session_destroy();
session_unset();
header("Location: index.php");