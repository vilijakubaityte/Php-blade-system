<?php

use models\Company;
use eftec\bladeone\BladeOne;
require_once "vendor/autoload.php";

//require_once "helper/DB.php";
//require_once "models/Company.php";
//require_once "models/Customer.php";
//require_once "models/Conversation.php";

if (isset($_GET['delete'])){
    Company::get($_GET['delete'])->delete();
    header("location: index.php");
    die();
}

$blade=new BladeOne(__DIR__."/views", __DIR__."/compile",BladeOne::MODE_DEBUG);
echo $blade->run("index");


echo \helper\Test::test();


