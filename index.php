<?php session_start(); ?>
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
<body class="bg pb-5">
    <section class="user-details">
        <div class="container">
            <h1 class="text-center white pt-4">Welcome</h1>
            <h3 class="mt-5 pt-2 pb-4 white">Enter your details</h3>
            <div class="col-6">
            <form action="process-form.php" method="post">
                <div class="form-group">
                    <label class="white" for="name">Name:</label>
                    <input type="text" class="form-control box" placeholder="Enter name" name="name" id="name" pattern="^[a-zA-Z][a-zA-Z\s]*$" required="required" data-error="Please enter your name">
                </div>
                <div class="form-group">
                    <label class="white" for="email">Email:</label>
                    <input type="email" class="form-control box" placeholder="Enter email" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required="required" data-error="Enter vaild email">
                </div>
                <div class="form-group">
                    <label class="white" for="phone">Phone #:</label>
                    <input type="text" class="form-control box" placeholder="Enter phone number"  name="phone" id="phone" pattern="[7-9]{1}[0-9]{9}" required="required" data-error="Enter valid phone number">
                </div>
                <div class="form-group">
                    <label class="white" for="address">Address:</label>
                    <input type="text" class="form-control box" placeholder="Enter address"  name="address" id="address" required="required" data-error="Enter Address">
                </div>
                <button class="next-button"><a class="next" href="#second-section">Next</a></button>
        

            <h3 id="second-section" class="mt-5 pt-5 pb-4 white">Select city</h3>
                
            <div class="form-group">
                    <input class="form-control-input" type="radio" name="city" id="vellore" value="Vellore" required="required">
                    <label class="white form-check-label" for="vellore">Vellore</label>
                </div>
                <div class="form-group">
                    <input class="form-control-input" type="radio" name="city" id="chennai" value="Chennai" required="required">
                    <label class="white form-check-label" for="chennai">Chennai</label>
                </div>
                <div class="form-group">
                    <input class="form-control-input" type="radio" name="city" id="bangalore" value="Bangalore" required="required">
                    <label class="white form-check-label" for="bangalore">Bangalore</label>
                </div>
                <div class="form-group">
                    <input class="form-control-input" type="radio" name="city" id="hyderabad" value="Hyderabad" required="required">
                    <label class="white form-check-label" for="hydrabad">Hyderabad</label>
                </div>
                <div class="form-group">
                    <input class="form-control-input" type="radio" name="city" id="thiruvananthapuram" value="Thiruvananthapuram" required="required">
                    <label class="white form-check-label" for="thiruvananthapuram">Thiruvananthapuram</label>
                </div>

                <button class="next-button"><a class="next" href="#third-section">Next</a></button>

                <h3 id="third-section" class="mt-5 pt-5 pb-4 white">Choose Veg or non veg</h3>
                <div class="form-group">
                    <input class="form-control-input" type="radio" name="vegornonveg" id="veg" value="Vegetarian" required="required">
                    <label class="white form-check-label" for="veg">Vegetarian</label>
                </div>
                <div class="form-group">
                    <input class="form-control-input" type="radio" name="vegornonveg" id="nonveg" value="Non-Vegetarian" required="required">
                    <label class="white form-check-label" for="nonveg">Non-Vegetarian</label>
                </div>

                <input class="sub" type="submit" value="Submit">    
            </form>
        </div>
    </section>
</body>
</html>