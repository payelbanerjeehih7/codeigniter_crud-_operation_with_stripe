<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Mpdf\Mpdf;

class Mpdf_lib extends Mpdf
{

    public function __construct()
    {
        parent::__construct();
    }
    public function generatePdf($data, $filename)
    {
        // Set PDF metadata
        $this->SetTitle('Exported Data');

        // Your data to be inserted into the PDF
        foreach ($data['records'] as $record) {
            $this->WriteHTML(implode(', ', $record) . '<br>');
        }

        // Output the PDF
        $this->Output($filename, 'D'); // 'D' forces the browser to download the file
    }
}
