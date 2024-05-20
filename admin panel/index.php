<?php
    require './classes/DbConnector.php';
    require './classes/subject.php';
    
    use classes\subject;
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
        <title>Admin</title>
        <link rel="icon" href="" />
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap" />
        <script src="https://kit.fontawesome.com/79271f9696.js" crossorigin="anonymous"></script>
        <style>
            body {
                background-color: #0e0e0e;
                color :#ccc;
                overflow-x: hidden;
            }
            /* Hide scrollbar*/
            .modal-body::-webkit-scrollbar,
            body::-webkit-scrollbar {
                display: none;
            }

            
            .modal-body,
            body {
                -ms-overflow-style: none;
                
                scrollbar-width: none;
                
            }
        </style>
    </head>
    <body id="page-top">
        <div id="wrapper">
            <nav id="main-nav" class="navbar bg-dark align-items-start sidebar sidebar-dark accordion p-0" style="padding-bottom: 0px;">
                <div class="container-fluid d-flex flex-column p-0">
                    <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                        <div class="sidebar-brand-text mx-3">
                            <span>AMC Admin</span>
                        </div>
                    </a>
                    <hr class="sidebar-divider my-0" />
                    <ul class="navbar-nav text-light" id="accordionSidebar">
                        <li class="nav-item">
                            <a id="anchor1" class="nav-link" href="dashboard.php">
                                <i class="fas fa-tachometer-alt"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a id="anchor2" class="nav-link active" href="">
                                <i class="fa-solid fa-book"></i>
                                <span>Subject Management</span>
                            </a>
                        </li>
                        
                    </ul>
                    <a class="btn btn-primary btn-md" role="button" data-bss-hover-animate="pulse" href="../../index.php">Log Out</a>
                    <hr class="sidebar-divider my-2" />
                    <div class="text-center d-none d-md-inline">
                        <button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button>
                    </div>
                </div>
            </nav>
            <div class="d-flex flex-column" id="content-wrapper">
                <div id="content">
                    <nav class="navbar navbar-light navbar-expand-md bg-black shadow mb-4 py-3 static-top">
                        <div class="container-fluid">
                            <button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button">
                                <i class="fas fa-bars"></i>
                            </button>
                            <h4 class="d-none d-md-block" style="color:white">AMC - SUBJECT MANAGEMENT</h4>
                            <h4 class="align-self-right text-white">Hello&nbsp;&nbsp;Admin<i class="fa-solid fa-user-tie fa-xl"></i></h4>
                        </div>
                    </nav>

                    <div class="container-fluid ">
                        <h3 class="text-dark">Subject information</h3>
                        
                        <?php
                            if (isset($_GET['status'])) {
                            if ($_GET['status'] == 0) {
                                echo '<script>window.alert("please fill all the fields.");</script>';
                            }elseif ($_GET['status'] == 1) {
                               echo '<script>window.alert("please fill all the fields");</script>';
                            }
                            elseif ($_GET['status'] == 2) {
                                echo '<script>window.alert("Subject is successfully added!");</script>';
                            }elseif ($_GET['status'] == 3) {
                                echo '<script>window.alert("Error occured!");</script>';
                            }elseif ($_GET['status'] == 4) {
                                echo '<script>window.alert("updated successfully!");</script>';
                            }elseif ($_GET['status'] == 5) {
                                echo '<script>window.alert("Error occured!");</script>';
                            }elseif ($_GET['status'] == 6) {
                                echo '<script>window.alert("Successfully deleted!");</script>';
                            }
                            
                          }
                        ?>
                        
                        <!-- Button trigger modal -->
                        <button class="btn btn-primary btn-md" type="submit" data-bs-toggle="modal" data-bs-target="#addNewBook" style="float: right;">Add New Subject</button>
                        <br>
                        <hr>

                       
                        <form action="controller/addSubject.php" method="POST">
                            <!-- Modal -->
                            <div class="modal fade" id="addNewBook" tabindex="-1" aria-labelledby="addNewBookLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content bg-dark text-white">
                                        <div class="modal-header">
                                            <h5 class="modal-title h3" id="addNewBookLabel">Add New Subject</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div id="modal-body" class="modal-body">
                                            <div class="form-outline form-white h6">
                                                <label class="form-label h6" for="sub_code">Subject Code</label>
                                                <input type="text" class="form-control" id="sub_code" name="sub_code" required />
                                                <br>
                                                <label class="form-label h6" for="sub_name">Subject Name</label>
                                                <input type="text" class="form-control" id="sub_name" name="sub_name" required />
                                                <br>
                                                <label class="form-label h6" for="credits">No of credits</label>
                                                <input type="number" class="form-control" id="credits" name="credits"  required />
                                                <br>
                                                <label class="form-label h6" for="teacher">Teacher</label>
                                                <input type="text" class="form-control" id="teacher" name="teacher"  required />
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="admin_add">Add Now</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal end-->
                        </form>

                        </br>
                        </br>

                        <div class="card shadow">
                            <div class="card-body">
                                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                    <table class="table table-hover my-0 " id="dataTable">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <b>#</b>
                                                </th>
                                                <th>Subject Code</th>
                                                <th>Subject Name</th>
                                                <th>No of credits</th>
                                                <th>Teacher</th>
                                                <th style="text-align:center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php
$subject_list = subject::showAllSubjects();
$i = 1;

foreach ($subject_list as $subject) {
    ?>

    <tr>
        <td><?= $i ?></td>
        <td><?= $subject->getSub_code() ?></td>
        <td><?= $subject->getSub_name() ?></td>
        <td><?= $subject->getCredits() ?> </td>
        <td><?= $subject->getTeacher() ?></td>
        <td>
            <a type="button" class="btn btn-success" href="#" data-bs-toggle="modal" data-bs-target="#updateSubject<?= $i ?>" data-bs-whatever="@mdo">Edit</a> 
            || 
            <a type="button" class="btn btn-danger" href="#" data-bs-toggle="modal" data-bs-target="#confirmDelete<?= $i ?>">Delete</a>
        </td>
    </tr>

    <!-- Update Modal -->
    <form action="controller/updateSubject.php" method="POST">
        <div class="modal fade" id="updateSubject<?= $i ?>" tabindex="-1" aria-labelledby="updateSubjectLabel<?= $i ?>" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content bg-dark text-white">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateSubjectLabel<?= $i ?>">Update Subject Information</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-outline form-white h6">
                            <div class="form-group mb-3">
                                <label class="form-label">&nbsp;Subject Name</label>
                                <br>
                                <div class="form-group mb-3">
                                    <input class="form-control" type="text" name="sub_name" value="<?= $subject->getSub_name() ?>" required/>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">&nbsp;Credits</label>
                                <br>
                                <div class="form-group mb-3">
                                    <input class="form-control" type="number" name="credits" value="<?= $subject->getCredits() ?>" required/>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">&nbsp;Teacher</label>
                                <br>
                                <div class="form-group mb-3">
                                    <input class="form-control" type="text" name="teacher" value="<?= $subject->getTeacher() ?>" required/>
                                </div>
                            </div>
                            <input type="hidden" name="sub_code" value="<?= $subject->getSub_code() ?>"/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="update_subject">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Delete Confirmation Modal -->
    <form action="controller/deleteSubject.php" method="GET">
        <div class="modal fade" id="confirmDelete<?= $i ?>" tabindex="-1" aria-labelledby="confirmDeleteLabel<?= $i ?>" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content bg-dark text-white">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmDeleteLabel<?= $i ?>">Are you sure you want to delete the subject?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <input type="hidden" name="sub_code" value="<?= $subject->getSub_code() ?>"/>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" name="confirm_delete">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <?php
    $i++;
}
?>

                                            

                                           


                                        </tbody>
                                    </table>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
                
                <hr>                            
                <footer class="bg-black sticky-footer">

                    <div class="container my-auto">
                        <div class="text-center my-auto copyright">
                            <span style="color:white">Copyright © 2024 AMC International</span>
                        </div>
                    </div>
                </footer>
                <a class="border rounded d-inline scroll-to-top" href="#page-top">
                    <i class="fas fa-angle-up"></i>
                </a>
                <script src="assets/bootstrap/js/bootstrap.min.js"></script>
                <script src="assets/js/theme.js"></script>
            </div>
        </div>
    </body>
</html>

