<html>
    <?php
        $title="Study Link | Forgot Password";
        include_once("includes/db.php");
        include_once("includes/header.php");
        include_once("admin/functions.php");
    
        if(!isset($_GET['forgot'])){
            header("Locations: index.php");
        }
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(isset($_POST['email'])){
                $email = $_POST['email'];
                $length = 50;
                $token = bin2hex(openssl_random_pseudo_bytes($length));
                
                //check wheterthe email exists or not
                $query = "select * from users where user_email = '$email'";
                $user = mysqli_query($conn,$query);
                if(mysqli_num_rows($user) == 1){
                    //you can say that email exists
                    //now if the email eists then jst update the token
                    
                    $query = "update users set token = '$token' where user_email = '$email'";
                    $updateToken = mysqli_query($conn,$query);
                    confirmQuery($updateToken);
                }else{
                    echo "Some issue with the email id or No such user found";
                }
                
                $headers = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'From: Study Link <enquiry@studylinkclasses.com>' . "\r\n";
                $headers .= 'Content-type: text/html; charset-iso-8859-1' . "\r\n";

                $to = $email;
                $subject = "Study Link Blog change Password";

                $body = "please Click on the link below to reset your password:<br>
                <a href = 'http://localhost/blog/reset.php?email=$email&token=$token'>http://localhost/cms/reset.php?email=$email&token=$token</a>";

                $sentStatus = mail($to,$subject,$body,$headers);

                if(!$sentStatus){
                    echo error_get_last()['message'];
                }else{
                    //echo "sent!";
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
                                            <input type="email" id="email" name="email" placeholder="Please enter your email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="from-group">
                                        <input type="submit" class="btn btn-lg btn-primary btn-block" name="reset-submit">
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