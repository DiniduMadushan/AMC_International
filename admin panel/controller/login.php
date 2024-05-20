<?php

$admin_mail="admin@gmail.com";
$admin_pass="admin";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['email'], $_POST['password'])) {

        if (!empty($_POST['email'] && $_POST['password'])) {

            $email = $_POST['email'];
            $password = $_POST['password'];

            if($admin_mail===$email && $admin_pass===$password){
                header("Location:../dashboard.php?");
            }else{
                header("Location:../../login.php?status=2");
            }

            
        } else {
             header("Location:../../login.php?status=1");
        }
    } else {

        header("Location:../../login.php?status=0");
    }
}
