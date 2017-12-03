<?php

session_start();

require_once "env.php";
require_once "database.php";

require_once "model/Customer.php";
require_once "model/User.php";

require_once "controller/common/AbstractController.php";
require_once "controller/common/ActionController.php";
require_once "controller/common/ViewController.php";
require_once "controller/MainController.php";
require_once "controller/CustomersViewController.php";
require_once "controller/NewCustomerViewController.php";
require_once "controller/NewCustomerActionController.php";
require_once "controller/LoginViewController.php";
require_once "controller/LoginActionController.php";

require_once "routes.php";
