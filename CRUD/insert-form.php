<?php
include __DIR__ . '/dbconnect.php';
$msg = '';

if(isset($_POST['submit'])){
    // echo '<pre>';
    // print_r($_POST);
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mnumber = $_POST['mnumber'];
    $address = $_POST['state'];
    $state = $_POST['state'];
    $pin = $_POST['pin'];

$sql = "INSERT INTO `person`(`p_name`,`p_email`,`p_number`,`p_address`,`p_state`,`pincode`) values('$name','$email','$mnumber','$address','$state','$pin')";

$query = mysqli_query($conn,$sql);
header('location:select-data.php');

if($query){
    $msg = "Data Successfully Inserted";
}
else{
    $msg = "Something Error, Try after Sometime";
}

};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Application</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'vardana' sans-serif;
        }
        body{
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #5d6d7d;
        }
        .container {
            max-width: 500px;
            width: 100%;
            background-color: #ffff;
            border-radius: 10px;
            /* border: 2px solid red; */
            /* display: flex; */
            /* justify-content: center; */
        }

        .container form{
            width: 100%;
            padding: 30px;
        }
        .container form .data-insert{
            width: 100%;
            padding: 12px 10px;
            outline: none;
            border: 1px solid #111;
            margin: 8px 0px;
        }
        .container form .sub_btn{
            width: 100%;
            padding: 10px 30px;
            background-color: darkred;
            color: #ffff;
            font-size: 1rem;
            outline: none;
            border: 0;
            cursor: pointer;
        }
        .container h1{
            display: block;
            text-align: center;
            margin-top: 35px;
            /* padding: 15px 0px; */
        }

    </style>

</head>

<body>
    <div class="container">
        <h1>Data Insert</h1>
        <form action="" method="post">
            <input type="text" name="name" class="data-insert" placeholder="Enter Your Name">
            <input type="email" name="email" class="data-insert" placeholder="Enter Your Email">
            <input type="number" name="mnumber" class="data-insert" placeholder="Enter Your Mobile">
            <input type="text" name="address" class="data-insert" placeholder="Enter Your Address">
            <input type="text" name="state" class="data-insert" placeholder="Enter Your State">
            <input type="text" name="pin" class="data-insert" placeholder="Enter Your Pin Code">
            <!-- <input type="password" name="password" class="data-insert" placeholder="Create Your Password"> -->
            <!-- <input type="password" name="cpassword" class="data-insert" placeholder="Re-enter Your Password"> -->
            <input type="submit" name="submit" value="Submit" class="sub_btn">
            <br>
            <span><?php echo $msg;?></span>
        </form>
    </div>
    

</body>

</html>