<?php

session_start();

require_once "env.php";
require_once "database.php";

require_once "model/Customer.php";
require_once "model/User.php";

require_once "controller/common/AbstractController.php";
require_once "controller/MainController.php";
require_once "controller/LoginController.php";

require_once "routes.php";
