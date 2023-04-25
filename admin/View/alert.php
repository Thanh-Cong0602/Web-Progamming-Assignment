<?php
if(isset($_SESSION['success_msg'])){
   echo '<script>swal("'.$_SESSION['success_msg'].'", "", "success");</script>';
   unset($_SESSION['success_msg']);
}

if(isset($_SESSION['warning_msg'])){
   echo '<script>swal("'.$_SESSION['warning_msg'].'", "", "warning");</script>';
   unset($_SESSION['warning_msg']);
}

if(isset($_SESSION['error_msg'])){
   echo '<script>swal("'.$_SESSION['error_msg'].'", "", "error");</script>';
   unset($_SESSION['error_msg']);
}

if(isset($_SESSION['info_msg'])){
   echo '<script>swal("'.$_SESSION['info_msg'].'", "", "info");</script>';
   unset($_SESSION['info_msg']);
}
