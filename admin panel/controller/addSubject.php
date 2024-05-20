<?php

require '../classes/DbConnector.php';
require '../classes/subject.php';


use classes\subject;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['sub_code'], $_POST['sub_name'], $_POST['credits'], $_POST['teacher'])) {

        if (!empty($_POST['sub_code'] && $_POST['sub_name'] && $_POST['credits'] && $_POST['teacher'] )) {

            $sub_code = $_POST['sub_code'];
            $sub_name = $_POST['sub_name'];
            $credits = $_POST['credits'];
            $teacher = $_POST['teacher'];

            try {

                $subject = new subject($sub_code, $sub_name, $credits, $teacher);

                if ($subject->addSubject()) {
                    header("Location:../index.php?status=2");
                } else {
                    header("Location:../index.php?status=3");
                }
            } catch (PDOException $exc) {
                echo $exc->getMessage();
            }
        } else {
             header("Location:../index.php?status=1");
        }
    } else {

        header("Location:../index.php?status=0");
    }
}


