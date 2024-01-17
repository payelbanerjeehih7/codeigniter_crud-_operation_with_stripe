

<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Maincontroller extends CI_Controller
{
    public function index()
    {
        $this->load->view('search_view');
        $this->load->library('pagination');
        $this->load->view('excel_view');

        $config['base_url'] = base_url('Maincontroller/index/');
        $config['total_rows'] = $this->crud_model->getTotalRows();
        $config['per_page'] = 2;


        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</li>';
        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);

        // echo $this->pagination->create_links();

        $data['details'] = $this->crud_model->getAlldetails($config['per_page'], $this->uri->segment(3));
        $this->load->view("display", $data);
        $this->load->view('filter_view');
    }

    public function search()
    {
        $keyword = $this->input->post('keyword');

        // Load your model to interact with the database
        $this->load->model('crud_model');

        // Perform the search
        $data['results'] = $this->crud_model->searchProducts($keyword);

        // Load the view with search results
        $this->load->view('result_view', $data);
    }

    public function filter()
    {
        $start_date = $this->input->post('start_date');

        $this->load->library('session');
        $this->session->set_userdata('selected_date', $start_date);


        // Load your model to interact with the database
        $this->load->model('crud_model');

        // Perform the date filter
        $data['results'] = $this->crud_model->filterByDate($start_date);

        // Load the view with filtered results (for demonstration purposes)
        $this->load->view('filter_results', $data);
    }


    // public function download()
    // {
    //     // Load your model to get data from the database
    //     $this->load->model('crud_model');

    //     // Get data from the model
    //     $data = $this->crud_model->getDataexcel();


    //     // Create a new Spreadsheet object
    //     $spreadsheet = new Spreadsheet();

    //     // Set the active sheet
    //     $sheet = $spreadsheet->getActiveSheet();

    //     // Add data to the spreadsheet
    //     foreach (range('A', 'G') as $columnID) {
    //         $spreadsheet->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
    //     }
    //     $sheet->setCellValue('A1', 'ID');
    //     $sheet->setCellValue('B1', 'Name');
    //     $sheet->setCellValue('C1', 'Email');
    //     $sheet->setCellValue('D1', 'Age');
    //     $sheet->setCellValue('E1', 'Password');
    //     $sheet->setCellValue('F1', 'Phone');
    //     $sheet->setCellValue('G1', 'Registration Date');

    //     $users = $this->db->query("SELECT * FROM crud")->result_array();
    //     $row = 2;
    //     foreach ($users as $item) {
    //         $sheet->setCellValue('A' . $row, $item['id']);
    //         $sheet->setCellValue('B' . $row, $item['name']);
    //         $sheet->setCellValue('C' . $row, $item['email']);
    //         $sheet->setCellValue('D' . $row, $item['age']);
    //         $sheet->setCellValue('E' . $row, $item['password']);
    //         $sheet->setCellValue('F' . $row, $item['phone']);
    //         $sheet->setCellValue('G' . $row, $item['registrationdate']);
    //         $row++;
    //     }

    //     // Set headers for download
    //     $filename = 'export_data_' . date('YmdHis') . '.xlsx';
    //     header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    //     header('Content-Disposition: attachment;filename="' . $filename . '"');
    //     header('Cache-Control: max-age=0');

    //     // Create Excel writer
    //     $writer = new Xlsx($spreadsheet);

    //     // Save file to output
    //     $writer->save($filename);
    //     exit;
    // }

    // public function createXLS()
    // {
    //     $this->load->library('Excel');
    //     $object = new PHPExcel();

    //     $object->setActiveSheetIndex(0);
    //     $table_columns = array('ID', 'Name', 'Age', 'Password', 'Phone', 'Registration Date');
    //     $column = 0;
    //     foreach ($table_columns as $field) {
    //         $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
    //         $column++;
    //     }
    //     $feedbackInfo = $this->crud_model->getDataexcel();
    //     $row = 2;

    //     foreach ($feedbackInfo as $item) {
    //         $object->getActiveSheet()->setCellValueByColumnAndRow(0, $row, $item->id);
    //         $object->getActiveSheet()->setCellValueByColumnAndRow(1, $row, $item->name);
    //         $object->getActiveSheet()->setCellValueByColumnAndRow(2, $row, $item->email);
    //         $object->getActiveSheet()->setCellValueByColumnAndRow(3, $row, $item->age);
    //         $object->getActiveSheet()->setCellValueByColumnAndRow(4, $row, $item->password);
    //         $object->getActiveSheet()->setCellValueByColumnAndRow(5, $row, $item->phone);
    //         $object->getActiveSheet()->setCellValueByColumnAndRow(6, $row, $item->registrationdate);
    //         $row++;
    //     }

    //     $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');

    //     header('Content-Type: application/vnd.ms-excel');
    //     header('Content-Disposition: attachment;filename="data.xls"');
    //     $object_writer->save('php://output');
    // }

    public function downloadCsv()
    {
        // Load the database model
        $this->load->model('crud_model');

        // Fetch data from the model
        $data = $this->crud_model->getData();

        // Set CSV filename
        $filename = 'export_data.csv';

        // Load the CSV helper
        $this->load->helper('csv');

        // Create the CSV content
        $csv_data = array_to_csv($data);

        // Set headers for download
        header('Content-Type: application/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');

        // Output the CSV data
        echo $csv_data;
    }

    public function downloadDatabasePdf()
    {

        // Name of your pdf file
        $filename = time() . "_filename.pdf";
        // fetch data from the database
        $data = $this->crud_model->getDatapdf();
        // pass data to view
        $html = $this->load->view('pdf/database_pdf', $data, true);
        // load the library
        $this->load->library('M_pdf');
        $this->m_pdf->pdf->WriteHTML($html);
        //download it D save F.
        $this->m_pdf->pdf->Output("./assets/doc/" . $filename, "F");
        echo "PDF has been generated successfully!";
    }

    public function downloadCsvfiltered()
    {
        $this->load->library('session');
        $data['selected_date'] = $this->session->userdata('selected_date');
        // print_r($data);
        // die;


        // Load the database model
        $this->load->model('crud_model');

        // Fetch data from the model
        $value = $this->crud_model->getDatafiltered($data);

        // Set CSV filename
        $filename = 'export_data.csv';

        // Load the CSV helper
        $this->load->helper('csv');

        // Create the CSV content
        $csv_data = array_to_csv($value);

        // Set headers for download
        header('Content-Type: application/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');

        // Output the CSV data
        echo $csv_data;
    }

    // public function upload_csv()
    // {
    //     $config['upload_path']   = './uploads/';
    //     $config['allowed_types'] = 'csv';
    //     $config['max_size']      = 1024; // Set an appropriate max size if needed

    //     $this->load->library('upload', $config);

    //     if (!$this->upload->do_upload('userfile')) {
    //         // Handle the upload error
    //         $error = array('error' => $this->upload->display_errors());
    //         $this->load->view('upload_form', $error);
    //     } else {
    //         // Upload successful, process the CSV file
    //         $file_data = $this->upload->data();
    //         $file_path = $file_data['full_path'];
    //         $this->load->model('crud_model');
    //         $this->crud_model->process_csv($file_path);

    //         // Optionally, you can display a success message or redirect to another page
    //         $this->load->view('upload_success');
    //     }
    // }

    public function submit()
    {
        $this->form_validation->set_rules('name', 'Your_Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email_id', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('phone', 'Mobile_no.', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $data_error = [
                'error' => validation_errors()

            ];
            $this->session->set_flashdata($data_error);
        } else {
            $result = $this->crud_model->insertdata([
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'phone' => $this->input->post('phone')

            ]);
            if ($result) {
                $this->session->set_flashdata('inserted', 'Data has been successfully added!');
            }
        }
        redirect('Maincontroller');
    }
    public function edit($id)
    {
        $data['singledetail'] = $this->crud_model->getSingledetail($id);
        $this->load->view('edit', $data);
    }
    public function update($id)
    {
        $this->form_validation->set_rules('name', 'Your_Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email_id', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('phone', 'Mobile_no.', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $data_error = [
                'error' => validation_errors()

            ];
            $this->session->set_flashdata($data_error);
        } else {
            $result = $this->crud_model->updatedata([
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'phone' => $this->input->post('phone')

            ], $id);
            if ($result) {
                $this->session->set_flashdata('updated', 'Data has been successfully updated!');
            }
        }
        redirect('Maincontroller');
    }
    public function delete($id)
    {
        $result = $this->crud_model->deletedata($id);
        if ($result) {
            $this->session->set_flashdata('deleted', 'Data has been deleted!');
        }
        redirect('Maincontroller');
    }
}
