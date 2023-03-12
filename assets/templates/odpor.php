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
$title = 'Odpor proti #{druh_pr_3pad}';
$title_size = 15;
$ln_after_title = 10;
$text_body = array(
    'Od Vašeho soudu mi byl dne #{datum_doruceni} doručen #{druh_pr_1pad}, č. j. #{cislo_jednaci}.',
    'Proti tomuto #{druh_pr_3pad} podávám odpor.'
);
$h_basic_lines = 6;
$line_spacing = 3;


$pdf = new myPDF('P', 'mm', 'A4');

$pdf->StandardPDF($font);

$pdf->SetFont($font, 'B', 11);
$pdf->Cell(0, $h_table_cells, '#{adresat}', $table_borders, 1, 'L', false);

$pdf->SetFont('');
$pdf->Cell(0, $h_table_cells, '#{adresa_1}', $table_borders, 1, 'L', false);
$pdf->Cell(0, $h_table_cells, '#{adresa_2}', $table_borders, 1, 'L', false);

$pdf->Ln(7);

$pdf->Cell(30, $h_table_cells, 'Č. j.:', $table_borders, 0, 'L', false);
$pdf->SetFont($font, 'B');
$pdf->MultiCell(0, $h_table_cells, '#{cislo_jednaci}', $table_borders, 'L', false);

$pdf->Ln(17);

$pdf->SetFont('');
$pdf->Cell(30, $h_table_cells, 'Žalovaný/á:', $table_borders, 0, 'L', false);
$pdf->SetFont($font, 'B');
$pdf->MultiCell(0, $h_table_cells, '#{jmeno}', $table_borders, 'L', false);

$pdf->SetFont('');
$pdf->Cell(30, $h_table_cells, '', $table_borders, 0, 'L', false);
$pdf->MultiCell(0, $h_table_cells, 'Nar. #{datum_narozeni}', $table_borders, 'L', false);

$pdf->Cell(30, $h_table_cells, '', $table_borders, 0, 'L', false);
$pdf->MultiCell(0, $h_table_cells, 'Bytem #{bydliste}', $table_borders, 'L', false);
$pdf->Ln(40);

$pdf->Title($title);

$pdf->TextBody($text_body);

$pdf->Ln(30);

$pdf->MultiCell(0, $h_basic_lines, 'Dne #{datum_podani}', 0, 'R', false);

$pdf->Ln(30);

$pdf->SetFont($font, 'B', 11);
$pdf->Cell(0, $h_basic_lines, '___________________________', 0, 1, 'R', false);
$pdf->MultiCell(0, $h_basic_lines, '#{jmeno}', 0, 'R', false);

$pdf->Output('I', 'Odpor.pdf', true);