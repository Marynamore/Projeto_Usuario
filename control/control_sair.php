<?php
session_start();

unset($_SESSION['id_usuario'], $_SESSION['nome_usu']);
session_destroy();
header("Location: ../index.php");
exit;