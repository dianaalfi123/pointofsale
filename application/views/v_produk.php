<nav class="breadcrumb primary-y-shadow" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Components</a></li>
        <li class="breadcrumb-item active" aria-current="page">Card</li>
    </ol>
</nav>

<style>
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        padding-top: 100px;
        /* Location of the box */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
    }

    /* The Close Button */
    .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    #tambah {
        margin-top: 10px;
        margin-left: 10px;
        width: 250px;
    }
</style>

<div class="container xxl">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header"> Produk </div>
                <a id="tambah" class="btn btn-primary">+ Tambah Data Produk</a>
                <div class="card-body">
                    <table id="table-produk" class="table table-bordered table-hovered w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Harga Beli</th>
                                <th>Margin</th>
                                <th>Harga Jual</th>
                                <th>Stok</th>
                                <th style="width: 120px;">#</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                    <!-- <div class="card-footer text-end"> <a href="#" class="btn btn-primary">Go somewhere</a> </div> -->
                </div>
            </div>


        </div>
    </div>

</div>

<!-- Modal Tambah Produk-->
<div class="modal" id="modalTambah" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <h4><strong>Tambah Data Produk</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <br />

                <form action="<?= base_url('produk/add_produk') ?>" method="post" class="form-horizontal form-label-left">

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Nama Produk :
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <input type="text" name="nama_produk" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Harga Beli:
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <input type="number" name="harga_beli" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Margin :
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <input type="number" name="margin" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Harga Jual:
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <input type="number" name="harga_jual" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Stok :
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <input type="number" name="stok" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="close">Tutup</button>
                <input type="submit" name="tambah" value="Simpan" class="btn btn-primary">
            </div>
        </div>
        </form>
    </div>
</div>


<script src="<?= base_url() ?>/assets/plugins/datatables-1.11.1/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/js/components.js"></script>

<script>
    var tableProduk;

    $(function() {
        tableProduk = $("#table-produk").DataTable({
            "order": [],
            "ajax": {
                "url": base_url + "produk/datatable",
                "type": "POST",
            },

            "columnDefs": [{
                "targets": [-1, 0],
                "className": "text-center"
            }, ],
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "processing": true,
            "scrollCollapse": true,
            "language": {
                paginate: {
                    previous: "<i class='fas fa-angle-left'>",
                    next: "<i class='fas fa-angle-right'>"
                },
            },
        });
    })

    //MODAL
    var modal = document.getElementById("modalTambah");
    var close = document.getElementById("close");

    // Get the button that opens the modal
    var btn = document.getElementById("tambah");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    close.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>