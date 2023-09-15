<?php
if (isset($_GET['user_id']) && isset($_GET['phone_id'])) {
    $user_id = $_GET['user_id'];
    $phone_id = $_GET['phone_id'];

    # Connects to the database and removes it
    $connect = mysqli_connect('db', 'php-docker', 'password', 'listatelefonica');

    # deleting user
    $deleteUserQuery = "DELETE FROM user WHERE id = $user_id";
    mysqli_query($connect, $deleteUserQuery);

    # deleting number
    $deletePhoneQuery = "DELETE FROM phones WHERE user_id = $phone_id";
    mysqli_query($connect, $deletePhoneQuery);

    # Redirect back to the original page
    header("Location: http://localhost:8070");
    exit;
}
