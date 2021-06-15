<?php
session_start();
if(isset($_SESSION['username']))
{
  unset($_SESSION['username']);
  unset($_SESSION['res']);
  unset($_SESSION['deci']);
}

header("Location: index.html");
?>