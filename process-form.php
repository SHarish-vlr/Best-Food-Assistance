<?php

session_start();

$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$address = $_POST["address"];
$vegornonveg = $_POST["vegornonveg"];
$city = $_POST["city"];


$_SESSION["user_name"] = $name;
$session_variable = $_SESSION["user_name"];
$_SESSION["selected_city"] = $city;

require 'vendor/autoload.php';

$client = new MongoDB\Client;
$companydb = $client->companydb;
$empcollection = $companydb->empcollection;
$cities = $companydb->cities;
$splfood = $companydb->splfood;
$splfood_nv = $companydb->splfood_nv;

$insertOneResult = $empcollection->insertOne(
    ["firstname" => $name, "email" => $email, "phone" => $phone, "address" => $address, "Type of food" => $vegornonveg, "City" => $city, "session_variable" => $session_variable]
);

/*printf("Inserted %d documents", $insertOneResult->getInsertedCount());
var_dump($insertOneResult->getInsertedId()); */

if($vegornonveg == "Vegetarian")
{
    if($city == "Vellore"){
        $document = $splfood -> findOne(
          ['_id' => 'vellore']  
        );
        //var_dump($document);
        $food = $document -> jsonSerialize();
    }
    else if($city == "Chennai"){
        $document = $splfood -> findOne(
            ['_id' => 'chennai']  
          );
          //var_dump($document);
          $food = $document -> jsonSerialize();
    }
    else if($city == "Bangalore"){
        $document = $splfood -> findOne(
            ['_id' => 'bangalore']  
          );
          //var_dump($document);
          $food = $document -> jsonSerialize();
    }
    else if($city == "Hyderabad"){
        $document = $splfood -> findOne(
            ['_id' => 'hyderabad']  
          );
          //var_dump($document);
          $food = $document -> jsonSerialize();
    }
    else if($city == "Thiruvananthapuram"){
        $document = $splfood -> findOne(
            ['_id' => 'thiruvananthapuram']  
          );
          //var_dump($document);
          $food = $document -> jsonSerialize();
    }
}
else
{
    if($city == "Vellore"){
        $document = $splfood_nv -> findOne(
          ['_id' => 'vellore']  
        );
        //var_dump($document);
        $food = $document -> jsonSerialize();
    }
    else if($city == "Chennai"){
        $document = $splfood_nv -> findOne(
            ['_id' => 'chennai']  
          );
          //var_dump($document);
          $food = $document -> jsonSerialize();
    }
    else if($city == "Bangalore"){
        $document = $splfood_nv -> findOne(
            ['_id' => 'bangalore']  
          );
          //var_dump($document);
          $food = $document -> jsonSerialize();
    }
    else if($city == "Hyderabad"){
        $document = $splfood_nv -> findOne(
            ['_id' => 'hyderabad']  
          );
          //var_dump($document);
          $food = $document -> jsonSerialize();
    }
    else if($city == "Thiruvananthapuram"){
        $document = $splfood_nv -> findOne(
            ['_id' => 'thiruvananthapuram']  
          );
          //var_dump($document);
          $food = $document -> jsonSerialize();
    }
}

//<----------------------*********************----------------->
// $test = $cities ->findOne(array('_id' => 'vellore'));
// $data = $test->jsonSerialize();
// echo $data->_id;
// echo $data->hotel1;
//<----------------------********************------------------>
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Special Food Assistance</title>
</head>
<body class="bg">
<section class="user-details">
        <div class="container">
            <h1 class="text-center white pt-4">Welcome <br/><p class="wel-name"><?php echo $session_variable?></p></h1>
            <h3 class="mt-5 pt-5 white">Select Special Food in <span class="wel-name"><?php echo $city ?></span></h3>
            <div class="col-6">
                <form action="food.php" method="post">
                    <div class="form-group">
                        <input class="form-control-input" type="radio" name="food" id="food" value="<?php echo $food->dish1 ?>">
                        <label class="white form-check-label" for="food"><?php echo $food->dish1 ?></label>
                    </div>
                    <div class="form-group">
                        <input class="form-control-input" type="radio" name="food" id="food" value="<?php echo $food->dish2 ?>">
                        <label class="white form-check-label" for="food"><?php echo $food->dish2 ?></label>
                    </div>
                    <div class="form-group">
                        <input class="form-control-input" type="radio" name="food" id="food" value="<?php echo $food->dish3 ?>">
                        <label class="white form-check-label" for="food"><?php echo $food->dish3 ?></label>
                    </div>
                    <div class="form-group">
                        <input class="form-control-input" type="radio" name="food" id="food" value="<?php echo $food->dish4 ?>">
                        <label class="white form-check-label" for="food"><?php echo $food->dish4 ?></label>
                    </div>
                    <div class="form-group">
                        <input class="form-control-input" type="radio" name="food" id="food" value="<?php echo $food->dish5 ?>">
                        <label class="white form-check-label" for="food"><?php echo $food->dish5 ?></label>
                    </div>
                    <input class="sub" type="submit" value="Submit">
                </form>    
            </div> 
        </div>
    <section>           
</body>
</html>