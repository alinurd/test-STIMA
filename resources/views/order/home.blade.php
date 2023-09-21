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
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">{{ $role }}</li>
                <li class="breadcrumb-item active">Order</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->


    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        @if($role =="admin")
                        <h5 class="card-title">

                            <a href="{{url('admin/product/create')}}">
                                <button type="button" class="btn btn-primary"> <i class="bi bi-plus-circle"></i></i> Tambah Data</button>
                            </a>
                        </h5>
                        @else
                        <h5 class="card-title">
                            Data Orderan Saya <span class="badge bg-info text-dark"> {{ $name }}</span>
                        </h5>

                        @endif
                        @if (session('success'))

                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <!-- Table with stripped rows -->
                        <table class="table table-borderless datatable">
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