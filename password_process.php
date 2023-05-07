<?php
    $var1= $_GET['pw'];
    $var2= urlencode($var1);

    header('Location:/jyCTFd/index.php?pw='.$var2);
?>