<?php
require '../classes/DbConnector.php';
require '../classes/subject.php';

use classes\subject;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['sub_code'],$_POST['sub_name'], $_POST['credits'], $_POST['teacher'])) {

        if (!empty($_POST['sub_code'] && $_POST['sub_name'] && $_POST['credits'] && $_POST['teacher'])) {

            $sub_code = $_POST['sub_code'];
            $sub_name = $_POST['sub_name'];
            $credits = $_POST['credits'];
            $teacher = $_POST['teacher'];

           


            try {

                $x = subject::updateSubject($sub_name, $credits, $teacher, $sub_code);

                if ($x) {
                    header("location:../index.php?status=4");

                } else {
                    header("location:../index.php?status=5");
                }
            } catch (PDOException $exc) {
                echo $exc->getMessage();
            }
        } else {
             header("location:../index.php?status=1");
        }
    } else {

        header("location:../index.php?status=0");
    }
}

