<?php
class Produk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("M_produk", "M_produk");
    }

    public function index()
    {
        $this->load->view('v_produk');
    }

    function datatable()
    {
        $list = $this->M_produk->show_table();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $key->nama_produk;
            $row[] = $key->harga_beli;
            $row[] = $key->margin;
            $row[] = $key->harga_jual;
            $row[] = $key->stok;
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit(' . "'" . $key->id_produk . "'" . ')"><i class="fa fa-edit"></i></a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="deleteData(' . "'" . $key->id_produk . "'" . ')"><i class="fa fa-trash"></i></a>';

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_produk->count_all(),
            "recordsFiltered" => $this->M_produk->count_filtered(),
            "data" => $data
        );
        echo json_encode($output);
    }
}
