@extends('layouts.main')
@section('content')

@if (auth()->user()->role == 0)
<?php
$role = 'users';
$name =  auth()->user()->name; ?>
@else
<?php
$role = 'admin';
$name = 'All Users';
$hide = 'hide' ?>

@endif
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Orders </h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url($role) }}"> {{$role }} Panel</a></li>
                <li class="breadcrumb-item">{{ $role }}</li>
                <li class="breadcrumb-item active">Order</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->


    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-title p-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5>
                                @if($role =="admin")
                                <a href="{{url('admin/product/create')}}" class="btn btn-primary">
                                    <i class="bi bi-plus-circle"></i> Tambah Data
                                </a>
                                @else
                                Data Orderan Saya <span class="badge bg-info text-dark">{{ $name }}</span>
                                @endif
                            </h5>

                            <div class="ml-auto">
                                <a id="export" href="{{ route('export.data') }}" class="btn btn-primary">
                                    <i class="bi bi-file-earmark-excel"></i> Export to Excel
                                </a>
                                <a id="export" href="{{ route('export.export_pdf') }}" class="btn btn-info">
                                    <i class="bi bi-file-earmark-pdf"></i> Export to pdf
                                </a>
                            </div>
                        </div>
                    </div>

                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <!-- Rest of your table code remains the same -->

                    <!-- Table with stripped rows -->

                    <table class="table table-border datatable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Id </th>
                                <th scope="col">User</th>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Total</th>
                                <th scope="col">Created</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1; ?>
                            @foreach ($orders as $order)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <th scope="row">#{{ $order->code_id }} - {{ $order->id }}</th>
                                <td>{{ $order->userName }}</td>
                                <td>{{ $order->productName }}</td>
                                <td>{{ number_format($order->price, 0, ',', '.') }}</td>
                                <td>{{ $order->qty }}</td>
                                <td>{{ number_format($order->total, 0, ',', '.') }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td><span class="badge bg-success">Proses</span></td>
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