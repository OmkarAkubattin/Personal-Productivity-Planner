<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="Checker.js" type=text/javascript></script>

</head>

<body class="bg-gradient-primary">
<?php
// Server name must be localhost 
$servername = "localhost"; 
  
// In my case, user name will be root 
$username = "root"; 
  
// Password is empty 
$password = ""; 
$dbname="PPP";
Global $conn;
$conn = new mysqli($servername,$username, $password,$dbname); 
// Check connection 
if ($conn->connect_error) { 
    die("Connection failure: " 
        . $conn->connect_error); 
}  
if(isset($_POST['email']))
$email=$_POST['email'];
if(isset($_POST['fname']))
$fname=$_POST['fname'];
if(isset($_POST['lname']))
$lname=$_POST['lname'];
if(isset($_POST['pass']))
$pass=$_POST['pass'];
if(isset($_POST['Cpass']))
$Cpass=$_POST['Cpass'];
                                        
                                        // $Cpass=$_SESSION['Cpass'];
?>
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form method="POST" action="register.php" class="user">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            name="fname" placeholder="First Name">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName"
                                            name="lname"placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        name="email"placeholder="Email Address">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            name="pass"id="exampleInputPassword" placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            name="Cpass"id="exampleRepeatPassword" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <?php
                                        if(empty($email)||empty($fname)||empty($lname)||empty($pass)||empty($Cpass)){
                                            if(empty($email)&&empty($fname)&&empty($lname)&&empty($pass)&&empty($Cpass)){}
                                            else echo "<center>Fill the Details</center>";
                                        }
                                        else if($pass==$Cpass){ 
                                            $qur="SELECT * FROM login_info WHERE Email='$email'";
                                            $result = mysqli_query($conn, $qur); //run query
                                            $row =  mysqli_fetch_assoc($result);
                                            // Check, if user is already login, then jump to secured page
                                            if ($row['Id']>0) {
                                                echo "User Already Present use another Email";
                                            }else{
                                                $sql = "SELECT Id FROM login_info ORDER BY Id DESC LIMIT 1";
                                                $result = mysqli_query($conn, $sql); //run query
                                                $row = mysqli_fetch_assoc($result);
                                                $id=$row['Id']+1;
                                                $sql = "INSERT INTO login_info (Id, Email,FName,LName,Password)
                                                VALUES ($id, '$email', '$fname','$lname','$pass')";
                                                if($re=$conn->query($sql)==TRUE)
                                                    echo "User Created Successfully,go to Login Page";
                                                else
                                                    echo "Can't Create User Try Again";
                                            }
                                        }else{
                                            echo "Both Passwords Must Be Same";}
                                        
                                ?>
                                <input type="submit" value="Register Account" onclick="check()"class="btn btn-primary btn-user btn-block">
                                
                                <hr>
                                <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.php">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>