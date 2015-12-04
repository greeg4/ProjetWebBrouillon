<?php
$mg = new ChenileManager($db);
$date = $mg->getListeConfort();
?>
<p class="txtRougeGras">Données</p>
<p>
    <img src="./images/pdf.jpg" alt="PDF"/>&nbsp;
    <a href="./pages/print_pension.php" target="_blank">Imprimer</a>
</p>