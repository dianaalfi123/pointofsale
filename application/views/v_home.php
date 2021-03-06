<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reskara Bootsrap</title>
    <link rel="icon" href="<?= base_url() ?>assets/img/logos/logo-square.png" type="image/icon type">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/highlightjs-11.1.0/atom-one-dark.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
</head>

<body>
    <noscript>
        <p>To display this page you need a browser that supports JavaScript.</p>
    </noscript>
    <nav class="side-nav">
        <div class="logo">
            <a href="index.html"><img src="assets/img/logos/logo-landscape.png" alt="logo"></a>
            <button class="btn btn-default ml-auto py-0 px-0 minify-sidenav"><i class="fa fa-align-justify"></i><i class="fa fa-align-right"></i></button>
        </div>
        <div class="d-flex justify-content-center mb-2">
            <img src="assets/img/avatar/gp-white.jpg" class="avatar" alt="gp">
        </div>
        <div class="text-center mini-hide"> <span>Paijo Suwiryo</span> </div>
        <div class="text-center mini-hide text-tertiary mb-3">
            <small>paijo@domain.com</small>
        </div>
        <ul>
            <!-- panggil href controllernya -->
            <li><a href="dashboard"><i class="fa fa-tachometer-alt text-blue"></i><span>Dashboard</span></a></li>
            <li>
                <a href="javascript:" class="has-child">
                    <i class="fa fa-dharmachakra text-orange"></i><span>Master</span>
                </a>
                <ul>
                    <li><a href="produk"><span>Produk</span></a></li>
                    <li><a href="pelanggan"><span>Pelanggan</span></a></li>

                </ul>
            </li>
            <li>
                <a class="has-child" href="javascript:"><i class="fas fa-puzzle-piece text-purple"></i><span>Transaksi</span></a>
                <ul>
                    <li><a href="pages/datatables.html"><span>Penjualan</span></a></li>
                    <li><a href="pages/datatables.html"><span>Pembelian</span></a></li>
                </ul>
            </li>

        </ul>
    </nav>
    <nav class="appbar">
        <div class="appbar-items">
            <button class="sidebar-btn-mobile"><i class="fa fa-align-justify"></i></button>
            <button class="sidebar-btn-hide px-2"><i class="fa fa-arrow-left"></i></button>
            <form action="#">
                <div class="appbar-form-group">
                    <label class="icon" for="appbar-search"><i class="fa fa-search"></i></label>
                    <input type="text" id="appbar-search" class="appbar-search" placeholder="Search">
                </div>
            </form>
        </div>
        <div class="appbar-items">
            <ul class="appbar-menu">
                <li><a href="#"><i class="fa fa-bell"></i><span class="caption">Notifications</span></a></li>
                <li><a href="#"><i class="fa fa-envelope"></i><span class="caption">Emails</span></a></li>
                <li class="dropdown"><a href="#"><img src="assets/img/avatar/gp-white.jpg" alt="gp" class="appbar-avatar"><span class="caption visible">Paijo</span></a>
                    <ul class="py-2 shadow-3-5-20">
                        <li><a href="#" class="py-1 d-flex justify-items-center">
                                <i class="fa fa-user text-blue me-2"></i>
                                <div>Profile</div>
                            </a></li>
                        <li><a href="pages/login.html" class="py-1 d-flex justify-items-center">
                                <i class="fa fa-sign-out-alt text-danger me-2"></i>
                                <div>logout</div>
                            </a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <div class="r-container" id="content">
        <!-- here is your content fully loaded -->
    </div>
    <footer class="r-footer a-bold">
        <div class="container-xxl d-flex justify-content-between align-middle">
            <div><a href="https://github.com/nggepe/reskara-bootstrap" target="_blank">Github Repository</a></div>
            <div class="text-end"><span class="me-1">2021??</span> <a href="https://github.com/nggepe" target="_blank">Gilang
                    Pratama</a></div>
        </div>
    </footer>
    <script src="<?= base_url() ?>assets/plugins/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/jquery-3.6.0/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/js/reskara-bootstrap.js"></script>
    <script>
        $(document).ready(function() {
            const awesome = document.createElement("link")
            awesome.setAttribute("rel", "stylesheet")
            awesome.setAttribute("href", "assets/plugins/fontawesome-free/css/all.min.css")
            document.querySelector("head").appendChild(awesome)

        })
    </script>
    <script>
        const base_url = "<?= base_url() ?>"
        if (window.location.pathname.substr(window.location.pathname.length - 1) != "/") location.href = location.href + "/"

        const content = document.getElementById("content")
        //panggil controller dashboard saat load url pertama
        if (window.location.hash !== "") loading(window.location.hash.substr(2), window.location.hash)
        else loading(base_url + "dashboard")

        window.addEventListener("hashchange", function(ev) {
            const href = findHash(ev.newURL);
            if (href.valid) loading(href.url, "none")
        })

        function findHash(url) {
            let valid = false;
            for (var i = 0; i < url.length; i++) {
                if (url.substring(i, i + 1) == "#") {
                    var newUrl = url.substring(i)
                    if (newUrl.substring(0, 1) == "#" && newUrl.substring(0, 2) == "#/") {
                        newUrl = newUrl.substring(2)
                        valid = true;
                        break
                    } else if (newUrl.substring(0, 1) == "#") {
                        newUrl = newUrl.substring(1)
                        break
                    }
                }
            }
            return {
                url: newUrl,
                valid: valid
            }
        }
        $("nav.side-nav").find("a").click(function(e) {
            e.preventDefault()
            const href = $(this).attr("href"),
                host = href.replace(/(http:\/\/|https:\/\/)/g, "").split("/")[0],
                isHosted = href.includes("http://") || href.includes("https://"),
                target = $(this).attr("target")

            if (href !== "javascript:" && href !== "#" && href !== "index.html") window.location.hash = "/" + href
        })

        function loading(url, after = "") {
            $("#content").html(`
      <div class="d-flex justify-content-center w-100 align-self-center" style="min-height: 77vh;">
        <div class="spinner-border text-primary align-self-center" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
      </div>`)
            $.ajax({
                url: url,
                type: "GET",
                mimeType: "text/html charset=utf-8",
                async: true,
                cache: false,
                success: function(data) {
                    $("#content").html(data)
                    if (after != "none") window.location.hash = after
                }
            })
        }
    </script>
</body>

</html>