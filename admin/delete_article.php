<?php
  require_once "config.php";
  require_once WEBROOT . "models/Article.php";

if(isset($_GET['id'])) {
    $id = $_GET['id'];
}
Article::getbyId($id)->delete();
