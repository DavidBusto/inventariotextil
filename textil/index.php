<?php
include_once './controllers/controlLogin.php';
if (isset($_POST['submit'])) {
   loginUser($_POST['usuario'],$_POST['password']);
}

include_once './views/login.php';
?>