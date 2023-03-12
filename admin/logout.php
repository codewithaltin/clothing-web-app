<?php
include_once "config.php";
include_once WEBROOT . "/libs/AuthenticateUser.php";

AuthenticateUser::logout();

header("Location:../login.php");

exit();