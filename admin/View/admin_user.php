<?php

include '../../config/config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location: ../../app/View/loginForm.php');
}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `users` WHERE user_id = '$delete_id'") or die('query failed');
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
    <style>
    .blackboard {
        position: relative;
        width: 640px;
        margin: 5% auto;
        border: tan solid 12px;
        border-top: #bda27e solid 12px;
        border-left: #b19876 solid 12px;
        border-bottom: #c9ad86 solid 12px;
        box-shadow: 0px 0px 6px 5px rgba(58, 18, 13, 0), 0px 0px 0px 2px #c2a782, 0px 0px 0px 4px #a58e6f, 3px 4px 8px 5px rgba(0, 0, 0, 0.5);
        background-image: radial-gradient(circle at left 30%, rgba(34, 34, 34, 0.3), rgba(34, 34, 34, 0.3) 80px, rgba(34, 34, 34, 0.5) 100px, rgba(51, 51, 51, 0.5) 160px, rgba(51, 51, 51, 0.5)), linear-gradient(215deg, transparent, transparent 100px, #222 260px, #222 320px, transparent), radial-gradient(circle at right, #111, rgba(51, 51, 51, 1));
        background-color: #333;
    }

    .blackboard:before {
        box-sizing: border-box;
        display: block;
        position: absolute;
        width: 100%;
        height: 100%;
        background-image: linear-gradient(175deg, transparent, transparent 40px, rgba(120, 120, 120, 0.1) 100px, rgba(120, 120, 120, 0.1) 110px, transparent 220px, transparent), linear-gradient(200deg, transparent 80%, rgba(50, 50, 50, 0.3)), radial-gradient(ellipse at right bottom, transparent, transparent 200px, rgba(80, 80, 80, 0.1) 260px, rgba(80, 80, 80, 0.1) 320px, transparent 400px, transparent);
        border: #2c2c2c solid 2px;
        content: "Search User";
        font-family: 'Permanent Marker', cursive;
        font-size: 2.2em;
        color: rgba(238, 238, 238, 0.7);
        text-align: center;
        padding-top: 20px;
    }

    .form {
        padding: 70px 20px 20px;
    }

    p {
        position: relative;
        margin-bottom: 1em;
    }

    label {
        vertical-align: middle;
        font-family: 'Permanent Marker', cursive;
        font-size: 1.6em;
        color: rgba(238, 238, 238, 0.7);
    }

    p:nth-of-type(5)>label {
        vertical-align: top;
    }

    input,
    textarea {
        vertical-align: middle;
        padding-left: 10px;
        background: none;
        border: none;
        font-family: 'Permanent Marker', cursive;
        font-size: 1.6em;
        color: rgba(238, 238, 238, 0.8);
        line-height: .6em;
        outline: none;
    }


    input[type="submit"] {
        cursor: pointer;
        color: rgba(238, 238, 238, 0.7);
        line-height: 1em;
        padding: 0;
    }

    input[type="submit"]:focus {
        background: rgba(238, 238, 238, 0.2);
        color: rgba(238, 238, 238, 0.2);
    }

    ::-moz-selection {
        background: rgba(238, 238, 238, 0.2);
        color: rgba(238, 238, 238, 0.2);
        text-shadow: none;
    }

    ::selection {
        background: rgba(238, 238, 238, 0.4);
        color: rgba(238, 238, 238, 0.3);
        text-shadow: none;
    }

    .sticky {
        z-index: 999;
        display: block;
    }
    </style>
</head>

<body>

    <?php include 'admin_header.php'; ?>

    <section class="users">

        <h1 class="title">Tài khoản người dùng </h1>
        <!-- ################## SEARCH ###################-->
        <!-- <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post"> -->
        <form action="" method="post">
            <div>
                <div class="blackboard">
                    <div class="form">
                        <hr><br>
                        <p>
                            <label for="name"><b>Name&emsp;</b></label>
                            <input type="text" placeholder="Name" name="fullname">
                            <br>
                        </p>
                        <p><br>
                        <p class="wipeout">
                            <span style="float: left; margin-left: 10%">
                                <input type="submit" name="search" value="Search:-" />
                            </span>
                            <span style="float: right; margin-right: 10%">
                                <input type="submit" value="Clear:-" />
                            </span><br>
                        </p>
                    </div>
                </div>
            </div>
        </form>
        <br>

        <div class="box-container" style="border-bottom: 1px solid #111;">
            <?php
            $sql_users = null;
            if (isset($_POST['search'])) {
                $_POST['fullname'] = addslashes($_POST['fullname']);
                if (!empty($_POST['fullname'])) {
                    $sql_users = mysqli_query($conn, "SELECT * FROM `users` WHERE fullname LIKE '%{$_POST['fullname']}%'") or die('query failed');
                }
                if ($sql_users && $sql_users->num_rows > 0) {
                    while ($fetch_users_sql = mysqli_fetch_assoc($sql_users)) {
            ?>
            <div class="box">
                <div class="imgBox">
                    <?php if ($fetch_users_sql['image'] != '') { ?>
                    <img src="../../public/images/<?= $fetch_users_sql['image'] ?>" alt="">
                    <?php } else { ?>
                    <img src="../../public/images/avatar_user.png" alt="">
                    <?php } ?>
                </div>
                <div class="detail">
                    <p> user id : <span><?php echo $fetch_users_sql['user_id']; ?></span> </p>
                    <p> fullname : <span><?php echo $fetch_users_sql['fullname']; ?></span> </p>
                    <p> username : <span><?php echo $fetch_users_sql['username']; ?></span> </p>
                    <p> email : <span><?php echo $fetch_users_sql['email']; ?></span> </p>
                    <p> user type : <span
                            style="color:<?php if ($fetch_users_sql['user_type'] == 'admin') {
                                                                        echo 'var(--orange)';
                                                                    } ?>"><?php echo $fetch_users_sql['user_type']; ?></span>
                    </p>
                    <br><br>
                    <a href="admin_user.php?delete=<?php echo $fetch_users_sql['user_id']; ?>"
                        onclick="return confirm('delete this user?');" class="delete-btn">delete user</a>
                </div>
            </div>
            <?php
                    };
                    ?>
            <?php
                } else {
                    echo "<p class='empty'>Không tìm thấy tài khoản người dùng này!!!</p>";
                }
            }
            ?>
        </div>

        <!-- ########################## -->
        <div class="box-container" style="margin-top:20px;">
            <?php
            $select_users = mysqli_query($conn, "SELECT * FROM `users`") or die('query failed');
            while ($fetch_users = mysqli_fetch_assoc($select_users)) {
            ?>
            <div class="box">
                <div class="imgBox">
                    <?php if ($fetch_users['image'] != '') { ?>
                    <img src="../../public/images/<?= $fetch_users['image'] ?>" alt="">
                    <?php } else { ?>
                    <img src="../../public/images/avatar_user.png" alt="">
                    <?php } ?>
                </div>
                <div class="detail">
                    <p> user id : <span><?php echo $fetch_users['user_id']; ?></span> </p>
                    <p> fullname : <span><?php echo $fetch_users['fullname']; ?></span> </p>
                    <p> username : <span><?php echo $fetch_users['username']; ?></span> </p>
                    <p> email : <span><?php echo $fetch_users['email']; ?></span> </p>
                    <p> user type : <span style="color:<?php if ($fetch_users['user_type'] == 'admin') {
                                                                echo 'var(--orange)';
                                                            } ?>"><?php echo $fetch_users['user_type']; ?></span> </p>
                    <br><br>
                    <a href="admin_user.php?delete=<?php echo $fetch_users['user_id']; ?>"
                        onclick="return confirm('delete this user?');" class="delete-btn">delete user</a>
                </div>
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