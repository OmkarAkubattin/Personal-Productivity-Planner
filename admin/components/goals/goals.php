<?php 
    include "../../../conn.php";
    session_start();
    $id=$_SESSION['id'];
    if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['add-goal'])){
        $result=sql_query("SELECT * FROM `goals` where `name`='".$_POST['goal']."' AND `fk_user`='".$id."'");
        if(mysqli_num_rows($result)==0)
        $result=sql_query("INSERT INTO `goals` (`name`, `fk_user`) VALUES ('".$_POST['goal']."', '$id')");
        else echo '<script>alert("Goal with same name not allowed")</script>';  
    }
    if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['del-goal'])){
        $result=sql_query("UPDATE `goals` SET `trash` = '1' WHERE `id` = ".$_POST['del-goal']."");
    }
    if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['complete-goal'])){
        $result=sql_query("UPDATE `goals` SET `status` = '1' WHERE `id` = ".$_POST['complete-goal']."");
    }
    if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['date-change'])){
        $result=sql_query("UPDATE `goals` SET `created` = '".$_POST['date-change']."' WHERE `id` = ".$_SESSION['goal-id']."");
    }
    if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['end-change'])){
        $result=sql_query("UPDATE `goals` SET `end` = '".$_POST['end-change']."' WHERE `id` = ".$_SESSION['goal-id']."");
    }
    if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['disc-change'])){
        $result=sql_query("UPDATE `goals` SET `disc` = '".$_POST['disc-change']."' WHERE `id` = ".$_SESSION['goal-id']."");
    }
    if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['tag-change'])){
        $result=sql_query("UPDATE `goals` SET `tag` = '".$_POST['tag-change']."' WHERE `id` = ".$_SESSION['goal-id']."");
    }

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
        .goals-nav {
            margin-top: 10px
        }

        .goals-list {
            margin: 10px 0
        }

        .goals-list .goals-item {
            padding: 5px;
            margin: 5px 0;
            border-radius: 0;
            background: #ffffff
        }
        .goals-list.only-active .goals-item.complete {
            display: none
        }

        .goals-list.only-active .goals-item:not(.complete) {
            display: block
        }

        .goals-list.only-complete .goals-item:not(.complete) {
            display: none
        }

        .goals-list.only-complete .goals-item.complete {
            display: block
        }

        .goals-list .goals-item.complete span {
            text-decoration: line-through
        }

        .remove-goals-item {
            color: #ccc;
            visibility: hidden
        }

        .remove-goals-item:hover {
            color: #5f5f5f
        }

        .goals-item:hover .remove-goals-item {
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
        #wrapper #content-wrapper{
            height:100vh;
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
                <div class="container-fluid" style="padding-left:0;padding-right:0;">
                <div class="card shadow mb-4 mt-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Set A Goal</h6>
                        </div>
                        <div class="card-body">
                <form class="row" action="todo.php" method="POST">
                        <div class="col-xl-3 col-md-6 ">
                            <label for="exampleFormControlTextarea1">Goal Name</label>
                            <input type="text" name="name" class="mr-2 form-control add-task" placeholder="What's your Goal?" required>
                            <div class="my-4"><span><label for="exampleFormControlTextarea1">End Date</label>
                            <input name="created" type="date" required></span>
                            <button type="submit" name="add-task" class="add btn btn-primary btn-block font-weight-bold todo-list-add-btn">Add New Task</button>
                        </div>
                        <div class="col-xl-9 col-md-6">
                            <label for="exampleFormControlTextarea1" required>Task Description</label>
                            <textarea class="form-control" name="disc" rows="3"></textarea>
                            <label for="exampleFormControlTextarea1">Task Tags</label>
                            <select name="tag" class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon"></select>
                        </div>
                                </div>
                                </div>
                        </div>
                    </form>
                </div>                
            </div>     
        </div>
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