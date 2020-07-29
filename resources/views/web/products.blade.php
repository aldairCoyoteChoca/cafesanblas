@extends('layouts.app')

@section('content')
@foreach ($products as $product)
<section class="page-section">
    <div class="container">
        <div class="product-item">
            <div class="product-item-title d-flex">
                <div class="bg-faded p-5 d-flex ml-auto rounded">
                    <h2 class="section-heading mb-0">
                    <span class="section-heading-upper">{{ $product->excerpt }}</span>
                    <span class="section-heading-lower">{{ $product->name }}</span>
                    </h2>
                    <h3 class="text-center"> ${{ $product->price }}.00 </h3>
                </div>
            </div>
            @if ($product->file)
            <img src="{{ asset('/'.$product->file) }}" class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0">
            @endif
            <div class="product-item-description d-flex mr-auto">
                <div class="bg-faded p-5 rounded">
                    <p class="mb-0"> {!! $product->description !!} </p>
                    @can('products.edit')
                    <a class="btn btn-sm btn-success float-left" href=" {{ route('products.edit', $product->id) }}">Editar</a>
                    @endcan
                    @if ($product->stock >= 1)
                    @isset(Auth::user()->name)
                    <form method="POST" action="{{ route('carrito.add', $product->id) }}">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <input type="hidden" name="quantify" value="1">
                        <input type="hidden" name="price" value="{{ $product->price }}">
                        <button class="add btn btn-sm btn-primary">
                            Agregar al carrito 
                            <i class="fas fa-cart-arrow-down"></i>
                        </button>
                    </form>
                    @else
                    <form action="{{ route('login') }}">
                        <button class="btn btn-sm btn-primary">
                            <i class="fas fa-cart-arrow-down"></i>
                            Agregar al carrito
                        </button>
                    </form>
                    @endisset
                    @else
                    <button class="btn btn-sm btn-primary" disabled>
                        <i class="fas fa-cart-arrow-down"></i>
                        Producto agotado
                    </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endforeach
<div class="container d-flex p-2">
    <div class="mx-auto">
        {{ $products->render() }}
    </div>
</div>

@endsection