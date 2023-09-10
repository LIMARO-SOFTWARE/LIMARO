<?php
session_start();

if ($_SESSION) {
    session_unset();
    session_destroy();
    echo json_encode(false);
} else {
    echo json_encode(true);
}

?>