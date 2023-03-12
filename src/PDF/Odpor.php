<?php

namespace laweb\PDF;

ini_set('display_errors', 1);
error_reporting(E_ALL);
ini_set('html_errors', 1);
ini_set('error_prepend_string', '<pre>');
ini_set('error_append_string', '</pre>');

class Odpor {

    public function get_adresat($input_array, &$output_array) {
        $output_array['adresat'] = $input_array['adresat'];
    }

    public function get_adresa($input_array, &$output_array, $adresy_xml) {
        $adresy = new \DOMDocument('1.0', 'UTF-8');
        $adresy->load($adresy_xml);

        $xpath = new \DOMXPath($adresy);
        // Tohle musím zobecnit nebo odstranit.
        $ns_prefix = 'd';
        $xpath->registerNamespace($ns_prefix, 'http://seznam.gov.cz/ovm/datafile/seznam_ds/v1');

        for ($i = 1; $i <= 2; $i++) {
            global $result;

            $query_base = '//'.$ns_prefix.':name[.=\''.$input_array['adresat'].'\']/ancestor::'.$ns_prefix.':box/'.$ns_prefix.':address/'.$ns_prefix.':';
            $query_specific = 'row'.strval($i);
            $query = $query_base.$query_specific;
            $object = $xpath->query($query);

            foreach ($object as $o) {
                global $result;
                $result = $o->nodeValue;
            }

            $output_array['adresa_'.$i] = $result;
        }
    }

    public function get_cislo_jednaci($input_array, &$output_array) {
        $output_array['cislo_jednaci'] = $input_array['cislo_jednaci'];
    }

    public function get_jmeno($input_array, &$output_array) {
        $output_array['jmeno'] = $input_array['jmeno'];
    }

    public function get_ciselne_datum ($datum) {
        $datum_object = \DateTime::createFromFormat('Y-m-d', $datum);
        $datum_string = $datum_object->format('j. n. Y');
        return $datum_string;
    }

    public function get_datum_cesky_mesic($datum) {
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

        $datum_object = \DateTime::createFromFormat('Y-m-d', $datum);
        $datum_string = $datum_object->format('j. F Y');
        $datum_string = str_replace($search, $replace, $datum_string);
        return $datum_string;
    }

    public function get_datum_narozeni($input_array, &$output_array) {
        $output_array['datum_narozeni'] = $this->get_ciselne_datum($input_array['datum_narozeni']);
    }

    public function get_bydliste($input_array, &$output_array) {
        $output_array['bydliste'] = $input_array['bydliste'];
    }

    public function get_datum_doruceni($input_array, &$output_array) {
        $output_array['datum_doruceni'] = $this->get_ciselne_datum($input_array['datum_doruceni']);
    }

    public function get_datum_podani ($input_array, &$output_array) {
        $output_array['datum_podani'] = $this->get_datum_cesky_mesic($input_array['datum_podani']);
    }

    public function get_druh_pr($input_array, &$output_array) {
        if ($input_array['druh_pr'] === 'pr') {
            $output_array['druh_pr_1pad'] = 'platební rozkaz';
            $output_array['druh_pr_3pad'] = 'platebnímu rozkazu';
            return;
        }

        if ($input_array['druh_pr'] === 'epr') {
            $output_array['druh_pr_1pad'] = 'elektronický platební rozkaz';
            $output_array['druh_pr_3pad'] = 'elektronickému platebnímu rozkazu';
            return;
        }
    }

    public function get_output_array($input_array, &$output_array, $adresy_xml) {
        $this->get_adresat($input_array, $output_array);
        $this->get_adresa($input_array, $output_array, $adresy_xml);
        $this->get_cislo_jednaci($input_array, $output_array);
        $this->get_jmeno($input_array, $output_array);
        $this->get_datum_narozeni($input_array, $output_array);
        $this->get_bydliste($input_array, $output_array);
        $this->get_datum_doruceni($input_array, $output_array);
        $this->get_datum_podani ($input_array, $output_array);
        $this->get_druh_pr($input_array, $output_array);

        return $output_array;
    }

}

/*$search_and_replace = array();

get_output_array($_POST, $search_and_replace, 'adresy_soudy.xml');


echo '<pre>';
print_r($_POST);
echo '</pre>';

echo '<pre>';
print_r($search_and_replace);
echo '</pre>';*/
