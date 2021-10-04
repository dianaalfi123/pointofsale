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

    .modal1 {
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
    .modal-content1 {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
    }

    /* The Close Button */
    .close1 {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close1:hover,
    .close1:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }
</style>

<div class="container xxl">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header"> Pelanggan </div>
                <a id="tambah" class="btn btn-primary">+ Tambah Data Pelanggan</a>
                <!-- <button id="tambah">Open Modal</button> -->
                <div class="card-body">
                    <table id="table-pelanggan" class="table table-bordered table-hovered w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pelanggan</th>
                                <th>Alamat</th>
                                <th>No Telpon</th>
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
<!-- <button id='edits'>go edit</button> -->
<!-- Modal Tambah Pelanggan-->
<div class="modal" id="modalTambah" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="<?= base_url('pelanggan/add') ?>" method="post" class="form-horizontal form-label-left">

            <div class="modal-content">
                <div class="modal-header">

                    <h4><strong>Tambah Data pelanggan</strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <br />


                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Nama Pelaanggan :
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <input type="text" name="nama_pelanggan" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Alamat:
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <input type="text" name="alamat" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">no_telpon :
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <input type="number" name="no_telpon" required="required" class="form-control col-md-7 col-xs-12">
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

<!-- Modal Edit Pelanggan-->
<div class="modal" id="modalEdit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="<?= base_url('pelanggan/edit') ?>" method="post" class="form-horizontal form-label-left">

            <div class="modal-content">
                <div class="modal-header">

                    <h4><strong>Edit Data pelanggan</strong></h4>
                    <button type="button" id='close2' onClick="reply_click(this.id)" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <br />

                    <input type="text" name="id_pelanggan" id="id_pelanggan" required="required" class="form-control col-md-7 col-xs-12" hidden>

                    <div class="form-group">
                        <label class="control-label col-md-5 col-sm-3 col-xs-12">Nama Pelanggan :
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <input type="text" name="nama_pelanggan" id="nama_pelanggan" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-md-5 col-sm-3 col-xs-12">Alamat:
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <input type="text" name="alamat" required="required" id="alamat" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-md-5 col-sm-3 col-xs-12">no_telpon :
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <input type="number" name="no_telpon" id="no_telpon" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="close1" onClick="reply_click(this.id)">Tutup</button>
                    <input type="submit" name="tambah" value="Simpan" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
</div>

<!--  Konfirmasi Hapus Pelanggan -->
<div class="modal" id="modalHapus" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="<?= base_url('pelanggan/delete') ?>" method="post" class="form-horizontal form-label-left">

            <div class="modal-content">
                <div class="modal-header">
                    <h2><strong>Hapus Data Pelanggan</strong></h2>
                    <button type="button" class="close" onClick="reply_click(this.id)" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">
                    <div class="row">
                        <p id="med" style="text-align:center;font-size: 20px;">PERINGATAN!</p>
                        <p style="text-align:center;font-size: 17px;">Apakah Anda Yakin Ingin Menghapus Pelanggan <input style='border-color: transparent;font-weight: bold;width: -moz-fit-content;width: fit-content;padding: 5px;margin-bottom: 1em;' type="text" id='nama_pelanggan1' readonly> ?</p>
                    </div>
                </div>

                <input type="hidden" id="id_pelanggan1" name="id_pelanggan" required="required" class="form-control col-md-7 col-xs-12">

                <div class="modal-footer">
                    <button type="button" onClick="reply_click(this.id)" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <input type="submit" value="Konfirmasi" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
</div>

<script src="<?= base_url() ?>/assets/plugins/datatables-1.11.1/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/assets/js/components.js"></script>

<script>
    //DATATABLE
    var tablePelanggan;

    $(function() {
        tablePelanggan = $("#table-pelanggan").DataTable({
            "order": [],
            "ajax": {
                "url": base_url + "pelanggan/datatable",
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


    //MODAL tambah
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

    //MODAL edit
    var modal1 = document.getElementById("modalEdit");


    function edit(a) {
        modal1.style.display = "block";
        $.ajax({
            type: "post",
            url: base_url + "pelanggan/detail/" + a,
            dataType: "json",
            success: function(data) {
                // console.log(data.id_pelanggan);
                // console.log('oke');

                $("#id_pelanggan").val(data.id_pelanggan);
                $("#id_pelanggan1").val(data.id_pelanggan);
                $("#nama_pelanggan").val(data.nama_pelanggan);
                $("#nama_pelanggan1").val(data.nama_pelanggan);
                $("#alamat").val(data.alamat);
                $("#no_telpon").val(data.no_telpon);
            }
        });

    }


    //MODAL hapus
    var modal2 = document.getElementById("modalHapus");

    function deleteData(a) {
        modal2.style.display = "block";
        $.ajax({
            type: "post",
            url: base_url + "pelanggan/detail/" + a,
            dataType: "json",
            success: function(data) {
                console.log(data.id_pelanggan);
                console.log('oke');
                // $("#id_pelanggan").val(data.id_pelanggan);
                $("#id_pelanggan1").val(data.id_pelanggan);
                // $("#nama_pelanggan").val(data.nama_pelanggan);
                $("#nama_pelanggan1").val(data.nama_pelanggan);
                $("#alamat").val(data.alamat);
                $("#no_telpon").val(data.no_telpon);
            }
        });
    }

    function reply_click(clicked_id) {
        modal1.style.display = "none";
        modal2.style.display = "none";
    }
</script>