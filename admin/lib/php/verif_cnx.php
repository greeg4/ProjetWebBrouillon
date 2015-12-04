<?php
if (!isset($_SESSION['admin'])) {
    print "Rafraîchir";
    ?>
    <meta http-equiv="refresh": Content="1;url=../index.php"/>
    <?php
    exit();
}
?>
    