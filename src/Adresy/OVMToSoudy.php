<?php

namespace laweb\Adresy;

ini_set('display_errors', 1);
error_reporting(E_ALL);
ini_set('html_errors', 1);
ini_set('error_prepend_string', '<pre>');
ini_set('error_append_string', '</pre>');

$soudy_jmena = array();

$list = simplexml_load_file('ovm.xml');

foreach ($list->box as $box) {
    global $soudy_jmena;

    $tradeName = (string) $box->name->tradeName;

    if (strpos($tradeName, ' soud ') !== false) $is_soud = true; else $is_soud = false;
    if (strcmp($tradeName, 'Nejvyšší soud') === 0) $is_NS = true; else $is_NS = false;
    if (strcmp($tradeName, 'Nejvyšší správní soud') === 0) $is_NSS = true; else $is_NSS = false;
    if (strcmp($tradeName, 'Ústavní soud') === 0) $is_US = true; else $is_US = false;

    if ($is_soud or $is_NS or $is_NSS or $is_US) $soudy_jmena[] = $tradeName;
}

unset($list);

// Původní dokument: ovm.xml
$ovm_xml = new DOMDocument('1.0', 'UTF-8');
$ovm_xml->load('ovm.xml');

// Construct XPath ovm.xml
$xpath = new DOMXPath($ovm_xml);
$xpath->registerNamespace('d', 'http://seznam.gov.cz/ovm/datafile/seznam_ds/v1');

// Budoucí dokument: soudy.xml
$soudy_xml = new DOMDocument('1.0', 'UTF-8');
$soudy_xml->preserveWhiteSpace = false;
$soudy_xml->formatOutput = true;

// Create <root> with a namespace and attribute
$soudy_xml_root = $soudy_xml->createElementNS('http://seznam.gov.cz/ovm/datafile/seznam_ds/v1', 'list');
$soudy_xml->appendChild($soudy_xml_root);
$soudy_xml_root_attribute = $soudy_xml->createAttribute('source-system');
$soudy_xml_root_attribute->value = 'https://www.mojedatovaschranka.cz/sds';
$soudy_xml_root->appendChild($soudy_xml_root_attribute);

foreach ($soudy_jmena as $soud) {
    global $soudy_xml, $soudy_xml_root;

    $address_values = array(
        'street' => '',
        'cp' => '',
        'co' => '',
        'zip' => '',
        'city' => ''
    );

    foreach ($address_values as $key => $value) {
        global $soud, $address_values;

        $query_prefix = '//d:tradeName[.=\''.$soud.'\']/ancestor::d:box/d:address/d:';
        $query_core = $key;
        $query_suffix = '/text()';
        $query = $query_prefix.$query_core.$query_suffix;

        $object = $xpath->query($query);

        foreach ($object as $o) {
            global $result;
            $result = $o->nodeValue;
        }

        if (isset($result)) $address_values[$key] = $result;

        // Kdyby $result zůstal a následující hodnota byla prázdá, do $address_value by se propsal $result předchozí hodnoty
        unset($result);
    }

    $street = $address_values['street'];
    $cp = $address_values['cp'];
    $co = $address_values['co'];
    $zip_parts = str_split($address_values['zip'], 3);
    $zip = $zip_parts[0].' '.$zip_parts[1];
    $city = $address_values['city'];

    $adresat = $soud;
    if ($co) $adresa_1 = $street.' '.$cp.'/'.$co; else $adresa_1 = $street.' '.$cp;
    $adresa_2 = $zip.' '.$city;

//    echo $adresat.'<br />'.$adresa_1.'<br />'.$adresa_2.'<br /><br />';

    $soudy_xml_box = $soudy_xml_root->appendChild($soudy_xml->createElement('box'));
    $soudy_xml_name = $soudy_xml_box->appendChild($soudy_xml->createElement('name'));
    $soudy_xml_name->appendChild($soudy_xml->createTextNode($adresat));
    $soudy_xml_address = $soudy_xml_box->appendChild($soudy_xml->createElement('address'));
    $soudy_xml_row1 = $soudy_xml_address->appendChild($soudy_xml->createElement('row1'));
    $soudy_xml_row1->appendChild($soudy_xml->createTextNode($adresa_1));
    $soudy_xml_row2 = $soudy_xml_address->appendChild($soudy_xml->createElement('row2'));
    $soudy_xml_row2->appendChild($soudy_xml->createTextNode($adresa_2));
}

$soudy_xml->save('adresy_soudy.xml');

/*$string = $soudy_xml->saveXML();
$soudy_xml->formatOutput = true;
print_r($string);*/