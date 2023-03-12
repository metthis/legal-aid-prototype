<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
ini_set('html_errors', 1);
ini_set('error_prepend_string', '<pre>');
ini_set('error_append_string', '</pre>');

function get_adresy ($organy_xml) {
    $list = simplexml_load_file($organy_xml);

    foreach ($list->box as $box) {
        global $adresy;

        $address = $box->address;

        $street = (string) $address->street;
        $cp = (string) $address->cp;
        $co = (string) $address->co;
        $zip_parts = str_split((string) $address->zip, 3);
        $zip = $zip_parts[0].' '.$zip_parts[1];
        $city = (string) $address->city;

        $adresat = (string) $box->name->tradeName;
        if ($co) $adresa_1 = $street.' '.$cp.'/'.$co; else $adresa_1 = $street.' '.$cp;
        $adresa_2 = $zip.' '.$city;

        $adresy[$adresat] = array(
            'adresa_1' => $adresa_1,
            'adresa_2' => $adresa_2
        );
    }

    return $adresy;
}

$adresy = get_adresy ('soudy.xml');

echo '<pre>';
print_r($adresy);
echo '</pre>';