<?php

include '../../config/config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location: ../../app/View/loginForm.php');
}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM users WHERE user_id = '$delete_id'") or die('query failed'); 
    header('location:admin_user.php');
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>users</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom admin css file link  -->
    <link rel="stylesheet" href="../../public/css/admin.css">

</head>

<body>

    <?php include 'admin_header.php'; ?>

    <section class="users">

        <h1 class="title">Tài khoản người dùng </h1>

        <div class="box-container">
            <?php
            $select_users = mysqli_query($conn, "SELECT * FROM `users`") or die('query failed');
            while ($fetch_users = mysqli_fetch_assoc($select_users)) {
            ?>
            <div class="box">
                <p> user id : <span><?php echo $fetch_users['user_id']; ?></span> </p>
                <p> fullname : <span><?php echo $fetch_users['fullname']; ?></span> </p>
                <p> username : <span><?php echo $fetch_users['username']; ?></span> </p>
                <p> email : <span><?php echo $fetch_users['email']; ?></span> </p>
                <p> user type : <span style="color:<?php if ($fetch_users['user_type'] == 'admin') {
                                                            echo 'var(--orange)';
                                                        } ?>"><?php echo $fetch_users['user_type']; ?></span> </p>
                <a href="admin_user.php?delete=<?php echo $fetch_users['user_id']; ?>"
                    onclick="return confirm('delete this user?');" class="delete-btn">delete user</a>
            </div>
            <?php
            };
            ?>
        </div>

    </section>


    <!-- custom admin js file link  -->
    <script src="../../public/js/admin_script.js"></script>
</body>

</html>