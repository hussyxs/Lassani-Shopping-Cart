@extends('layouts.master')

@section('profile-content')
    <div class="card border-info">
        <h4 class="card-header">User Profile</h4> 
        <div class="card-body">
            <h5 class="card-title">Orders</h5>
            @foreach($orders as $order)
                <ul class="list-group list-group-flush">
                    @foreach($order->cart->items as $item)
                    <li class="list-group-item">
                        <h6 class="card-title">{{ $item['item']->name }}</h6>
                        <span class="badge badge-pill badge-secondary">{{ $item['qty']}}</span> Units
                        <span class="badge badge-warning pull-right">&#163;{{ $item['price'] }}</span>
                    </li>
                    @endforeach
                    <li class="list-group-item"><h5 class="card-subtitle mb-2 text-muted pull-right">Total Price: &#163;<strong>{{ $order->cart->totalPrice }}</strong></h5></li>
                </ul>
            @endforeach
        </div>
    </div>

@endsection