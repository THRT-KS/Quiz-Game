<?php
session_start();
if ($_POST['start'] == 'true') {
    $_SESSION['game_started'] = true;
}
?>
