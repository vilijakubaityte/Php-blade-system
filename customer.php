<?php

use eftec\bladeone\BladeOne;
use models\Company;

require_once "vendor/autoload.php";

$id=$_GET['id'];
$company=Company::get($id);

$blade=new BladeOne(__DIR__."/views", __DIR__."/compile",BladeOne::MODE_DEBUG);
echo $blade->run("customer", [
        "company"=>$company
]);

