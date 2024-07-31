<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data</title>

    <link rel="stylesheet" href="{{ asset('assets/extensions/filepond/filepond.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/extensions/toastify-js/src/toastify.css') }}" />

    <link rel="stylesheet" href="{{ asset('./assets/compiled/css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('./assets/compiled/css/app-dark.css') }}" />
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
    <script src="{{ asset('assets/static/js/initTheme.js') }}"></script>
    <div id="app">
        @include('partials.sidebar')
        <div id="main">
            @include('partials.topbar')
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Edit Data</h3>
                            <p class="text-subtitle text-muted">
                                Silahkan masukan data yg sesuai
                            </p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="index.html">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Edit data
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Image Preview</h5>
                                </div>
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
                                <form action="{{ route('images.update', $image->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div>
                                        <img class="card-img-top img-fluid" src="{{ $image->image_path }}"
                                            alt="{{ $image->image_name }}" alt="Card image cap"
                                            style="height: 20rem" />
                                    </div>
                                    <div>
                                        <label for="file">Choose a new image :</label>
                                        <input type="file" name="image" id="file"
                                            class="image-preview-filepond">
                                    </div>
                                    <div>
                                        <label for="produk_name">Nama Produk: {{ $image->produk_name }}</label>
                                        <input class="form-control" type="text" name="produk_name" id="produk_name"
                                            placeholder="Masukan Nama Produk Baru" required></input>
                                    </div>
                                    <div>
                                        <label for="produk_name">Harga Produk: {{ $image->produk_price }}</label>
                                        <input class="form-control" type="text" name="produk_price" id="produk_price"
                                            placeholder="Masukan Harga Produk" required></input>
                                    </div>
                                    <div>
                                        <label for="description">Description:</label>
                                        <textarea name="description" id="description" rows="20" cols="61" class="form-control" required>{{ $image->description }}</textarea>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn-submit">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        @include('partials.footer')
    </div>


    <script src="{{ asset('assets/static/js/components/dark.js') }}"></script>
    <script src="{{ asset('assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

    <script src="{{ asset('assets/compiled/js/app.js') }}"></script>

    <script
        src="{{ asset('assets/extensions/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js') }}">
    </script>
    <script
        src="{{ asset('assets/extensions/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.min.js') }}">
    </script>
    <script src="{{ asset('assets/extensions/filepond-plugin-image-crop/filepond-plugin-image-crop.min.js') }}"></script>
    <script
        src="{{ asset('assets/extensions/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js') }}">
    </script>
    <script src="{{ asset('assets/extensions/filepond-plugin-image-filter/filepond-plugin-image-filter.min.js') }}">
    </script>
    <script src="{{ asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}">
    </script>
    <script src="{{ asset('assets/extensions/filepond-plugin-image-resize/filepond-plugin-image-resize.min.js') }}">
    </script>
    <script src="{{ asset('assets/extensions/filepond/filepond.js') }}"></script>
    <script src="{{ asset('assets/extensions/toastify-js/src/toastify.js') }}"></script>
    <script src="{{ asset('assets/static/js/pages/filepond.js') }}"></script>
</body>

</html>
