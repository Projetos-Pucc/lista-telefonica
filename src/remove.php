<?php
if (isset($_GET['user_id']) && isset($_GET['phone_id'])) {
    $user_id = $_GET['user_id'];
    $phone_id = $_GET['phone_id'];

    # Connects to the database and removes it
    $connect = mysqli_connect('db', 'php-docker', 'password', 'listatelefonica');

    # deleting number
    $deletePhoneQuery = "DELETE FROM phones WHERE user_id = $user_id AND id_phone = $phone_id";
    mysqli_query($connect, $deletePhoneQuery);

    # deleting user
    $validateUserQuery = "SELECT COUNT(id_phone) AS count FROM phones WHERE user_id=$user_id";
    $validateUser = mysqli_query($connect, $validateUserQuery);

    $count = mysqli_fetch_assoc($validateUser)['count'];

    if($count == 0) {
        $deleteUserQuery = "DELETE FROM user WHERE id_user = $user_id";
        mysqli_query($connect, $deleteUserQuery);
    }

    # Redirect back to the original page
    header("Location: http://localhost:8070");
    exit;
}
