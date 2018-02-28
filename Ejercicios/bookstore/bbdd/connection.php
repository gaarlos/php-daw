<?php
  require_once('config/config.php');
  $db = new PDO(DBNAME, USER, PASSWORD);
  $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
?>