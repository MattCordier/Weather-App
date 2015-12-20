<?php
	include 'ecomm_connect.php';
    $pdo = Database::connect();
	$username = $_POST['username'];
	$password = $_POST['password'];
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "SELECT * FROM customer WHERE username = ? AND password = ? LIMIT 1";
    $q = $pdo->prepare($sql);
    $q->execute(array($username, $password));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $id = $data['id'];
    $firstname = $data['firstname'];
    $lastname = $data['lastname'];
    $phone = $data['phone'];
    $dob = $data['dob'];
    $username = $data['username'];
    $password = $data['password'];
    $gender = $data['gender'];
    $permission = $data['permission'];
    $email = $data['email'];

    Database::disconnect();

    session_start();

    $_SESSION['userid'] = $id;
    $_SESSION['firstname'] = $firstname;
    $_SESSION['lastname'] = $lastname;
    $_SESSION['phone'] = $phone;
    $_SESSION['dob'] = $dob;
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    $_SESSION['gender'] = $gender;
    $_SESSION['permission'] = $permission;
    $_SESSION['email'] = $email;

    if ($_SESSION['permission'] == 1) {
        $_SESSION['permission'] = 'Manager';
    } 

    elseif ($_SESSION['permission'] == 2){
        $_SESSION['permission'] = 'Guide';
      } 
    // else{
    //      $_SESSION['permission'] = 'Customer';
    //     }
    
    header('Location: index.php');



        


?>