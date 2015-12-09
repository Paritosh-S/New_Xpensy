<?php
session_start();
echo $_SESSION['pname'];
echo substr($_SESSION['userid'],12);
echo $_SESSION['login'];
?>