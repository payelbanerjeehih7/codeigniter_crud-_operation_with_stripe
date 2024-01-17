<?php
require FCPATH . 'vendor/autoload.php';
class Export extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    function view()
    {
        $this->load->model('crud_model');
        $data['records'] = $this->crud_model->getDatapdf();

        $html = $this->load->view('pdf/database_pdf', $data, true);

        // $link= '<a href="https://www.google.com/">Click here</a>';
        // $html = 'Your account has been successfully created'.$link;
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $mpdf->Output();
        // $this->load->view('input');
        // if
    }
}
