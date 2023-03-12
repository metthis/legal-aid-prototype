<?php

namespace laweb\PDF;

require_once __DIR__.'/../bootstrap.php';

class myPDF extends \tFPDF
{
    function StandardPDF($font) {
        global $font;

        $this->SetMargins(25, 25, 25);
        $this->SetAutoPageBreak (1, 25);
        $this->AddPage();
        $this->AddFont($font, '', $font.'.ttf', true);
        $this->AddFont($font, 'B', $font.'-Bold.ttf', true);
        $this->AddFont($font, 'I', $font.'-Italic.ttf', true);
        $this->AddFont($font, 'BI', $font.'-BoldItalic.ttf', true);
        $this->SetFont($font, '', 11);
        $this->SetX(25);

    }

    function Title($title) {
        global $font, $title_size, $h_basic_lines, $ln_after_title;

        $this->SetFont($font, 'BU', $title_size);
        $w_title = $this->GetStringWidth($title) + 6;
        $this->SetX((210-$w_title)/2);
        $this->MultiCell($w_title, $h_basic_lines, $title, 0, 'C', false);
        $this->Ln($ln_after_title);
    }

    function TextBody ($array) {
        global $font, $h_basic_lines, $line_spacing;

        $this->SetFont($font, '', 11);

        $number_of_lines = count($array);

        if ($number_of_lines > 0) {
            $this->MultiCell(0, $h_basic_lines, $array[0], 0, 'L', false);
        }

        if ($number_of_lines > 1) {
            for ($i = 1; $i <= $number_of_lines - 1; $i++) {
                $this->Ln($line_spacing);
                $this->MultiCell(0, $h_basic_lines, $array[$i], 0, 'L', false);
            }
        }
    }
}