@extends('layouts.main')
@section('content')


<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Product</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Admin</li>
                <li class="breadcrumb-item active">Product</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->


    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a class="nav-link collapsed" href="{{url('admin/product/create')}}">
                                <button type="button" class="btn btn-dark"> <i class="bi bi-plus-circle-fill"></i></i></button>
                            </a>
                        </h5>
                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Code</th>
                                    <th scope="col">Stok</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <th scope="row">1</th>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->code }}</td>
                                    <td>{{ $product->stok }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->created_at }}</td>
                                    <td>
                                        <a class="nav-link collapsed text-danger" href="{{url('admin/product/destroy')}}">
                                            <i class="bi bi-trash"></i></i>

                                        </a> |
                                        <a class="nav-link collapsed text-warning" href="{{url('admin/product/update')}}">
                                            <i class="bi bi-pencil-square"></i></i>

                                        </a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->


@endsection