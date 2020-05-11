<?php 

session_start();

$selectedfood = $_POST["food"];

$session_variable = $_SESSION["user_name"];

require 'vendor/autoload.php';

$client = new MongoDB\Client;
$companydb = $client->companydb;
$dishname = $companydb->selectedfood; 
$hotels = $companydb->hotels;

$insertOneResult = $dishname->insertOne(
    ["selectedfood" => $selectedfood, "session_variable" => $session_variable]
);
error_reporting(0);
//printf("Inserted %d documents", $insertOneResult->getInsertedCount());
//var_dump($insertOneResult->getInsertedId()); 

$check = $hotels ->find(
    ['dish' => $selectedfood]
);

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
input[type="radio"] {
  display: none;
  &:not(:disabled) ~ label {
    cursor: pointer;
  }
  &:disabled ~ label {
    color: hsla(150, 5%, 75%, 1);
    border-color: hsla(150, 5%, 75%, 1);
    box-shadow: none;
    cursor: not-allowed;
  }
}
label {
  height: 100%;
  display: block;
  background: white;
  border: 2px solid hsla(150, 75%, 50%, 1);
  border-radius: 20px;
  padding: 1rem;
  margin-bottom: 1rem;
  margin: 1rem;
  text-align: center;
  box-shadow: 0px 3px 10px -2px hsla(150, 5%, 65%, 0.5);
  position: relative;
}
input[type="radio"]:checked + label {
  background: hsla(150, 75%, 50%, 1);
  color: hsla(215, 0%, 100%, 1);
  box-shadow: 0px 0px 20px hsla(150, 100%, 50%, 0.75);
  &::after {
    color: hsla(215, 5%, 25%, 1);
    font-family: FontAwesome;
    border: 2px solid hsla(150, 75%, 45%, 1);
    content: "\f00c";
    font-size: 24px;
    position: absolute;
    top: -25px;
    left: 50%;
    transform: translateX(-50%);
    height: 50px;
    width: 50px;
    line-height: 50px;
    text-align: center;
    border-radius: 50%;
    background: white;
    box-shadow: 0px 2px 5px -2px hsla(0, 0%, 0%, 0.25);
  }
}
input[type="radio"]#control_05:checked + label {
  background: red;
  border-color: red;
}
p {
  font-weight: 900;
}


@media only screen and (max-width: 700px) {
  section {
    flex-direction: column;
  }
}
</style>
<body class="bg">
<section class="user-details">
        <div class="container">
            <h1 class="text-center white pt-4">Welcome</h1>
            <h3 class="mt-5 pt-5 white">Select Hotels</h3>
            <div class="col-6">
                <form class="boxed" action="" method="post">
                <?php foreach($check as $check1) { ?>
                    <div class="opt1"> 
                        <input type="radio" name="hotel" id="hotel1" value="<?php echo $check1['Hotel1'] ?>">
                        <label for="hotel1">
                            <h2 class="">Hotel: <?php echo $check1['Hotel1'] ?></h2>
                            <p class="">Address: <?php echo $check1['Address1'] ?></p>
                            <p class="">Rating: <?php echo $check1['Rating1'] ?></p>
                        </label>
                    </div>    
                    <div class="opt2"> 
                        <input class="" type="radio" name="hotel" id="hotel" value="<?php echo $check1['Hotel2'] ?>">
                        <label class="" for="hotel">
                            <h2>Hotel: <?php echo $check1['Hotel2'] ?></h2>
                            <p>Address: <?php echo $check1['Address2'] ?></p>
                            <p>Rating: <?php echo $check1['Rating2'] ?>
                        </label>
                    </div>
                <?php } ?>
                    <input type="submit" value="Online order" onclick='this.form.action="online.php";' >
                    <input type="submit" value="Dine-in" onclick='this.form.action="dinein.php";'>
                </form>    
            </div> 
        </div>
    <section>           
</body>
</html>