<?php
class M_pelanggan extends CI_Model
{
    var $table = 'pelanggan';
    var $column = array(
        'id_pelanggan',
        'nama_pelanggan',
        'alamat',
        'no_telpon',
    ); //set column field database for order and search
    var $order = array('id_pelanggan' => 'desc');


    private function _get_datatables_query()
    {
        $this->db->from($this->table);
        $i = 0;

        foreach ($this->column as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. 
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $column[$i] = $item; // set column array variable to order processing
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;

            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();

        return $query->num_rows();
    }
    public function count_all()
    {
        $this->db->from($this->table);

        return $this->db->count_all_results();
    }

    public function show_table()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    //detail pelanggan tiap id
    public function detail($id)
    {
        $this->db->select('* from pelanggan where id_pelanggan="' . $id . '"', false);
        return $this->db->get()->row();
    }
    //add pelanggan
    public function add()
    {
        $data = array(
            "nama_pelanggan"    => $this->input->post('nama_pelanggan'),
            "alamat"            => $this->input->post('alamat'),
            "no_telpon"         => $this->input->post('no_telpon'),
        );

        // var_dump($data);
        // die();
        $this->db->insert('pelanggan', $data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    //edit pelanggan
    public function edit()
    {
        $id_pelanggan = $this->input->post('id_pelanggan');
        $data = array(
            "nama_pelanggan"    => $this->input->post('nama_pelanggan'),
            "alamat"            => $this->input->post('alamat'),
            "no_telpon"         => $this->input->post('no_telpon'),
        );

        // var_dump($data);
        // die();
        $this->db->update('pelanggan', $data, array("id_pelanggan" => $id_pelanggan));
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    //delete pelanggan
    public function delete()
    {
        $id_pelanggan = $this->input->post('id_pelanggan');
        $this->db->delete("pelanggan", array("id_pelanggan" => $id_pelanggan));
    }
}
