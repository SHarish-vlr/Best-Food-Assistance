<?php 

session_start();

$SelectedHotel = $_POST["hotel"];

$session_variable = $_SESSION["user_name"];
$_SESSION["ordermode"] = "Dinein";
$session_variable_online = $_SESSION["ordermode"];

require 'vendor/autoload.php';

$client = new MongoDB\Client;
$companydb = $client->companydb;
$hoteldb = $companydb->selectedHotel;

$insertOneResult = $hoteldb->insertOne(
    ["Selected Hotel" => $SelectedHotel, "session_variable" => $session_variable, "order_mode" => $session_variable_online]
);

//printf("Inserted %d documents", $insertOneResult->getInsertedCount());
//var_dump($insertOneResult->getInsertedId());

 echo($session_variable_online);

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
            <h3 class="mt-5 pt-5 white">Select Dinein Options</h3>
            <div class="col-6">
                <form action="thankyou_dinein.php" method="post">
                    <div class="form-group">
                        <label class="white" for="date">Preferred Date:</label>
                        <input type="date" class="form-control" placeholder="Preferred Date" name="date" id="date" min="<?php echo date("Y-m-d"); ?>" required="required">
                    </div>
                    <div class="form-group">
                        <label class="white" for="time">Preferred Time:</label>
                        <input type="time" class="form-control" placeholder="Preferred Time" name="time" id="time" required="required">
                    </div>
                    <div class="form-group">
                        <label class="white" for="seats">No of seats:</label>
                        <input type="text" class="form-control" placeholder="No of seats" name="seats" id="seats" pattern= "[0-9]+" required="required">
                    </div>
                    <input class="sub" type="submit" value="Submit">
                </form>    
            </div> 
        </div>
    <section>           
</body>
</html>