<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Product Contact Form</title>
</head>
<body>
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



    
</body>
</html>