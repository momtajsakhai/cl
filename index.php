<?php
$insert=false;
if(isset($_POST['name'])){
    //set connection variable
    $server="localhost";
    $username="root";
    $password="";

    //create a database connection
    $con=mysqli_connect($server,$username,$password);

    //check for connection success
    if(!$con){
        die("connection to this database failed due to".mysqli_connect_error());
    }
    //echo "success connecting to the db";
    //collect post variable
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

    //echo $sql;

    //execute the query 
    if($con->query($sql)==true){
        //echo "successfully inserted";
        $insert=true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
        //flag for successful insertion 
        $insert=true;
    }
    //close the database connection
    $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Momo</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="bu" srcset="">
    <div class="container">
        <h1>Welcome to Brainware University</h1>

            <p>Enter your details for booked your set slot</p>
            <?php
            if($insert== true){
            echo "<p class='submitMsg'>Thanks for submitting your form, we are happy to see you joining</p>";
            }
            ?>

        </div>
            <form action="index.php" method="post">
                <input type="text" name="name" id="name" placeholder="enter your name">
                <input type="text" name="age" id="age" placeholder="enter your age">
                <input type="text" name="gender" id="gender" placeholder="enter your gender">
                <input type="email" name="email" id="email" placeholder="enter your email">
                <input type="phone" name="phone" id="phone" placeholder="enter your cn">
                <textarea name="desc" id="desc" cols="30" rows="10" placeholder="enter any other information here">

                </textarea>
                <button class="btn">Submit</button>
            </form>
    </div>
    <script src="index.js"></script>
    
</body>
</html>