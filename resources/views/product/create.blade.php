@extends('layouts.main')
@section('content')


<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Product</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
                <li class="breadcrumb-item">Product</li>
                <li class="breadcrumb-item active">create</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Input Data Product</h5>

                        <!-- Custom Styled Validation -->

                        <form class="row g-3 needs-validation" method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data"  novalidate>
                            @csrf
                            <div class=" col-md-12">
                                <label for="validationCustom01" class="form-label">Name Product</label>
                                <input type="text" class="form-control" name="name" id="validationCustom01" value="" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">price</label>
                                <input type="number" name="price" class="form-control" id="validationCustom01" value="John" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">Stok</label>
                                <input type="number" name="stok" class="form-control" id="validationCustom01" value="John" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="row mb-6">

                            </div>

                            <div class="col-md-12">
                                <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="image" type="file" id="formFile" required>
                                    <div class="invalid-feedback">

                                    </div>
                                </div>

                            </div>
                            <div class="col-md-12">
                                <label for="validationCustom05" class="form-label">description</label>
                                <textarea class="form-control" name="desc" style="height: 100px"></textarea>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Submit</button>
                                <button class="btn btn-danger" type="reset">Reset</button>
                            </div>
                        </form><!-- End Custom Styled Validation -->

                    </div>
                </div>

            </div>

        </div>
    </section>

</main><!-- End #main -->


@endsection