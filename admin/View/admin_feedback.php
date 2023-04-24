<?php
include '../../config/config.php';
session_start();
$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:loginForm.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Thông tin sách đã order </title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../../public/css/admin.css">
    <link rel="stylesheet" href="../../public/css/admin_feedback.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

    <!-- custom js file link  -->
    <script src="../../public/js/admin_script.js" defer></script>



</head>

<body>
    <?php include 'admin_header.php'; ?>

    <!-- List product section starts  -->
    <section class="feedback" id="feedback" data-aos="zoom-in-up" data-aos-delay="600">
        <h1>Thông tin phản hồi</h1>
                <?php
                $select_message = mysqli_query($conn, "SELECT * FROM `message` ") or die('query failed');
                if (mysqli_num_rows($select_message) > 0) {
                    echo'<table>
                    <thead>
                        <tr>
                            <th style="padding-left:1rem;">Name</th>
                            <th style="padding-left:1rem;">Username</th>
                            <th style="padding-left:1rem;">Email</th>
                            <th style="padding-left:1rem;">Phonenumber</th>
                            <th style="padding-left:1rem;">Message</th>
                        </tr>
                    </thead>
                    <tbody>';
                    while ($fetch_message = mysqli_fetch_assoc($select_message)) {
                        echo "
                    <tr>
                        <td>$fetch_message[name]</td>
                        <td>$fetch_message[username]</td>
                        <td>$fetch_message[email]</td>
                        <td>$fetch_message[phonenumber]</td>
                        <td>$fetch_message[message]</td>
                    </tr>
                ";
                        ?>
                    <?php }
                }
                else {
                    echo '<p class="empty">Hiện tại không có yêu cầu nào!</p>';}
                ?>
            </tbody>
        </table>
    </section>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <?php include '../View/alert.php'; ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            offset: 150,
        });
    </script>
</body>

</html>