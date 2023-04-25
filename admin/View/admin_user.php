<?php

include '../../config/config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location: ../../app/View/loginForm.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>users</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom admin css file link  -->
    <style>
    .blackboard {
        position: relative;
        width: 44%;
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
        content: "Tìm Kiếm Người Dùng";
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


    .searchandclear {
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
    </style>
    <link rel="stylesheet" href="../../public/css/admin.css">
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
                        <!-- <hr><br> -->
                        <p>
                            <label for="fullname"><b>Tên&emsp;</b></label>
                            <input type="text" placeholder="Nhập tên" name="fullname">
                            <br>
                        </p>
                        <p><br>
                        <p class="wipeout">
                            <span style="float: left; margin-left: 10%">
                                <input type="submit" class="searchandclear" name="search" value="Tìm Kiếm" />
                            </span>
                            <span style="float: right; margin-right: 10%">
                                <input type="submit" class="searchandclear" value="Xóa" />
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
                    <p> User id : <span><?php echo $fetch_users_sql['user_id']; ?></span> </p>
                    <p> Họ và Tên : <span><?php echo $fetch_users_sql['fullname']; ?></span> </p>
                    <p> Username : <span><?php echo $fetch_users_sql['username']; ?></span> </p>
                    <p> Email : <span><?php echo $fetch_users_sql['email']; ?></span> </p>
                    <p> Loại người dùng : <span
                            style="color:<?php if ($fetch_users_sql['user_type'] == 'admin') {
                                                                                echo 'var(--orange)';
                                                                            } ?>"><?php echo $fetch_users_sql['user_type']; ?></span>
                    </p>
                    <br><br>
                    <form action="../Controllers/adminController.php" method="post">
                        <input type="hidden" value="<?php echo $fetch_users_sql['user_id'] ?>" name="user_id">
                        <input type="submit" value="Xóa" onclick="return confirm('Bạn chắc chắn muốn xóa?');"
                            class="delete-btn" name="delete_user">
                    </form>
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
            $per_page = 6;
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $start = ($page - 1) * $per_page;
            $select_users = mysqli_query($conn, "SELECT * FROM `users`") or die('query failed');
            while ($fetch_users = mysqli_fetch_assoc($select_users)) {
            ?>
            <?php
                $total_products = mysqli_query($conn, "SELECT COUNT(*) AS total FROM `users`") or die('query failed');
                $total_products = mysqli_fetch_assoc($total_products)['total'];
                $total_pages = ceil($total_products / $per_page);
                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                $url = "http://localhost:3000/admin/View/admin_user.php?page=";
                // Tính toán giới hạn của LIMIT trong câu truy vấn SQL
                $offset = ($current_page - 1) * $per_page;
                // Truy vấn sản phẩm trong cơ sở dữ liệu với LIMIT và OFFSET
                $select_users = mysqli_query($conn, "SELECT * FROM users LIMIT $per_page OFFSET $offset") or die('query failed');
                if (mysqli_num_rows($select_users) > 0) {
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
                <div class="fullname-type">
                    <p> Họ và Tên : <span><?php echo $fetch_users['fullname']; ?></span> </p>
                    <p> Loại người dùng : <span
                            style="color:<?php if ($fetch_users['user_type'] == 'admin') {
                                                                                echo 'var(--orange)';
                                                                            } ?>"><?php echo $fetch_users['user_type']; ?></span> </p>
                </div>
                <div class="detail">
                    <p> User id : <span><?php echo $fetch_users['user_id']; ?></span> </p>
                    <p> Họ và Tên : <span><?php echo $fetch_users['fullname']; ?></span> </p>
                    <p> username : <span><?php echo $fetch_users['username']; ?></span> </p>
                    <p> Email : <span><?php echo $fetch_users['email']; ?></span> </p>
                    <p> Loại người dùng : <span
                            style="color:<?php if ($fetch_users['user_type'] == 'admin') {
                                                                                echo 'var(--orange)';
                                                                            } ?>"><?php echo $fetch_users['user_type']; ?></span> </p>
                    <br><br>
                    <form action="../Controllers/adminController.php" method="post">
                        <input type="hidden" value="<?php echo $fetch_users['user_id']; ?>" name="user_id">
                        <input type="submit" value="Xóa" onclick="return confirm('Bạn chắc chắn muốn xóa?');"
                            class="delete-btn" name="delete_user">
                    </form>
                </div>
            </div>
            <?php
                    }
                }
            };
            ?>
        </div>
        <nav aria-label="Page navigation example" class="toolbar user_tool">
            <ul class="pagination justify-content-center d-flex flex-wrap">
                <li class="page-item <?php echo ($current_page <= 1) ? 'disabled' : ''; ?>">
                    <a class="page-link" href="<?php echo $url . ($current_page - 1); ?>" tabindex="-1">Previous</a>
                </li>
                <?php
                $start_page = ($current_page <= 3) ? 1 : $current_page - 2;
                $end_page = ($total_pages - $current_page >= 2) ? $current_page + 2 : $total_pages;
                if ($start_page > 1) {
                    echo '<li class="page-item"><a class="page-link" href="' . $url . '1">1</a></li>';
                    if ($start_page > 2) {
                        echo '<li class="page-item disabled"><a class="page-link">...</a></li>';
                    }
                }
                $num_displayed_pages = $end_page - $start_page + 1;
                $display_ellipsis = ($num_displayed_pages >= 7);
                for ($i = $start_page; $i <= $end_page; $i++) {
                    if ($num_displayed_pages >= 7) {
                        if ($i == $start_page + 3 || $i == $end_page - 3) {
                            if (!$display_ellipsis) {
                                echo '<li class="page-item"><a class="page-link" href="#">' . $i . '</a></li>';
                            }
                            continue;
                        }
                    }
                    if ($num_displayed_pages <= 5 || ($i >= $current_page - 2 && $i <= $current_page + 2)) {
                        echo '<li class="page-item ' . (($i == $current_page) ? 'active' : '') . '"><a class="page-link" href="' . $url . $i . '">' . $i . '</a></li>';
                    }
                }
                if ($end_page < $total_pages) {
                    if ($end_page < $total_pages - 1) {
                        echo '<li class="page-item disabled"><a class="page-link">...</a></li>';
                    }
                    echo '<li class="page-item"><a class="page-link" href="' . $url . $total_pages . '">' . $total_pages . '</a></li>';
                }
                ?>
                <li class="page-item <?php echo ($current_page >= $total_pages) ? 'disabled' : ''; ?>">
                    <a class="page-link" href="<?php echo $url . ($current_page + 1); ?>">Next</a>
                </li>
            </ul>
        </nav>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <?php include '../View/alert.php'; ?>
    <!-- custom admin js file link  -->
    <script src="../../public/js/admin_script.js"></script>
</body>

</html>