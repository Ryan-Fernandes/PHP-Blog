<html>
    <?php
        $title="Study Link | Reset Password";
        include_once("includes/db.php");
        include_once("includes/header.php");
        include_once("admin/functions.php");
    
        if(!isset($_GET['token'])||!isset($_GET['email'])){
            header("Location: index.php");
        }else{
            $token = $_GET['token'];
            $email = $_GET['email'];
            //echo $email;
            $query = "Select * from users where token='$token'";
            $updatePasswordUser = mysqli_query($conn,$query);
            if(mysqli_num_rows($updatePasswordUser) == 0){
                header("Location: index.php");
            }
        }
        
        if(isset($_POST['reset_submit'])){
            if(isset($_POST['password']) && isset($_POST['password2'])){
                $password = $_POST['password'];
                $password2 = $_POST['password2'];
                if($password == $password2){
                    $options = [
                    'cost' => 10,
                    'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
                    ];
                    $hashedPass=password_hash($password,PASSWORD_BCRYPT,$options);
                    echo $hashedPass;
                    echo $password;
                    echo $password2;
                    $query = "update users set token ='', user_password='$hashedPass' where token='$token' and user_email='$email'";
                    $resetQuery = mysqli_query($conn,$query);
                }else{
                    echo "password do not match";
                }
            }
             
        }
    ?>
    
    <body>
        <?php include_once("includes/navigation.php"); ?>
        
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="panel panel-default">
                        <div class="text-center">
                            <h3><i class="fa fa-lock fa-4x"></i></h3>
                            <h2 class="text-center">Forgot Password</h2>
                            <p>You can reset your password from here!</p>
                            <div class="panel-body">
                                <form action="" role="form" id="forgot-password" method="post">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                            <input type="password" id="password" name="password" placeholder="Please enter your New Password" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                            <input type="password" id="password2" name="password2" placeholder="Please enter your New Password Again" class="form-control">
                                        </div>
                                    </div>
                                    <div class="from-group">
                                        <input type="submit" class="btn btn-lg btn-primary btn-block" name="reset_submit">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>