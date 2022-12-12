<?php

session_start();

session_destroy();

    echo "Logoff realizado com sucesso!";
    header("refresh: 3, ../index.php");

?>