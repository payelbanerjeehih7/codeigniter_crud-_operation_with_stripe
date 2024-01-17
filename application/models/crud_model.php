<?php

class crud_model extends CI_Model
{
    public function getAlldetails($limit, $offset)
    {
        $query = $this->db->limit($limit, $offset);
        $query = $this->db->get("crud");
        if ($query) {
            return $query->result();
        }
    }

    public function searchProducts($keyword)
    {
        $this->db->like('name', $keyword);
        $this->db->or_like('email', $keyword);

        $query = $this->db->get('crud');

        return $query->result();
    }

    public function filterByDate($start_date)
    {
        $this->db->where('registrationdate', $start_date);

        $query = $this->db->get('crud');

        return $query->result();
    }

    public function getTotalRows()
    {
        $query = $this->db->get("crud");
        return $query->num_rows();
    }

    //Download the file
    // public function getData()
    // {
    //     // Modify this method to fetch data from your database
    //     $query = $this->db->select(['id', 'name', 'email', 'age', 'password', 'phone', 'registrationdate'])->from('crud')->get();
    //     // print_r(($query));
    //     // die;
    //     return $query->result();
    // }

    public function getData()
    {
        // Modify this method to fetch data from your database
        $query = $this->db->get('crud');
        return $query->result_array();
    }

    public function getDatapdf()
    {
        // Modify this method to fetch data from your database
        $query = $this->db->get('crud');
        return $query->result_array();
    }


    public function getDatafiltered($data)
    {

        $this->db->where('registrationdate', $data['selected_date']);

        $query = $this->db->get('crud');

        return $query->result_array();
    }

    function select()
    {
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get("crud");
        return $query;
    }

    function insert($data)
    {
        $query = $this->db->insert_batch("crud", $data);
        return $query;
    }

    // public function process_csv_file($file_path)
    // {
    //     $csv_data = array_map('str_getcsv', file($file_path));
    //     $headers = array_shift($csv_data);

    //     $this->load->database();

    //     foreach ($csv_data as $row) {
    //         $data = array_combine($headers, $row);
    //         $this->db->insert("crud", $data);
    //     }
    // }

    public function insertdata($data)
    {
        $query = $this->db->insert("crud", $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    public function getSingledetail($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get("crud");
        if ($query) {
            return $query->row();
        } else {
            return false;
        }
    }
    public function updatedata($data, $id)
    {
        $this->db->where('id', $id);
        $query = $this->db->update('crud', $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    public function deletedata($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->delete('crud');
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
}
