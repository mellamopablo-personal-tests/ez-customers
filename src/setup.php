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

require_once "controller/customers/CustomerViewController.php";
require_once "controller/customers/CustomerListViewController.php";
require_once "controller/customers/NewCustomerViewController.php";
require_once "controller/customers/NewCustomerActionController.php";
require_once "controller/customers/UpdateCustomerActionController.php";
require_once "controller/customers/DeleteCustomerActionController.php";

require_once "controller/customers/bills/NewBillViewController.php";
require_once "controller/customers/bills/NewBillActionController.php";
require_once "controller/customers/bills/BillViewController.php";
require_once "controller/customers/bills/UpdateBillActionController.php";
require_once "controller/customers/bills/DeleteBillActionController.php";

require_once "controller/users/UserListViewController.php";
require_once "controller/users/NewUserViewController.php";
require_once "controller/users/NewUserActionController.php";
require_once "controller/users/UserViewController.php";
require_once "controller/users/UpdateUserActionController.php";
require_once "controller/users/DeleteUserActionController.php";

require_once "controller/LoginViewController.php";
require_once "controller/LoginActionController.php";
require_once "controller/NotFoundViewController.php";
require_once "controller/MainController.php";

require_once "routes.php";
