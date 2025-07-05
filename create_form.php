<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Product Contact Form</title>
</head>
<form action="create_form.php" method="POST">
    <label for="fullName">Full name:</label>
    <input type="text" id="fullName" name="fullName" required><br>

    <label for="email">Email address:</label>
    <input type="text" id="email" name="email" required><br>

    <label for="topic">Topic:</label>
    <input type="text" id="topic" name="topic" required><br>

    <label for="message">Message:</label>
    <textarea id="message" name="message" required></textarea><br>

    <input type="submit" value="Submit Form">
</form>

<?php
//Function to validate input
function validateInput($data, $fieldName) {
    global $errorCount;

    //if field is blank, display 'required' message and increment $errorCount
    //otherwise clean it
    if (empty($data)) {
        echo "\"$fieldName\" is a required field.</br>\n";
        ++$errorCount;
        $userInput = "";

    } else {
        $userInput = trim(stripslashes(($data)));
    }
    return($userInput);
}

//Function to validate email 
function validateEmail($data, $fieldName) {
    global $errorCount; 

    if(empty($data)) {
        echo "\"$fieldName\" is a required field.</br>\n";
        ++$errorCount;
        $userInput = "";
    } else {
        $userInput = filter_var($data, FILTER_SANITIZE_EMAIL);

        if (!filter_var($userInput, FILTER_VALIDATE_EMAIL)) {
            echo "\"$fieldName\" is not a valid email address.</br>\n";
            ++$errorCount;
        }
        return($userInput);
    }
}

//Validate and assign form inputs 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$name = validateInput($_POST['fullName'], "Your name");
$email = validateEmail($_POST['email'], "Your Email");
$topic = validateInput($_POST['topic'], "Topic");
$message = validateInput($_POST['message'], "Message");

//Show thank you message with sanitized inputs after hitting submit
    echo "Thank you  " . htmlspecialchars($name) . "<br>";
    echo "We received your message about " . htmlspecialchars($topic) . "<br>";
    echo "We will get back to you at " . htmlspecialchars($email) . ".";

}



?>