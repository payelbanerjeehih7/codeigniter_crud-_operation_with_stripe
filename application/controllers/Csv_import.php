<?php


class Csv_import extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('crud_model');
        // $this->load->spark('csvimport/0.0.1');
        $this->load->library('csv_reader');
    }

    function index()
    {
        $this->load->view('csv_import');
    }

    function load_data()
    {
        $result = $this->crud_model->select();
        $output = '
                <h3 align="center">Imported User Details From CSV File</h3>
                <div class="table-responsive">
                <table class="table table-bordered table-stripped">
                <tr>
                <th>SL.No.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>Password</th>
                <th>Phone</th>
                <th>Registration Date</th>
                </tr>
        ';
        $count = 0;
        if ($result->num_rows() > 0) {
            foreach ($result->result() as $row) {
                $count = $count + 1;
                $output .= '
                <tr> 
                    <td>' . $count . '</td>
                    <td>' . $row->name . '</td>
                    <td>' . $row->email . '</td>
                    <td>' . $row->age . '</td>
                    <td>' . $row->password . '</td>
                    <td>' . $row->phone . '</td>
                    <td>' . $row->registrationdate . '</td>
                </tr>
                ';
            }
        } else {
            $output .= '
                <tr>
                    <td colspan="5" align="center">Data Not Available</td>
                </tr>
            ';
        }
        $output .= '</table></div>';
        echo $output;
    }
    // function import()
    // {
    //     // $this->load->model('crud_model');
    //     // $this->load->library('csvimport');
    //     $file_data = $this->csvimport->get_array($_FILES["csv_file"]["tmp_name"]);

    //     // print_r($file_data);
    //     // die;
    //     $data = [];
    //     // foreach ($file_data as $row) {
    //     //     $data[] = array(

    //     //         'name' => $row["name"],
    //     //         'email' => $row["email"],
    //     //         'age' => $row["age"],
    //     //         'email' => $row["Email"],
    //     //         'password' => $row["password"],
    //     //         'phone' => $row["phone"],
    //     //         'registrationdate' => $row[">registrationdate"]
    //     //     );
    //     // }
    //     print_r($data);
    //     $this->crud_model->insert($file_data);
    // }


    function parseExcel()
    {
        // $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
        $config['upload_path'] = './application/';
        $config['allowed_types'] = 'csv';

        $this->load->library('upload', $config);


        $data = array('upload_data' => $this->upload->data());
        $file_name = $_FILES['csv_file']['name'];

        // echo $post_image;
        // die;
        $file_path = APPPATH . $file_name;
        // print_r($file_path);
        // die;

        // parsecsv/php-parsecsv
        $csv = new \ParseCsv\Csv();
        $csv->auto($file_path); // Automatically detect delimiter and header
        $data = $csv->data;
        // echo "<pre>";
        // print_r($data);
        // die;
        foreach ($data as $row) {
            $value[] = array(

                'name' => $row["name"],
                'email' => $row["email"],
                'age' => $row["age"],
                'password' => $row["password"],
                'phone' => $row["phone"],
                'registrationdate' => $row["registrationdate"]
            );
        }
        
        $this->crud_model->insert($value);
    }
}
