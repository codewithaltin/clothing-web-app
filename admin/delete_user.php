<?php
  require_once "config.php";
  require_once WEBROOT . "models/User.php";

if(isset($_GET['id'])) {
    $id = $_GET['id'];
}
User::getbyId($id)->delete();
