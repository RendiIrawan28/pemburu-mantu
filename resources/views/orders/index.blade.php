<!DOCTYPE html>
<html>

<head>
    <title>Pesanan masuk</title>
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
                            <h3>pesanan masuk</h3>
                        </div>
                    </div>
                </div>
                <!-- Basic card section start -->
                <section id="content-types">
                    @if ($orders->isEmpty())
                        <p>No orders available.</p>
                    @else
                        <div class="container">
                            <div class="row">
                                @foreach ($orders as $order)
                                    <div class="col-md-6 col-lg-6 mb-4">
                                        <div class="card">
                                            <div class="card-content">
                                                <img class="card-img-top img-fluid" src="{{ $order->image->image_path }}"
                                                    alt="{{ $order->image->image_name }}" style="height: 20rem" />
                                                <div class="card-body">
                                                    <h4 class="card-title">{{ $order->image->produk_name }}</h4>
                                                    <h4 class="card-title">{{ $order->image->produk_price }}</h4>
                                                    <p><strong>Name:</strong> {{ $order->customer_name }}</p>
                                                    <p><strong>Email:</strong> {{ $order->customer_email }}</p>
                                                    <p><strong>Phone:</strong> {{ $order->customer_phone }}</p>
                                                    <p><strong>Alamat:</strong> {{ $order->alamat }}</p>
                                                    <p><strong>Status:</strong> {{ $order->status }}</p>
                                                    <form action="{{ route('orders.updateStatus', $order->id) }}" method="post" style="display: inline;">
                                                        @csrf
                                                        <select name="status" onchange="this.form.submit()">
                                                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                            <option value="paid" {{ $order->status == 'paid' ? 'selected' : '' }}>Paid</option>
                                                            <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                                                            <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                                            <option value="canceled" {{ $order->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
                                                        </select>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
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
