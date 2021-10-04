<nav class="breadcrumb primary-y-shadow" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Components</a></li>
        <li class="breadcrumb-item active" aria-current="page">Card</li>
    </ol>
</nav>


<div class="container xxl">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header"> Produk </div>
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
</script>