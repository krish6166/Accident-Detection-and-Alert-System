<?php
    // Initialize the session
    session_start();
    
    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
            *{
                margin: 0;
                padding: 0;
                font-family: 'Times New Roman', Times, serif;
                font-weight: bold;
            }
            .banner{
                width: 100%;
                height: 100vh;
                
            }
            .navbar{
                width: 85%;
                margin: auto;
                padding: 25px 0;
                display: flex;
                align-items: center;
                justify-content: space-between;
            }
            .logo{
                width: 10%;
                cursor: pointer;

            }
            .navbar ul li{
                list-style: none;
                display: inline-block;
                margin: 0 20px;
                position: relative;
            }
            .navbar ul li a{
                text-decoration: none;
                color: #000a41;
                text-transform: uppercase;
            }
            .navbar ul li::after{
                content:'';
                height: 3px;
                width: 0;
                background: #000a41;
                position: absolute;
                left: 0;
                bottom: -10px;
                transition: 0.5s;
            }
            .navbar ul li:hover::after{
                width: 100%;
            }
            .content{
            
                width: 100%;
                position: absolute;
                top: 60%;
                transform: translateY(-50%);
                text-align: center;
                color: #000a41;
            }
            .content h1{
                font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
                font-size: 70px;
                margin-top: 80px;
            }
            .content p{
                margin: 20px auto;
                font-weight: 100;
                line-height: 25px;
            }
            button{
                width: 200px;
                padding: 15px 0;
                text-align: center;
                margin: 20px 10px;
                border-radius: 25px;
                font-weight: bold;
                border: 2px solid #000a41;
                background: transparent;
                color: rgb(201, 0, 0);
                cursor: pointer;
                position: relative;
                overflow: hidden;
            }
            span{
                background: #000a41;
                height: 100%;
                width: 0;
                border-radius: 25px;
                position: absolute;
                left: 0;
                bottom: 0;
                z-index:-1;
                transition: 0.5s;
            }
            button:hover span{
                width: 100%;
            }
            button:hover{
                border: none;
            }
            .heading{
                width: 85%;
                margin: auto;
                padding: 0px 0px;
                display: flex;
                align-items: baseline;
                justify-content: space-between;
            }
            .heading2{
                width: 85%;
                margin: auto;
                padding: 0px 0px;
                display: flex;
                align-items: baseline;
                justify-content: space-between;
                font-weight: lighter;
            }
            .Welcome h4{
                font-family: 'Times New Roman', Times, serif, 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif, Cochin, Georgia, Times, 'Times New Roman', serif, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
                font-size: 30px;
                margin-top: 10px;
                text-align:center;
                

            }
    </style>
</head>
<body>
    <h1 class="col-md-8 offset-md-2">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our Accident Detection and Alert System.</h1>
    <p>
        <a href="reset-password.php" class="btn btn-warning col-md-8 offset-md-2">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger col-md-8 offset-md-2">Sign Out of Your Account</a>
    </p>

    <div class="banner">
        <div class="Welcome">
        </div>
            <div class="content">
            <h1>Accident System</h1>
            <div>
            <button type="button" onclick="window.location.href='all_cases.php'" target="_blank"><span></span>ALL CASES</button>
            </div>
            <div>
                <button type="button" onclick="window.location.href='pending.php'" target="_blank"><span></span>PENDING</button>
                <button type="button" onclick="window.location.href='solved.php'" target="_blank"><span></span>SOLVED</button>
            </div>
        </div> 
    </div>

</body>
</html>