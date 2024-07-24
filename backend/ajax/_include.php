<?php
session_start();
error_reporting(E_ERROR | E_PARSE);

require '../../../../../core/vendor/autoload.php';
use Medoo\Medoo;

define("SE_SECTION", "backend");

if($_SESSION['user_class'] != "administrator"){
    //header("location:../../index.php");
    die("PERMISSION DENIED!");
}

require '../../../../../config.php';
if(is_file('../../../../'.SE_CONTENT.'/config.php')) {
    include '../../../../'.SE_CONTENT.'/config.php';
}

if($_POST['csrf_token'] !== $_SESSION['token']) {
    die('Error: CSRF Token is invalid');
}

include '../../../../../acp/core/icons.php';
$languagePack = $_SESSION['lang'];
include '../../../../../core/lang/index.php';
