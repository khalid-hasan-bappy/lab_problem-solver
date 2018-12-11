<?php
/**
 * Created by PhpStorm.
 * User: Selim Reza
 * Date: 7/8/2018
 * Time: 11:08 PM
 */
@session_start();
session_destroy();
header('Location:login.php');