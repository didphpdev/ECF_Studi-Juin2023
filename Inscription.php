<?php
    EXTRACT($_GET);
    $PW = password_hash($PW, PASSWORD_DEFAULT);

    echo $PW;
?>