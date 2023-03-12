<?php

require_once __DIR__.'/../bootstrap.php';

use laweb\PDF\Odpor;
use laweb\PDF\PrintFromTemplate;

$odpor = new Odpor();
$array = $odpor->get_output_array($_POST, $search_and_replace, '../../assets/xml/adresy_soudy.xml');

$print = new PrintFromTemplate();
$print->PrintFromTemplate($array, 'odpor.php', '');