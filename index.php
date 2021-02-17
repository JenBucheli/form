<?php
//this line makes PHP behave in a more strict way
declare(strict_types=1);

//validation email
/*if (isset($_POST['email'])== true  && empty ($_POST['email'])==false) {
    $email=$_POST['email'];
    if (filter_var($email, FILTER_VALIDATE_EMAIL)==true){
      echo  'Email accepted';
    }else{
        echo 'Not valid email';
    }
}*/

//all inputs must be filled
// isset="exists"   !empty= is different than empty
if (isset($_POST['email']) && !empty($_POST['email']) &&
    isset($_POST['street']) && !empty($_POST['street']) &&
    isset($_POST['city']) && !empty($_POST['city']) &&
    // street number & zipcode must be numbers
    isset($_POST['streetNumber']) && !empty($_POST['streetNumber']) && is_numeric($_POST['streetNumber']) &&
    isset($_POST['zipcode']) && !empty($_POST['zipcode']) && is_numeric($_POST['zipcode'])) {
    $email=$_POST['email'];
    $street=$_POST['street'];
    $streetNumber=$_POST['streetNumber'];
    $city=$_POST['city'];
    $zipcode=$_POST['zipcode'];
    $address= $_POST['street']." ". $_POST['streetNumber'].", ".$_POST['city']." ".$_POST['city'];//Kazernelaan 3, Lint 2547
    echo 'it works';
}
// mail send
    //mail(to "for me",subject , messages)


//we are going to use session variables so we need to enable sessions
session_start();

/* function whatIsHappening() {
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}*/

//your products with their price.
$products = [
    ['name' => 'Club Ham', 'price' => 3.20],
    ['name' => 'Club Cheese', 'price' => 3],
    ['name' => 'Club Cheese & Ham', 'price' => 4],
    ['name' => 'Club Chicken', 'price' => 4],
    ['name' => 'Club Salmon', 'price' => 5]
];

$products = [
    ['name' => 'Cola', 'price' => 2],
    ['name' => 'Fanta', 'price' => 2],
    ['name' => 'Sprite', 'price' => 2],
    ['name' => 'Ice-tea', 'price' => 3],
];

$totalValue = 0;

require 'form-view.php';