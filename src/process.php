<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $connect = mysqli_connect(
        'db',                # service name 
        'php-docker',        # username
        'password',          # password
        'listatelefonica'    # db table
    );

    $name = $_POST["nome"];
    $phone = $_POST["tel"][0];
    $phone2 = isset($_POST["tel"][1]) ? $_POST["tel"][1] : null; # only adds second number if it exists

    # Insert the user's name into the 'user' table
    $insertUserQuery = "INSERT INTO user (name) VALUES ('$name')";
    mysqli_query($connect, $insertUserQuery);
    $userId = mysqli_insert_id($connect);  # auto-generated user ID

    # Insert the phone number into the 'phones' table
    $insertPhoneQuery = "INSERT INTO phones (user_id, number) VALUES ('$userId', '$phone')";
    mysqli_query($connect, $insertPhoneQuery);

    if($phone2 !== null){
        $insertPhoneQuery = "INSERT INTO phones (user_id, number) VALUES ('$userId', '$phone2')";
        mysqli_query($connect, $insertPhoneQuery);
    } # only works if 2nd number exists

    # Close the database connection
    mysqli_close($connect);
    header("Location: http://localhost:8070");
    exit;
}
