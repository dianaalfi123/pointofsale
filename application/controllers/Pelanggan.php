<?php
class Pelanggan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model("M_pelanggan", "M_pelanggan");
    }

    public function index()
    {
        $this->load->view('v_pelanggan');
    }

    function datatable()
    {
        $list = $this->M_pelanggan->show_table();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $key->nama_pelanggan;
            $row[] = $key->alamat;
            $row[] = $key->no_telpon;
            $row[] = '<a class="btn btn-sm btn-primary"  href="javascript:void(0)" title="Edit" onclick="edit(' . "'" . $key->id_pelanggan . "'" . ')"><i class="fa fa-edit"></i></a>
				   <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="deleteData(' . "'" . $key->id_pelanggan . "'" . ')"><i class="fa fa-trash"></i></a>';

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_pelanggan->count_all(),
            "recordsFiltered" => $this->M_pelanggan->count_filtered(),
            "data" => $data
        );
        echo json_encode($output);
    }

    //detail pelanggan tiap id
    public function detail($id)
    {
        $data = $this->M_pelanggan->detail($id);
        // var_dump($data);
        // die();
        echo json_encode($data);
    }

    //add pelanggan
    public function add()
    {

        $this->M_pelanggan->add();
        $this->session->set_flashdata('pesan_sukses', 'Sukses Menambah Pelanggan');
        $this->session->set_flashdata('pesan_gagal', 'Gagal Menambah Pelanggan');
        redirect('/#/pelanggan', 'refresh');
    }

    //edit pelanggan
    public function edit()
    {

        $this->M_pelanggan->edit();
        $this->session->set_flashdata('pesan_sukses', 'Sukses Mengubah Pelanggan');
        $this->session->set_flashdata('pesan_gagal', 'Gagal Mengubah Pelanggan');
        redirect('/#/pelanggan', 'refresh');
    }

    //delete pelanggan
    public function delete()
    {
        $this->M_pelanggan->delete();
        $this->session->set_flashdata('pesan_sukses', 'Sukses Menghapus Pelanggan');
        $this->session->set_flashdata('pesan_gagal', 'Gagal Menghapus Pelanggan');
        redirect('/#/pelanggan', 'refresh');
    }
}
