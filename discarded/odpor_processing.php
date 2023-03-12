<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
ini_set('html_errors', 1);
ini_set('error_prepend_string', '<pre>');
ini_set('error_append_string', '</pre>');

require_once __DIR__.'/../vendor/autoload.php';

$input = $_POST;

echo '<pre>';
print_r($input);
echo '</pre>';

$search_and_replace = array(
    'adresat' => '',
    'adresa_1' => '',
    'adresa_2' => '',
    'cislo_jednaci' => '',
    'jmeno' => '',
    'datum_narozeni' => '',
    'bydliste' => '',
    'datum_doruceni_pr' => '',
    'den_podani' => '',
    'druh_pr_1pad' => '',
    'druh_pr_3pad' => ''
);

$search_and_replace['jmeno'] = $input['jmeno'];

function get_ciselne_datum ($datum) {
    $datum_object = DateTime::createFromFormat('Y-m-d', $datum);
    $datum_string = $datum_object->format('j. n. Y');
    return $datum_string;
}

$search_and_replace['datum_narozeni'] = get_ciselne_datum($input['datum_narozeni']);

$search_and_replace['bydliste'] = $input['bydliste'];

function check_druh_pr() {
    global $input, $search_and_replace;

    if ($input['druh_pr'] === 'pr') {
        $search_and_replace['druh_pr_1pad'] = 'platební rozkaz';
        $search_and_replace['druh_pr_3pad'] = 'platebnímu rozkazu';
        return;
    }

    if ($input['druh_pr'] === 'epr') {
        $search_and_replace['druh_pr_1pad'] = 'elektronický platební rozkaz';
        $search_and_replace['druh_pr_3pad'] = 'elektronickému platebnímu rozkazu';
        return;
    }
}

check_druh_pr();

function check_soud () {
    global $input, $search_and_replace;

    $search_and_replace['adresat'] = $input['soud'];

    $adresy_xml = new DOMDocument('1.0', 'UTF-8');
    $adresy_xml->load('adresy_soudy.xml');

    $xpath = new DOMXPath($adresy_xml);
    $xpath->registerNamespace('d', 'http://seznam.gov.cz/ovm/datafile/seznam_ds/v1');

    for ($i = 1; $i <= 2; $i++) {
        $query_base = '//d:name[.=\''.$input['soud'].'\']/ancestor::d:box/d:address/d:';
        $query_specific = 'row'.strval($i);
        $query = $query_base.$query_specific;
        $object = $xpath->query($query);

        foreach ($object as $o) {
            global $result;
            $result = $o->nodeValue;
        }

        $search_and_replace['adresa_'.$i] = $result;
    }
}

check_soud();

$search_and_replace['datum_doruceni_pr'] = get_ciselne_datum($input['datum_doruceni_pr']);

$search_and_replace['cislo_jednaci'] = $input['cislo_jednaci'];

function get_datum_cesky_mesic($datum) {
    $mesice_cesky = array(
        'January' => 'ledna',
        'February' => 'února',
        'March' => 'března',
        'April' => 'dubna',
        'May' => 'května',
        'June' => 'června',
        'July' => 'července',
        'August' => 'srpna',
        'September' => 'září',
        'October' => 'října',
        'November' => 'listopadu',
        'December' => 'prosince',
    );

    foreach ($mesice_cesky as $key => $value) {
        $search[] = $key;
        $replace[] = $value;
    }

    $datum_object = DateTime::createFromFormat('Y-m-d', $datum);
    $datum_string = $datum_object->format('j. F Y');
    $datum_string = str_replace($search, $replace, $datum_string);
    return $datum_string;
}

$search_and_replace['den_podani'] = get_datum_cesky_mesic($input['den_podani']);

echo '<pre>';
print_r($search_and_replace);
echo '</pre>';
