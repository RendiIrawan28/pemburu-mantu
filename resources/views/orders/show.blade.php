<!DOCTYPE html>
<html>

<head>
    <title>Pesanan saya</title>

    <link rel="stylesheet" href="./assets/compiled/css/app.css" />
    <link rel="stylesheet" href="./assets/compiled/css/app-dark.css" />
</head>

<body>
    <script src="assets/static/js/initTheme.js"></script>
    <div id="app">
        @include('partials.sidebar')
        <div id="main">
            @include('partials.topbar')
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>pesanan saya</h3>
                        </div>
                    </div>
                </div>

                <section id="content-types">
                    @if ($orders->isEmpty())
                        <p>No orders available.</p>
                    @else
                        <div class="col-md-6 col-sm-12">
                            @foreach ($orders as $order)
                                <div class="card">
                                    <div class="card-content">
                                        <img class="card-img-top img-fluid" src="{{ $order->image->image_path }}"
                                            alt="{{ $order->image->image_name }}" alt="Card image cap"
                                            style="height: 20rem" />
                                        <div class="card-body">
                                            <h4 class="card-title"> {{ $order->image->produk_name }}</h4>
                                            <h4 class="card-title"> IDR {{ $order->image->produk_price }}</h4>
                                            <p><strong>Name:</strong> {{ $order->customer_name }}</p>
                                            <p><strong>Email:</strong> {{ $order->customer_email }}</p>
                                            <p><strong>Phone:</strong> {{ $order->customer_phone }}</p>
                                            <p><strong>Alamat:</strong> {{ $order->alamat }}</p>
                                            <p><strong>Status:</strong> {{ $order->status }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </section>
            </div>
        </div>
        @include('partials.footer')
    </div>
    </div>
    <script src="assets/static/js/components/dark.js"></script>
    <script src="assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>

    <script src="assets/compiled/js/app.js"></script>

</body>

</html>
