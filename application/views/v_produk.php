<nav class="breadcrumb primary-y-shadow" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Components</a></li>
        <li class="breadcrumb-item active" aria-current="page">Card</li>
    </ol>
</nav>

<div class="container-xxl">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header"> Produk </div>
                <div class="card-body">
                    <div class="text-end">
                        <a id="tambah" class="btn btn-primary btn-sm"> <i class="fa fa-plus"></i> Tambah Data Produk</a>
                    </div>
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
                </div>
            </div>
        </div>
    </div>

</div>

<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="productForm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="from-group col-lg-6 col-sm-12">
                            <label for="nama_produk">Nama produk</label>
                            <input type="text" required class="form-control" id="nama_produk" name="nama_produk">
                        </div>
                        <div class="from-group col-lg-6 col-sm-12">
                            <label for="harga_beli">Harga beli</label>
                            <input type="text" required class="form-control" id="harga_beli" name="harga_beli">
                        </div>
                        <div class="from-group col-lg-6 col-sm-12">
                            <label for="margin">Margin</label>
                            <input type="text" required class="form-control" id="margin" name="margin">
                        </div>
                        <div class="from-group col-lg-6 col-sm-12">
                            <label for="harga_jual">Harga jual</label>
                            <input type="text" required class="form-control" id="harga_jual" name="harga_jual">
                        </div>
                        <div class="from-group col-lg-6 col-sm-12">
                            <label for="stok">Stok</label>
                            <input type="text" required class="form-control" id="stok" name="stok">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="<?= base_url() ?>assets/js/components.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables-1.11.1/jquery.dataTables.min.js"></script>

<script>
    var tableProduk, modalForm = $("#modalTambah"),
        saveMethod = "add",
        globalid
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

        $("#tambah").on("click", function(e) {
            e.preventDefault()
            modalForm.modal("show")
            modalForm.find(".modal-title").text("Tambah Produk")
            saveMethod = "add"
            modalForm.find("input").val("")
        })

        $("#productForm").on("submit", function(e) {
            e.preventDefault()

            const form = $(this).serialize();
            let url;
            if (saveMethod == "add") url = base_url + "produk/simpan";
            else url = base_url + "produk/update/" + globalid
            $.ajax({
                url: url,
                type: "POST",
                data: form,
                dataType: "JSON",
                success: function(data) {
                    modalForm.modal("hide")
                    tableProduk.ajax.reload()
                },
                error: function(x, s, e) {
                    alert(e)
                }
            })
        })
    })

    function edit(id) {
        saveMethod = "update"
        globalid = id
        modalForm.find(".modal-title").text("Ubah produk")
        $.ajax({
            url: base_url + "produk/edit/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                modalForm.modal("show")
                modalForm.find("#nama_produk").val(data.nama_produk)
                modalForm.find("#margin").val(data.margin)
                modalForm.find("#harga_beli").val(data.harga_beli)
                modalForm.find("#harga_jual").val(data.harga_jual)
                modalForm.find("#stok").val(data.stok)
            }
        })
    }
</script>