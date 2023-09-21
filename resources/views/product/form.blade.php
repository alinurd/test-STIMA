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
                            Update Data Product <span class="badge bg-warning text-dark">{{ $data->code }}</span>
                            @else
                            Create Data Product
                            @endif
                        </h5>


                        <!-- Custom Styled Validation -->

                        @if(isset($id))
                        <form class="row g-3 needs-validation" method="POST" action="{{ route('products.update', ['id' => $data->id]) }}">
                            @csrf
                            @else
                            <form class="row g-3 needs-validation" method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data" novalidate>

                                @csrf
                                @endif


                                <div class=" col-md-12">
                                    <label for="validationCustom01" class="form-label">Name Product</label>
                                    <input type="text" class="form-control" name="name" id="validationCustom01" value="{{$id !== null ? $data->name : '' }}" required>
                                    <div class=" valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">price</label>
                                    <input type="number" name="price" class="form-control" id="validationCustom01" value="{{$id !== null ? $data->price : '' }}" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Stok</label>
                                    <input type="number" name="stok" class="form-control" id="validationCustom01" value="{{$id !== null ? $data->stok : '' }}" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="row mb-6">

                                </div>

                                <div class="col-md-12">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                                    <div class="col-sm-10">
                                        <input class="form-control"  name="image" type="file" id="formFile">
                                        <br>
                                        @if ($id !== null && $data->img)
                                        <img src="{{ asset('storage/images/' . $data->img) }}" width="200px" alt="Product Image">
                                        @endif <div class="invalid-feedback">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="validationCustom05" class="form-label">description</label>
                                    <textarea class="form-control" name="desc" style="height: 100px">{{ $id !== null ? $data->desc : '' }}</textarea>
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