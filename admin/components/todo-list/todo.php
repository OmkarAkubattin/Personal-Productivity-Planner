<?php 
    include "../../../conn.php";
    session_start();
    $id=$_SESSION['id'];
    if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['add-task'])){
        $result=sql_query("INSERT INTO `todo` (`name`,`disc`,`created`,`time`,`tag`, `fk_user`) VALUES ('".$_POST['name']."','".$_POST['disc']."','".$_POST['created']."','".$_POST['time']."','".$_POST['tag']."', '$id')");
    }
    if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['del-task'])){
        $result=sql_query("UPDATE `todo` SET `trash` = '1' WHERE `id` = ".$_POST['del-task']."");
    }
    if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['complete-task'])){
        $result=sql_query("UPDATE `todo` SET `status` = '1' WHERE `id` = ".$_POST['complete-task']."");
    }
    if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['update-task'])){
        // die("UPDATE `todo` SET `name`='".$_POST['name']."',`disc`='".$_POST['disc']."',`created`='".$_POST['created']."',`time`='".$_POST['time']."',`tag`='".$_POST['tag']."' WHERE `id` = ".$_POST['update-task']."");
        $result=sql_query("UPDATE `todo` SET `name`='".$_POST['name']."',`disc`='".$_POST['disc']."',`created`='".$_POST['created']."',`time`='".$_POST['time']."',`tag`='".$_POST['tag']."' WHERE `id` = ".$_POST['update-task']."");
    }
    // if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['date-change'])){
    //     $result=sql_query("UPDATE `todo` SET `created` = '".$_POST['date-change']."' WHERE `id` = ".$_SESSION['task-id']."");
    // }
    // if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['time-change'])){
    //     $result=sql_query("UPDATE `todo` SET `time` = '".$_POST['time-change']."' WHERE `id` = ".$_SESSION['task-id']."");
    // }
    // if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['disc-change'])){
    //     $result=sql_query("UPDATE `todo` SET `disc` = '".$_POST['disc-change']."' WHERE `id` = ".$_SESSION['task-id']."");
    // }
    // if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['tag-change'])){
    //     $result=sql_query("UPDATE `todo` SET `tag` = '".$_POST['tag-change']."' WHERE `id` = ".$_SESSION['task-id']."");
    // }

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="/Personal-Productivity-Planner/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
        type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/Personal-Productivity-Planner/admin/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="/Personal-Productivity-Planner/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous">
        </script>
    <script>
        $(function () {
            $("#sidebar").load("/Personal-Productivity-Planner/admin/sidebar.php");
            $("#nav").load("/Personal-Productivity-Planner/admin/nav.php");
            $("#footer").load("/Personal-Productivity-Planner/admin/footer.html");
        });
    </script>
    <style>
        .todo-nav {
            margin-top: 10px
        }

        .todo-list {
            margin: 10px 0
        }

        .todo-list .todo-item {
            padding: 5px;
            margin: 5px 0;
            border-radius: 0;
            background: #ffffff
        }
        .todo-list.only-active .todo-item.complete {
            display: none
        }

        .todo-list.only-active .todo-item:not(.complete) {
            display: block
        }

        .todo-list.only-complete .todo-item:not(.complete) {
            display: none
        }

        .todo-list.only-complete .todo-item.complete {
            display: block
        }

        .todo-list .todo-item.complete span {
            text-decoration: line-through
        }

        .remove-todo-item {
            color: #ccc;
            visibility: hidden
        }

        .remove-todo-item:hover {
            color: #5f5f5f
        }

        .todo-item:hover .remove-todo-item {
            visibility: visible
        }

        div.checker {
            width: 18px;
            height: 18px
        }

        div.checker input,
        div.checker span {
            width: 18px;
            height: 18px
        }

        div.checker span {
            display: -moz-inline-box;
            display: inline-block;
            zoom: 1;
            text-align: center;
            background-position: 0 -260px;
        }

        div.checker,
        div.checker input,
        div.checker span {
            width: 19px;
            height: 19px;
        }

        div.checker,
        div.radio,
        div.uploader {
            position: relative;
        }

        div.button,
        div.button *,
        div.checker,
        div.checker *,
        div.radio,
        div.radio *,
        div.selector,
        div.selector *,
        div.uploader,
        div.uploader * {
            margin: 0;
            padding: 0;
        }

        div.button,
        div.checker,
        div.radio,
        div.selector,
        div.uploader {
            display: -moz-inline-box;
            display: inline-block;
            zoom: 1;
            vertical-align: middle;
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar"></div>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <div id="nav"></div>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                <!-- Page Heading -->

                            
                <div class="card shadow mb-4 mt-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tasks</h6>
                        </div>
                        <div class="card-body">
                            <?php
                        if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['edit-task'])){
                            $result=sql_query("SELECT * FROM `todo` WHERE `fk_user`='$id' and `id`='".$_POST['edit-task']."' ");
                            if (mysqli_num_rows($result) >0) {
                            while($row = mysqli_fetch_assoc($result)){
                        echo '           
                        <form class="row" action="todo.php" method="POST">
                            <div class="col-xl-3 col-md-6 ">
                                <label for="exampleFormControlTextarea1">Task Name</label>
                                <input type="text" name="name" class="mr-2 form-control add-task" value="'.$row['name'].'" placeholder="What do you need to do today?" required>
                                <div class="my-4"><span><label for="exampleFormControlTextarea1">Date</label>
                                <input name="created" value="'.$row['created'].'" type="date" required></span>
                                <span class="float-right"><label for="exampleFormControlTextarea1">Time</label>
                                <input type="time" value="'.$row['time'].'" name="time" step=900></span></div>
                                <button type="submit" name="update-task" value="'.$row['id'].'" class="add btn btn-primary btn-block font-weight-bold todo-list-add-btn">Update Task</button>
                            </div>
                            <div class="col-xl-9 col-md-6">
                                <label for="exampleFormControlTextarea1" required>Task Description</label>
                                <textarea class="form-control" name="disc" rows="3">'.$row['disc'].'</textarea>
                                <label for="exampleFormControlTextarea1">Task Tags</label>
                                <select class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon">';
                                $result1=sql_query("SELECT DISTINCT tag FROM `todo` WHERE tag != '' and `fk_user`='$id'");
                                if (mysqli_num_rows($result1) >0) {
                                while($row1 = mysqli_fetch_assoc($result1)){
                                if($row['tag']==$row1['tag']) echo '<option value="'.$row1['tag'].'">'.$row1['tag'].'</option>';
                                else echo '<option value="'.$row1['tag'].'">'.$row1['tag'].'</option>';}}
                                echo'</select>
                            </div>
                            </div>
                        </form>';}}
                    }
                    else{
                    echo '           
                    <form class="row" action="todo.php" method="POST">
                        <div class="col-xl-3 col-md-6 ">
                            <label for="exampleFormControlTextarea1">Task Name</label>
                            <input type="text" name="name" class="mr-2 form-control add-task" placeholder="What do you need to do today?" required>
                            <div class="my-4"><span><label for="exampleFormControlTextarea1">Date</label>
                            <input name="created" type="date" required></span>
                            <span class="float-right"><label for="exampleFormControlTextarea1">Time</label>
                            <input type="time" name="time" step=900></span></div>
                            <button type="submit" name="add-task" class="add btn btn-primary btn-block font-weight-bold todo-list-add-btn">Add New Task</button>
                        </div>
                        <div class="col-xl-9 col-md-6">
                            <label for="exampleFormControlTextarea1" required>Task Description</label>
                            <textarea class="form-control" name="disc" rows="3"></textarea>
                            <label for="exampleFormControlTextarea1">Task Tags</label>
                            <select name="tag" class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon">';
                                $result1=sql_query("SELECT DISTINCT tag FROM `todo` WHERE tag != '' and `fk_user`='$id'");
                                if (mysqli_num_rows($result1) >0) {
                                while($row1 = mysqli_fetch_assoc($result1)){
                                echo '<option value="'.$row1['tag'].'">'.$row1['tag'].'</option>';}}
                                echo'</select>
                        </div>
                        
                        </div>
                    </form>';
                }
                    ?>
                        </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tasks</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Status</th>
                                                <th>Tag</th>
                                                <th>Modity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $result=sql_query("SELECT * FROM `todo` WHERE `fk_user`='$id' and `trash`= 0 ORDER BY `status` ASC");
                                            if (mysqli_num_rows($result) >0) {
                                            while($row = mysqli_fetch_assoc($result)){
                                                $date=strtotime($row["created"]);
                                                $strdate=strval(date('d-M-y', $date));
                                                $today=strtotime("now");
                                                $tomorrow=strtotime("tomorrow");
                                                $yesterday=strtotime("yesterday");
                                                $time=strtotime($row["time"]);
                                                $strtime=strval(date('H:i a', $time));
                                                echo '
                                                    <tr>
                                                    <td><form action="todo.php" method="POST"><div class="checker"><input type="checkbox" onChange="this.form.submit()" name="complete-task" value="'.$row['id'].'"></div></form></td>
                                                    <td>'.$row['name'].'</td>
                                                    <td>'.$row['disc'].'</td>
                                                    <td>';
                                                    if(strval(date('d-M-y', $today))==strval(date('d-M-y', $date))){echo "Today";}
                                                    else if(strval(date('d-M-y', $tomorrow))==strval(date('d-M-y', $date))){echo "Tomorrow";}
                                                    else if(strval(date('d-M-y', $yesterday))==strval(date('d-M-y', $date))){echo "Yesterday";}else{echo $strdate;}
                                                echo'</td>
                                                    <td>'.$strtime.'</td>
                                                    <td>';
                                                    if($row['status']==1){echo '<span class="badge badge-pill badge-success mb-2 ">Completed</span>';}else if($row['status']==0 and date('d-M-y', $today)>date('d-M-y', $date)){echo '<span class="badge badge-pill badge-danger mb-2 ">Due</span>';}else{echo '<span class="badge badge-pill badge-warning mb-2 ">Pending</span>';}
                                                echo'</td>
                                                    <td>'.$row['tag'].'</td>
                                                    <td><form action="todo.php" method="POST"><span><button class="btn btn-sm btn-primary" type="submit" name="edit-task" value="'.$row['id'].'">Edit</button><button type="submit" name="del-task" value="'.$row['id'].'" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button></span></form></td>

                                                </tr>';
                                                    }
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Your Website 2020</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="/Personal-Productivity-Planner/admin/#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="/Personal-Productivity-Planner/admin/login.html">Logout</a>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>                                        
        <!-- Bootstrap core JavaScript-->
        <script src="/Personal-Productivity-Planner/admin/vendor/jquery/jquery.min.js"></script>
        <script src="/Personal-Productivity-Planner/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="/Personal-Productivity-Planner/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="/Personal-Productivity-Planner/admin/js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="/Personal-Productivity-Planner/admin/vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="/Personal-Productivity-Planner/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="/Personal-Productivity-Planner/admin/js/demo/datatables-demo.js"></script>

</body>

</html>