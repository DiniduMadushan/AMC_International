<?php
require '../classes/DbConnector.php';
require '../classes/subject.php';

use classes\subject;


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['sub_code'])) {
        $sub_code = $_GET['sub_code'];
        
        if($x = subject::deleteSubject($sub_code)){
           header("location:../index.php?status=6"); 
        }
    }
}


