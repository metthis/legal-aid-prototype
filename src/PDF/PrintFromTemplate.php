<?php

namespace laweb\PDF;

ini_set('display_errors', 1);
error_reporting(E_ALL);
ini_set('html_errors', 1);
ini_set('error_prepend_string', '<pre>');
ini_set('error_append_string', '</pre>');

require_once __DIR__.'/../bootstrap.php';

class PrintFromTemplate {

    public function PrintFromTemplate($search_and_replace, $filename, $filename_result_suffix) {
        $search = array();
        $replace = array();

        foreach ($search_and_replace as $key => $value) {
            $search[] = '#{'.$key.'}';
            $replace[] = $value;
        }

        $filename_array = explode('.', $filename);
        $filename_name = $filename_array[0];
        $filename_extension = $filename_array[1];

        $filename_result = $filename_name.$filename_result_suffix.'.'.$filename_extension;

        $template = file_get_contents('../../assets/templates/'.$filename);

        $result = str_replace($search, $replace, $template);
        
        file_put_contents('../../assets/results/'.$filename_result, $result);

        header('Location: ../../'.$filename_name.'_printed.'.$filename_extension);

        exit;
    }

}