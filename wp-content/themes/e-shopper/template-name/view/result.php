<?php
    if (isset($_GET['dashboard']) && $_GET['dashboard'] == 'show'){
        echo 'Dashboard';
    }

    if (isset($_GET['order']) && $_GET['order'] == 'show'){
        echo 'order';
    }

    if (isset($_GET['info']) && $_GET['info'] == 'show'){
        echo 'info';
    }
?>