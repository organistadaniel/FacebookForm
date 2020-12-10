<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $databasename = "dbFacebook";
        
        $connect = mysqli_connect($servername,$username,$password,$databasename);

    if (isset($_POST['LogIn'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query    = "SELECT * FROM `tblfacebook` WHERE email='$email' AND password='$password'";
        $result = mysqli_query($connect, $query);
        $rows = mysqli_num_rows($result);
        if ($rows==1){
            echo "<div class='form'>
                  <h3>Data does not exist</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>"; 
        }elseif($rows==0){
            echo "<div class='form'>
                  <h3>You have been successfully logged in. Welcome to Facebook!</h3><br/>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Incorrect email/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?> 
    <div id="header_wrapper"> 
    <div id="header"> 
        <li id="sitename">
        <a href="">facebook</a>
        </li> 
    <form action="login.php" method="post">
    </div> 
</div> 
<div id="wrapper"> 
        <div id="div1">                         
        </div> 
        <div id="div2">
        <br>
        <br>
        <p><span class="text">Log into Facebook</span></p>
        </br>
        <li>Email or Phone<br>
        <input type="text" name="email" required></li> 
        <li>Password<br><input type="password" name="password" required>
        <br>
        <a href="">Forgot account?</a>
        </li> 
        <li>
            <button type="submit" name="LogIn">Log In</button>
        </li>   
        </div>
            </form> 
  </form>
<?php
    }
?>
</body>
</html>
