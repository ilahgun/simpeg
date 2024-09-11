<?php
session_start();
// session_destroy();
unset($_SESSION['MEMBER']);
header('Location:index.php?hal=home');
