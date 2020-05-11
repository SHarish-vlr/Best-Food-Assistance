<?php

session_start();

$date = $_POST["date"];
$time = $_POST["time"];
$seats = $_POST["seats"];

$session_variable = $_SESSION["user_name"];
$session_city = $_SESSION["selected_city"];
$session_variable_online = $_SESSION["ordermode"];

require 'vendor/autoload.php';

$client = new MongoDB\Client;
$companydb = $client->companydb;
$dinein = $companydb->dinein;

$insertOneResult = $dinein->insertOne(
    ["Preferred Date" => $date, "Preferred Time" => $time, "Number of seats" => $seats, "session_variable" => $session_variable, "order_mode" => $session_variable_online]
);

//printf("Inserted %d documents", $insertOneResult->getInsertedCount());
//var_dump($insertOneResult->getInsertedId());

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
    <style>
        #map {
        height: 400px;
        width: 100%;
        background-color: grey;
        }
    </style>
    <body class="bg pb-5">
    <section class="user-details">
            <div class="container">
                <h1 class="text-center white pt-2">Welcome <br/><p class="wel-name"><?php echo $session_variable?></p></h1>
                <div class="col-6">
                    <h3 class="mt-4 pt-3 white text-center bold">Thank you, your request as been sent to the restaurent</h3>
                    <h3 class="pt-4 pb-3 white text-center">Also check out the list of handpicked hotels that serve special foods</h3>
                    <div id="map"></div>
                </div>
            </div>
    </section>
    </body>
    <script type="text/javascript">var city="<?php echo $session_city ?>"</script>
    <script type="text/javascript" src="scripts/index.js"></script>
    <script async defer 
    src="https://maps.googleapis.com/maps/api/js?key=" "&callback=initMap">
    </script>
</html>
