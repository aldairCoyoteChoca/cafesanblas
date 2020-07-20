@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header"> {{ $product->name }} </div>
                <div class="card-body">
                    @if ($product->file)
                    <img src="{{ asset('/'.$product->file) }}" class="card-img-top">
                    @endif
                    <hr>
                    {{ $product->excerpt }}
                    <hr>
                    categorias: <a href=" {{ route('category', $product->category->slug) }} "> {{ $product->category->name }} </a>
                    <hr>   
                    {!! $product->description !!}
                    <hr>
                    Etiquetas:
                    @foreach ($product->tags as $tag)
                    <a href=" {{ route('tag', $tag->slug) }} ">{{ $tag->name }} </a>
                    @endforeach
                    @if ($product->stock === 0)
                    <button class="" type="submit" name="action">
                    Se termino :c
                    <i class="">add_shopping_cart</i>
                    </button>
                    @else
                    <form method="POST" action="{{ route('carrito.add', $product->id) }}">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <input type="hidden" name="quantify" value="1">
                        <input type="hidden" name="price" value="{{ $product->price }}">
                        <button class="add btn btn-sm btn-primary">
                        Agregar
                        <i class="">add_shopping_cart</i>
                        </button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection