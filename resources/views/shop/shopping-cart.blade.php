@extends('layouts.master')

@section('title')
    Lassani Tandoori Shopping Cart
@endsection

@section('shopping-cart-content')

    @if(Session::has('cart'))
        <div class="card border-warning">
            <h4 class="card-header">Your Shopping Cart</h4>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                @foreach($products as $product)
                    <li class="list-group-item">
                        <h6 class="card-title">
                        {{$product['item']->name}}
                        </h6>
                        <a href="{{ route('product.reduceByOne', ['id' => $product['item']->id]) }}" class="badge badge-danger">
                            <i class="fa fa-minus-square" aria-hidden="true"></i>
                        </a>
                        <span class="badge badge-pill badge-secondary">{{ $product['qty'] }} </span>
                        <a href="{{ route('product.increaseByOne', ['id' => $product['item']->id]) }}" class="badge badge-success">
                            <i class="fa fa-plus-square" aria-hidden="true"></i>
                        </a>
                        <h6><a href="{{ route('product.removeItem', ['id' => $product['item']->id])  }}" class="btn btn-outline-danger btn-sm">Remove</a></h6>
                        <span class="badge badge-warning pull-right">&#163;{{ $product['price'] }}</span>
                    </li>
                @endforeach    
                </ul>
            </div>
            <div class="card-body">
                <h5 class="card-subtitle mb-2 text-muted pull-right">Total Price: &#163;<strong>{{ $totalPrice }}</strong></h5>
            </div>
            <a href="{{ route('checkout') }}" class="btn btn-block btn-primary">Checkout</a>
        </div>
    @else
        <div class="card border-info text-center">
            <h4 class="card-header">Your Shopping Cart is EMPTY.</h4>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <h4 class="card-title"> No Items, add some <a href="{{ route('product.index') }}">here</a></h4>
                    </li>
                </ul>
            </div>
        </div>
    @endif

@endsection