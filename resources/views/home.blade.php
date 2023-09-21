@extends('layouts.main')
@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url($role) }}"> {{$role }} Panel</a></li>
                <li class="breadcrumb-item"> {{$role }}</li>
                <li class="breadcrumb-item active">Home</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            @foreach ($products as $product)

            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset('storage/images/' . $product->img) }}" width="300px" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <span class="card-title">Rp. {{ $product->price }}</span>
                            <i class=" ">Stok: {{ $product->stok }}</i>
                            <p class="card-text"> {{ $product->desc }}</p>

                            <h5 class="card-title">
                                @if($role =="users")
                                <a class="nav-link collapsed" href="{{ route('order.create', ['id' => $product->id]) }}">
                                    <button type=" button" class="btn btn-primary"> <i class="bi bi-bag-plus"></i></i> Order</button>
                                </a>
                                @else
                                <a class=" btn btn-warning  text-dark" href="{{ route('products.edit', ['id' => $product->id]) }}">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                @endif
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

</main><!-- End #main -->
@endsection