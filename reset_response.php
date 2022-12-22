<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   //$name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   //$pass = md5($_POST['password']);
   //$cpass = md5($_POST['cpassword']);
   //$user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         header('location:admin_page.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         header('location:user_page.php');

      }elseif($row['user_type'] == 'security'){

         $_SESSION['security_name'] = $row['name'];
         header('location:security_page.php');

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomeX</title>

    <!-- Favicons -->
    <link href="img/1.ico" rel="icon">
    <link href="img/1.ico">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style1.css">

    <style>
    .map {
        background-image: url("img/4.jpg");
        background-size: auto;
        background-repeat: no-repeat;
        background-position: center;
        background-blend-mode: auto;
        line-height: 1.6;
        padding: 0em;
    }

    .form-container form {
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
        background-image: linear-gradient(135deg, #5EFCE8 10%, #736EFE 100%);
        text-align: center;
        width: 500px;
    }

    div#h1 {

        margin: 50px 150px 50px 150px;
        padding: 80px 80px 80px 80px;
        background-color: rgb(6, 8, 8);
        color: rgb(255, 255, 255);
        border-radius: 30px;
        border-style: double;
        border-width: 10px;
        border-color: rgb(6, 255, 243);


        background-color: rgb(6, 8, 8);
        animation-name: example;
        animation-duration: 25s;
    }

    @keyframes example {
        0% {
            background-color: red;
        }

        15% {
            background-color: yellow;
        }

        30% {
            background-color: rgb(72, 255, 0);
        }

        45% {
            background-color: rgb(0, 255, 213);
        }

        60% {
            background-color: rgb(0, 17, 255);
        }

        75% {
            background-color: rgb(119, 0, 255);
        }

        90% {
            background-color: rgb(255, 0, 106);
        }

        100% {
            background-color: green;
        }
    }

    .transform_animation:hover {
        transform: scale(2, 2);
    }

    button {
        height: 50px;
        background: orange;
        border: none;
        color: white;
        font-size: 1.25em;
        font-family: 'Nanum Gothic';
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        border: 2px solid black;
    }
    </style>

</head>

<body>
    <div class="map">
        <div class="form-container">
            <div id="h1">
                <center>
                    <h1 style="font-family:Times New Roman,Times,serif; font-size: 50px;"><b>Thank you for getting in
                            touch!<b></h1>


                    <img class="transform_animation" src="img/10.png" height="50">

                    <p style="font-size:20px;font-family:Times New Roman,Times,serif;line-height: 1.2;font-size: 25px;">
                        " We appreciate you contacting us.One of our colleagues will
                        get back in touch with you soon!<br>Have a great day!"</p>

                    <br>
                    <br>
                    <button type="submit" id="btn"><a href="index.php">Back To Home</a></button>

                </center>
            </div>



        </div>
    </div>
</body>

</html>