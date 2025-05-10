<?php

include 'functions.php';



if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $connection = connection('mysql', 'CRUD_db', 'user', '123');
    delete($connection, $_GET['id']);
    header('location: index.php');
}