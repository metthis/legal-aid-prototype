<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
ini_set('html_errors', 1);
ini_set('error_prepend_string', '<pre>');
ini_set('error_append_string', '</pre>');

require_once __DIR__.'/../../src/bootstrap.php';

use laweb\PDF\myPDF;

$font = 'FreeSerif';
$h_table_cells = 6;
$table_borders = 0;
$title = 'Odpor proti elektronickému platebnímu rozkazu';
$title_size = 15;
$ln_after_title = 10;
$text_body = array(
    'Od Vašeho soudu mi byl dne 22. 4. 2021 doručen elektronický platební rozkaz, č. j. EPR 2561/2021-8.',
    'Proti tomuto elektronickému platebnímu rozkazu podávám odpor.'
);
$h_basic_lines = 6;
$line_spacing = 3;


$pdf = new myPDF('P', 'mm', 'A4');

$pdf->StandardPDF($font);

$pdf->SetFont($font, 'B', 11);
$pdf->Cell(0, $h_table_cells, 'Obvodní soud pro Prahu 4', $table_borders, 1, 'L', false);

$pdf->SetFont('');
$pdf->Cell(0, $h_table_cells, '28. pluku 1533/29b', $table_borders, 1, 'L', false);
$pdf->Cell(0, $h_table_cells, '100 00 Praha 10', $table_borders, 1, 'L', false);

$pdf->Ln(7);

$pdf->Cell(30, $h_table_cells, 'Č. j.:', $table_borders, 0, 'L', false);
$pdf->SetFont($font, 'B');
$pdf->MultiCell(0, $h_table_cells, 'EPR 2561/2021-8', $table_borders, 'L', false);

$pdf->Ln(17);

$pdf->SetFont('');
$pdf->Cell(30, $h_table_cells, 'Žalovaný/á:', $table_borders, 0, 'L', false);
$pdf->SetFont($font, 'B');
$pdf->MultiCell(0, $h_table_cells, 'Aneta Novotná', $table_borders, 'L', false);

$pdf->SetFont('');
$pdf->Cell(30, $h_table_cells, '', $table_borders, 0, 'L', false);
$pdf->MultiCell(0, $h_table_cells, 'Nar. 3. 5. 1995', $table_borders, 'L', false);

$pdf->Cell(30, $h_table_cells, '', $table_borders, 0, 'L', false);
$pdf->MultiCell(0, $h_table_cells, 'Bytem Levá 128/3, 140 00 Praha', $table_borders, 'L', false);
$pdf->Ln(40);

$pdf->Title($title);

$pdf->TextBody($text_body);

$pdf->Ln(30);

$pdf->MultiCell(0, $h_basic_lines, 'Dne 6. května 2021', 0, 'R', false);

$pdf->Ln(30);

$pdf->SetFont($font, 'B', 11);
$pdf->Cell(0, $h_basic_lines, '___________________________', 0, 1, 'R', false);
$pdf->MultiCell(0, $h_basic_lines, 'Aneta Novotná', 0, 'R', false);

$pdf->Output('I', 'Odpor.pdf', true);