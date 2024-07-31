<!DOCTYPE html>
<html>

<head>
    <title>Image Gallery</title>

    <link rel="stylesheet" href="./assets/compiled/css/app.css" />
    <link rel="stylesheet" href="./assets/compiled/css/app-dark.css" />
</head>

<body>
    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif
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
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Data paket wedding</h3>
                        </div>
                    </div>
                </div>
                <!-- Basic card section start -->
                <section id="content-types">
                    <div class="row">
                        @if ($images->isEmpty())
                            <p>No images available.</p>
                        @else
                            @foreach ($images as $image)
                                <div class="col-md-6 col-sm-12 mb-4">
                                    <div class="card">
                                        <div class="card-content">
                                            <img class="card-img-top img-fluid" src="{{ $image->image_path }}"
                                                alt="{{ $image->image_name }}" style="height: 20rem" />
                                            <div class="card-body">
                                                <h4 class="card-title">
                                                    {{ $image->produk_name }}
                                                </h4>
                                                <h4 class="card-title">
                                                    IDR {{ $image->produk_price }}
                                                </h4>
                                                <p class="card-text">
                                                    {{ $image->description }}
                                                </p>
                                                <a href="{{ route('images.edit', $image->id) }}">Edit</a>
                                                <form action="{{ route('images.destroy', $image->id) }}" method="POST"
                                                    style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        onclick="return confirm('Are you sure?')">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </section>
            </div>
            <!-- Basic Card types section end -->

        </div>
        @include('partials.footer')
    </div>
    <script src="assets/static/js/components/dark.js"></script>
    <script src="assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>

    <script src="assets/compiled/js/app.js"></script>

</body>

</html>
