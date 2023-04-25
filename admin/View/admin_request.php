<?php

include '../../config/config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:../../app/View/loginForm.php');
};

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `message` WHERE id = '$delete_id'") or die('query failed');
    header('location:admin_request.php');
}

?>

<?php
function truncate_text($text)
{
    if (strlen($text) > 40) {
        $text = substr($text, 0, 30) . '...';
        $text = trim($text);
    }
    return $text;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>requests</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom admin css file link  -->
    <link rel="stylesheet" href="../../public/css/admin.css">
    <link rel="stylesheet" href="../../public/css/tuananh.css">
    <style>
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9999;
        }

        .content {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80%;
            max-width: 700px;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            z-index: 10000;
            display: none;
            white-space: pre-wrap;
            line-height: 1.5;
            border-radius: 10px;
            /* word-wrap: break-word;
        word-break: break-all; */
            font-size: 2rem;
        }
    </style>
</head>

<body>

    <?php include 'admin_header.php'; ?>

    <section class="messages">

        <h1 class="title"> Yêu cầu của khách hàng </h1>

        <div class="box-container" style="margin-top:40px;">
            <?php
            $select_message = mysqli_query($conn, "SELECT * FROM `message`") or die('query failed');
            if (mysqli_num_rows($select_message) > 0) {
                while ($fetch_message = mysqli_fetch_assoc($select_message)) {

            ?>
                    <div class="box">
                        <p> User id : <span><?php echo $fetch_message['user_id']; ?></span> </p>
                        <p> Họ và Tên : <span><?php echo $fetch_message['name']; ?></span> </p>
                        <p> Sđt : <span><?php echo $fetch_message['phonenumber']; ?></span> </p>
                        <p> Email : <span><?php echo $fetch_message['email']; ?></span> </p>
                        <p> Thông điệp : <span><?php echo nl2br(truncate_text(strip_tags($fetch_message['message']))); ?></span>
                            <?php if (strlen(truncate_text($fetch_message['message'])) < strlen($fetch_message['message'])) { ?>
                                <a style="font-size: 1.5rem;font-style:italic;" href="#" onclick="expandmessage(`<?php echo nl2br(addslashes($fetch_message['message'])); ?>`);">chi
                                    tiết</a>
                            <?php } ?>
                        </p>
                        <a href="admin_request.php?delete=<?php echo $fetch_message['id']; ?>" onclick="return confirm('delete this request?');" class="delete-btn">Xóa</a>
                    </div>
            <?php
                };
            } else {
                echo '<p class="empty">Hiện tại không có yêu cầu nào!</p>';
            }
            ?>
        </div>

    </section>



    <script>
        function expandmessage(fullmessage) {
            // console.log(`fullmessage`);
            var overlaymessage = document.createElement('div');
            overlaymessage.classList.add('overlay');
            document.body.appendChild(overlaymessage);

            var contentmessage = document.createElement('div');
            contentmessage.classList.add('content');
            contentmessage.textContent = fullmessage.replace(/<br\s*[\/]?>/gi, "");
            overlaymessage.appendChild(contentmessage);

            overlaymessage.style.display = 'block';
            contentmessage.style.display = 'block';

            overlaymessage.addEventListener('click', function() {
                overlaymessage.style.display = 'none';
                contentmessage.style.display = 'none';
            });
        }
    </script>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <?php include '../View/alert.php'; ?>
    <!-- custom admin js file link  -->
    <script src="../../public/js/admin_script.js"></script>

</body>

</html>