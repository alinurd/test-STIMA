@extends('layouts.main')
@section('content')


<main id="main" class="main">
    <?php
    $id = $id ?? null;
    // dd($data->['name']);
    ?>
    <div class="pagetitle">
        <h1>Data Product</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
                <li class="breadcrumb-item">Product</li>
                <li class="breadcrumb-item active"> @if(isset($id)) Update @else Create @endif
                </li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            @if(isset($id) && !empty($data))
                            Order Product <span class="badge bg-warning text-dark">{{ $data->code }}</span>
                            @endif
                        </h5>


                        <!-- Custom Styled Validation -->

                        <form class="row g-3 needs-validation" method="POST" action="{{ route('order.store') }}" enctype="multipart/form-data" novalidate>
                            @csrf
                            @if(isset($id))
                            <!-- <form class="row g-3 needs-validation" method="POST" action="{{ route('products.update', ['id' => $data->id]) }}">
                            @csrf
                            @else
                            
                            @endif -->
                            <input type="hidden" class="form-control" name="product_id" value="{{ $data->id }}">
                            <input type="hidden" class="form-control" name="price" value="{{ $data->price }}">
                            <div class="card">
                                <img src="{{ asset('storage/images/' . $data->img) }}" width="50%" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $data->name }}</h5>
                                    <span class="card-text">Harga: <span class="badge bg-warning text-dark">Rp. {{ number_format($data->price, 0, ',', '.') }}</span>
                                        <p class="card-text">Stok: <span class="badge bg-primary text-dark"> {{ $data->stok }}</span></p>
                                        <p class="card-text">{{ $data->desc }}</p>
                                    </span>
                                </div>
                            </div>

                            <div class=" col-md-12">
                                <label for="validationCustom01" class="form-label">Masukan jumlah Order</label>
                                <input type="number" class="form-control" name="qty" id="qty" value="" required data-price="{{ $data->price }}" data-product-id="{{ $data->id }}" oninput="calculateTotal()">
                                <div class=" valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class=" col-md-12">
                                <label for="validationCustom01" class="form-label">Total Bayar</label>
                                <input type="number" class="form-control" name="total" id="total" value=" " readonly>

                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Submit</button>
                                <button class="btn btn-danger" type="reset">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->
<script>
    $(document).ready(function() {
        calculateTotal();
    });


    function calculateTotal() {
        // setup data calculate
        var qty = parseFloat(document.getElementById('qty').value);
        var price = parseFloat(document.getElementById('qty').getAttribute('data-price'));


        if (!isNaN(qty) && !isNaN(price)) {

            var total = qty * price;

            // tambahkan total nya  inpitan
            document.getElementById('total').value = total.toFixed(2);
        } else {

            document.getElementById('total').value = "0";
        }
    }
</script>
@endsection