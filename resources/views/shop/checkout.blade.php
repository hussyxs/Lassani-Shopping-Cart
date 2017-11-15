@extends('layouts.master')

@section('title')
    Lassani Tandoori Shopping Cart
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ URL::to('css/checkout.css') }}">
@endsection

@section('checkout-content')
   @if (Session::has('error'))
       <div class="alert alert-warning">
            <p>{{ Session::get('error') }}</p>
        </div>
    @endif
    <div class="card border-primary">
        <h4 class="card-header">Payment Details<img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png"></h4> 
        <div class="card-body">
            <form action="{{ route('checkout') }}" method="post" id="payment-form">
                <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nameOnCard" class="sr-only">Name on Card</label>
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon">
                            <i class="fa fa-id-card-o" aria-hidden="true"></i>
                        </div>
                        <input type="text" class="form-control" name="nameOnCard" id="nameOnCard" aria-describedby="nameOnCardHelp" placeholder="Name On Card" required autofocus />
                    </div>
                    <small id="nameOnCardHelp" class="form-text text-muted">
                        Your Name exactly how it is printed on your Card.
                    </small>
                </div>
                <div class="form-group col-md-6">
                    <label for="telNum" class="sr-only">Mobile Number</label>
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon">
                            <i class="fa fa-id-card-o" aria-hidden="true"></i>
                        </div>
                        <input type="tel" class="form-control" name="telNum" id="telNum" aria-describedby="telNumHelp" placeholder="Mobile Number" />
                    </div>
                    <small id="telNumHelp" class="form-text text-muted">
                        Your active Mobile number.
                    </small>
                </div>
                </div>
                <div class="form-group">
                    <label for="address" class="sr-only">Address</label>
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                        </div>
                        <input type="text" class="form-control" name="address" id="address" aria-describedby="addressHelp" placeholder="Address" required />
                    </div>
                    <small id="addressHelp" class="form-text text-muted">
                        Your Address, where you live.
                    </small>
                </div>
                <div class="form-group">
                    <label for="card-element" class="sr-only">Credit or debit card</label>
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                       <div class="input-group-addon">
                            <i class="fa fa-credit-card" aria-hidden="true"></i>
                        </div>
                        <div id="card-element" aria-describedby="cardNumberHelp" placeholder="Valid Card number" required></div>
                    </div>
                    <small id="cardNumberHelp" class="form-text text-muted">
                            The 16-digit number on the Front of you Card.
                    </small>
                </div>
                {{ csrf_field() }}
                <button type="submit" class="btn btn-block btn-primary">Pay &#163;{{ $total }} Now</button>
                <!-- Used to display form errors -->
                <div id="card-errors" role="alert alert-danger"></div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript" src="{{ URL::to('js/checkout.js')}}"></script>
@endsection