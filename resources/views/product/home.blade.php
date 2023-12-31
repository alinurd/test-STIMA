@extends('layouts.main')
@section('content')


<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Product</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url($role) }}"> {{$role }} Panel</a></li>
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
                                <button type="button" class="btn btn-primary"> <i class="bi bi-plus-circle"></i></i> Tambah Data</button>
                            </a>
                        </h5>
                        @if (session('success'))

                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
                                    <th scope="col">IDR</th>
                                    <th scope="col">Images</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1; ?>
                                @foreach ($products as $product)
                                <tr>
                                    <th scope="row"> {{ $no++ }}</th>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->code }}</td>
                                    <td>{{ $product->stok }}</td>
                                    <td>{{ number_format($product->price, 0, ',', '.') }}</td>

                                    <td>
                                        <img id="openLightbox" src="{{ asset('storage/images/' . $product->img) }}" width="100px" alt="gambar {{ $product->name }} tidak bisa ditampilkan">

                                    </td>

                                    <td>{{ $product->created_at }}</td>
                                    <td>
                                        <a class="nav-link collapsed text-danger" onclick="return confirm('yakin Hapus Product ini?') ?  submit() : false" href="{{ route('products.delete', ['id' => $product->id]) }}">
                                            <i class="bi bi-trash"></i></i>

                                        </a>

                                        <a class="nav-link collapsed text-warning" href="{{ route('products.edit', ['id' => $product->id]) }}">
                                            <i class="bi bi-pencil-square"></i>
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