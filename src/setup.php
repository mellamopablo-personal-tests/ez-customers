<?php

session_start();

require_once "env.php";
require_once "database.php";

require_once "model/Bill.php";
require_once "model/Customer.php";
require_once "model/User.php";

require_once "controller/common/AbstractController.php";
require_once "controller/common/ActionController.php";
require_once "controller/common/ViewController.php";
require_once "controller/MainController.php";
require_once "controller/CustomerViewController.php";
require_once "controller/CustomerListViewController.php";
require_once "controller/NewCustomerViewController.php";
require_once "controller/NewCustomerActionController.php";
require_once "controller/LoginViewController.php";
require_once "controller/LoginActionController.php";
require_once "controller/NotFoundViewController.php";
require_once "controller/UpdateCustomerActionController.php";
require_once "controller/DeleteCustomerActionController.php";
require_once "controller/UserListViewController.php";
require_once "controller/NewUserViewController.php";
require_once "controller/NewUserActionController.php";
require_once "controller/UserViewController.php";
require_once "controller/UpdateUserActionController.php";
require_once "controller/DeleteUserActionController.php";
require_once "controller/NewBillViewController.php";
require_once "controller/NewBillActionController.php";
require_once "controller/BillViewController.php";

require_once "routes.php";
