<?php

require './lib/php/fpdf/fpdf.php';
echo 'COUCOU';

$mg = new genreManager($db);
$data = $mg->getGenre();

$pdf = new FDPF('P', 'cm', 'A4');
$pdf->SetFont('Calibri', 'B', 14);

$pdf->output();
?>