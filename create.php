<?php

$app = require "./core/app.php";


if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    //Call the function to add a new user
    addNewUser($app);
}


//Function to add the new users
function addNewUser($app)
{
    // Create new instance of user
    $user = new User($app->db);

    $errors = validateData(); //Validate the passed data
    $data = array();// array to hold the data to be passed back

    //If there are no errors
    if (!$errors)
    {
        // Insert the new user details into the database
        $user->insert(array(
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'phoneNumber' => (string)$_POST['phoneNumber'],
            'city' => $_POST['city']
        ));

        // set the success variable to true to indicate the addition was successful
        $data['success'] = true;
    }else{
        // if error exist
        // set the success variable to false to indicate the addition was unsuccessful
        //Pass the errors array to the data array
        $data['success'] = false;
        $data['errors']  = $errors;
    }

    // return the data array to an AJAX call
    echo json_encode($data);
}

function validateData()
{
    $errors = array();// array to hold validation errors

    //Check if the passed fields are empty,
    ///If so, add the error message to be errors array

    if (empty($_POST["name"])){
        $errors['name'] = "Name is required";
    }

    if (empty($_POST["email"])) {
        $errors['email'] = "Email is required";
    }

    if (empty($_POST["phoneNumber"])) {
        $errors['phoneNumber'] = "Phone number is required";
    }

    if (empty($_POST["city"])) {
        $errors['city'] = "City is required";
    }

    return $errors;
}
