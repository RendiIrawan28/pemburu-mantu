<!DOCTYPE html>
<html>

<head>
    
    <title>Upload Data</title>

    <link rel="stylesheet" href="assets/extensions/filepond/filepond.css" />
    <link rel="stylesheet" href="assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.css" />
    <link rel="stylesheet" href="assets/extensions/toastify-js/src/toastify.css" />

    <link rel="stylesheet" href="./assets/compiled/css/app.css" />
    <link rel="stylesheet" href="./assets/compiled/css/app-dark.css" />

    <style>
        .btn-submit {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-submit:hover {
            background-color: #218838;
        }

        .alert {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            color: white;
        }

        .alert-success {
            background-color: #28a745;
        }

        .alert-error {
            background-color: #dc3545;
        }
    </style>
</head>

<body>
    <script src="assets/static/js/initTheme.js"></script>
    <div id="app">
        @include('partials.sidebar')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <div class="page-heading">
                <section class="section">
                    <div class="col-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Image Preview</h5>
                            </div>

                            <div class="card-content">

                                <div class="card-body">
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    @if (session('error'))
                                        <div class="alert alert-error">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    <form action="{{ route('images.store') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <p class="card-text">
                                                Silahkan upload gambar dibawah ini
                                            </p>
                                            <!-- File uploader with image preview -->
                                            <input type="file" class="image-preview-filepond" name="image" id="file" required />

                                            <div class="col-sm-12">
                                                <h6>Nama Produk</h6>
                                                <input class="form-control" type="text" name="produk_name" id="produk_name" placeholder="Nama Produk" required />
                                            </div>

                                            <div class="col-sm-12">
                                                <h6>Harga Produk</h6>
                                                <input class="form-control" type="text" name="produk_price" id="produk_price" placeholder="Harga Produk" required />
                                            </div>

                                            <div class="col-sm-12">
                                                <h6>Deskripsi Produk</h6>
                                                <textarea class="form-control" name="description" id="description" rows="20" placeholder="Deskripsi Produk" required></textarea>
                                            </div>
                                            <div>
                                                <button type="submit" class="btn-submit">Upload</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                
                            </div>

                        </div>
                    </div>
                </section>
            </div>

        </div>
        @include('partials.footer')
    </div>
    
    <script src="assets/static/js/initTheme.js"></script>
    <script src="assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>

    <script src="assets/compiled/js/app.js"></script>

    <script src="assets/extensions/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js"></script>
    <script src="assets/extensions/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.min.js"></script>
    <script src="assets/extensions/filepond-plugin-image-crop/filepond-plugin-image-crop.min.js"></script>
    <script src="assets/extensions/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js">
    </script>
    <script src="assets/extensions/filepond-plugin-image-filter/filepond-plugin-image-filter.min.js"></script>
    <script src="assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js"></script>
    <script src="assets/extensions/filepond-plugin-image-resize/filepond-plugin-image-resize.min.js"></script>
    <script src="assets/extensions/filepond/filepond.js"></script>
    <script src="assets/extensions/toastify-js/src/toastify.js"></script>
    <script src="assets/static/js/pages/filepond.js"></script>
    <script src="assets/static/js/components/dark.js"></script>

    
</body>

</html>
