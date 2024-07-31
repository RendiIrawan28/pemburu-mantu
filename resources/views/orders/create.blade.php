<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pesan WO</title>

    @include('partials.header')
</head>

<body>
    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif
    <script src="{{ asset('assets/static/js/initTheme.js') }}"></script>
    <div id="app">
        @include('partials.sidebar')
        <div id="main">
            @include('partials.topbar')
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Input data diri</h3>
                        </div>
                    </div>
                </div>
                <!-- Basic card section start -->
                <section id="content-types">
                    <div class="col-md-6 col-sm-12">
                        <div class="card">
                            <div class="card-content">
                                @if ($errors->any())
                                    <div>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form action="{{ route('orders.store') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="image_id" value="{{ $image->id }}">
                                    <div>
                                        <img class="card-img-top img-fluid" src="{{ $image->image_path }}"
                                            alt="{{ $image->image_name }}" alt="Card image cap" style="height: 20rem" />
                                        <h4 class="card-title"> {{ $image->produk_name }}</h4>
                                        <h4 class="card-title"> {{ $image->produk_price }}</h4>
                                        <p>{{ $image->description }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="customer_name">Name:</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" name="customer_name" id="customer_name"
                                            class="form-control" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="customer_email">Email:</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="email" name="customer_email" id="customer_email"
                                            class="form-control" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="customer_phone">Phone:</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" name="customer_phone" id="customer_phone"
                                            class="form-control" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="alamat">Alamat</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" name="alamat" id="alamat" class="form-control"
                                            required>
                                    </div>
                                    <div>
                                        <button type="submit">Place Order</button>
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
    </div>
    <script src="{{ asset('assets/static/js/components/dark.js') }}"></script>
    <script src="{{ asset('assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

    <script src="{{ asset('assets/compiled/js/app.js') }}"></script>

</body>

</html>
