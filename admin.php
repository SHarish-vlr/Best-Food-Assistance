<?php

session_start();

$session_variable = $_SESSION["user_name"];
$ordermode = $_SESSION["ordermode"];

require 'vendor/autoload.php';

$client = new MongoDB\Client;
$companydb = $client->companydb;
$empcollection = $companydb->empcollection;
$cities = $companydb->cities;
$splfood = $companydb->splfood;
$dishname = $companydb->selectedfood; 
$hotels = $companydb->hotels;
$hoteldb = $companydb->selectedHotel;
$online = $companydb->online;
$dinein = $companydb->dinein;

$list = $empcollection ->find();
$list1 = $dishname ->find();
$list2 = $hoteldb ->find();
$list3 = $online->find();
$list4 = $dinein->find();

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
    <body>
        <section>
            <h4 class="mt-3 mb-3 text-center">User Details</h4>
            <div class="table-responsive"></div>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Type of Food</th>
                    <th>City</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($list as $lists){ ?>
                <tr>
                    <td><?php echo $lists['firstname']; ?></td>
                    <td><?php echo $lists['email']; ?></td>
                    <td><?php echo $lists['phone']; ?></td>
                    <td><?php echo $lists['address']; ?></td>
                    <td><?php echo $lists['Type of food']; ?></td>
                    <td><?php echo $lists['City']; ?></td>
                </tr>
                <?php } ?>  
                </tbody>
            </table>
        </section>
        <section>
            <h4 class="mt-3 mb-3 text-center">Selected Food</h4>
            <div class="table-responsive"></div>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Selected Food</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($list1 as $lists1){ ?>
                <tr>
                    <td><?php echo $lists1['session_variable']; ?></td>
                    <td><?php echo $lists1['selectedfood']; ?></td>
                </tr>
                <?php } ?>  
                </tbody>
            </table>
        </section>
        <section>
            <h4 class="mt-3 mb-3 text-center">Selected Hotel</h4>
            <div class="table-responsive"></div>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Selected Hotel</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($list2 as $lists2){ ?>
                <tr>
                    <td><?php echo $lists2['session_variable']; ?></td>
                    <td><?php echo $lists2['Selected Hotel']; ?></td>
                </tr>
                <?php } ?>  
                </tbody>
            </table>
        </section>
        <section>
            <h4 class="mt-3 mb-3 text-center">Order Mode</h4>
            <div class="table-responsive"></div>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Name/Ordermode</th>
                </tr>
                </thead>
                <tbody>
                <?php   foreach($list3 as $lists3){ ?>
                        <tr>
                            <td><?php echo ($lists3['session_variable']."/".$lists3['order_mode']);?></td>
                            <td><b>Deliver Address:</b> <?php echo $lists3['online_address']; ?></td>
                            <td><b>LandMark:</b> <?php echo $lists3['landmark']; ?></td>
                            <td><b>Quantity:</b> <?php echo $lists3['quantity']; ?></td>
                        </tr>
                <?php  } ?> 
                <?php  foreach($list4 as $lists4){ ?>
                        <tr>
                            <td><?php echo ($lists4['session_variable']."/".$lists4['order_mode']);?></td>
                            <td><b>Preferred Date:</b> <?php echo $lists4['Preferred Date']; ?></td>
                            <td><b>Preferred Time:</b> <?php echo $lists4['Preferred Time']; ?></td>
                            <td><b>Number of seats:</b> <?php echo $lists4['Number of seats']; ?></td>
                        </tr>
                        <?php } ?> 
                </tbody>
            </table>
        </section>
    </body>
</html>
