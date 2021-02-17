<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css"
          rel="stylesheet"/>
    <title>Order food & drinks</title>

    <style>
        footer {
            text-align: center;
        }
        .error {
            color: #FF0000;
        }
    </style>

</head>
<body>

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>


<div class="container">
    <h1>Order food in restaurant "the Personal Ham Processors"</h1>
    <nav>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link active" href="?food=1">Order food</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?food=0">Order drinks</a>
            </li>
        </ul>
    </nav>
    <?php
    // define variables and begin with empty values
    $emailErr = $streetErr = $streetNumberErr = $cityErr= $zipcodeErr='';
    $email = $street = $streetNumber = $city = $zipcode='';

    //all inputs must be filled
    // isset="exists"   !empty= is different than empty
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
        /*if (empty ($_POST['email'])) {
            $emailErr='Enter a valid E-mail';
        }else {(filter_var($email, FILTER_VALIDATE_EMAIL));
            $email=$_POST['email'];
        }*/
        if (isset($_POST['email'])== true  && empty ($_POST['email'])==false) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)==true){
            $email=$_POST['email'];
        }else{
            $emailErr='Enter a valid E-mail';
        }

        if (empty($_POST['street'])) {
            $streetErr='Street missing';
        }else{
            $street=$_POST['street'];
        }

        if (empty($_POST['streetNumber'])){
            $streetNumberErr='Number missing';
        }elseif (!is_numeric($_POST['streetNumber'])) $streetNumberErr='Just numbers allowed';
        else{
            $streetNumber=$_POST['streetNumber'];
        }

        if (empty($_POST['city'])){
            $cityErr='City missing';
        }else{
            $city=$_POST['city'];
        }

        if (empty($_POST['zipcode'])){
            $zipcodeErr='Zip code missing';
        }elseif (!is_numeric($_POST['zipcode'])) $zipcodeErr = 'Just numbers allowed';
        else{
            $zipcode=$_POST['zipcode'];
        }
    }}
    ?>
    <form method="post" /*action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <div class="form-row">

            <div class="form-group col-md-6">
                <label for="email">E-mail:</label>
                <input type="text" id="email" name="email" class="form-control" placeholder="Enter email" value="<?php
                echo htmlspecialchars($email);?>"/>
                <span class="error">
                    <?php
                    echo isset($emailErr);
                    ?>
                </span>
            </div>
            <div></div>
        </div>

        <fieldset>
            <legend>Address</legend>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="street">Street:</label>
                    <input type="text" name="street" id="street" class="form-control" value="<?php
                    echo htmlspecialchars($street);?>"/>
                    <span class="error">
                    <?php
                    echo isset($streetErr);
                    ?>
                </span>
                </div>
                <div class="form-group col-md-6">
                    <label for="streetNumber">Street number:</label>
                    <input type="text" id="streetNumber" name="streetNumber" class="form-control" value="<?php
                    echo htmlspecialchars($streetNumber);?>"/>
                    <span class="error">
                    <?php
                    echo isset($streetNumberErr);
                    ?>
                </span>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="city">City:</label>
                    <input type="text" id="city" name="city" class="form-control" value="<?php
                    echo htmlspecialchars($city);?>"/>
                    <span class="error">
                    <?php
                    echo isset($cityErr);
                    ?>
                </span>
                </div>
                <div class="form-group col-md-6">
                    <label for="zipcode">Zipcode</label>
                    <input type="text" id="zipcode" name="zipcode" class="form-control" value="<?php
                    echo htmlspecialchars($zipcode);?>"/>
                    <span class="error">
                    <?php
                    echo isset($zipcodeErr);
                    ?>
                </span>
                </div>
            </div>
        </fieldset>

        <fieldset>
            <legend>Products</legend>
            <?php foreach ($products AS $i => $product): ?>
                <label>
                    <input type="checkbox" value="1" name="products[<?php echo $i ?>]"/> <?php echo $product['name'] ?> -
                    &euro; <?php echo number_format($product['price'], 2) ?></label><br />
            <?php endforeach; ?>
        </fieldset>
        
        <label>
            <input type="checkbox" name="express_delivery" value="5" /> 
            Express delivery (+ 5 EUR) 
        </label>
            
        <button type="submit" class="btn btn-primary">Order!</button>
    </form>

    <footer>You already ordered <strong>&euro; <?php echo $totalValue ?></strong> in food and drinks.</footer>
</div>


</body>
</html>
