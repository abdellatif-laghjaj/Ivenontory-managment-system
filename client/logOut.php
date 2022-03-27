<?php
    session_start();

    if (isset($_SESSION['customerID'])) {
        unset($_SESSION['customerID']);
        echo
            '
                <script language ="JavaScript">
                    sessionStorage.clear();
                </script>       
            '
        ;
    }

    header("location: ../pages/index.php");