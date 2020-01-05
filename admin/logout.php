<?php
session_start();
session_destroy();
session_unset($_GET['id']);

header('Location: login.php');
