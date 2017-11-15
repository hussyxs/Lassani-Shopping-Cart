@extends('layouts.master')

@section('title')
Lassani Tandoori Shopping Cart
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ URL::to('css/index.css') }}">
@endsection

@section('shop-content')
<section id="shop">
    @if (Session::has('success'))
       <div class="alert alert-success">
            <h4 class="alert-heading">Processed and Payed</h4>
            <p>{{ Session::get('success') }}</p>
        </div>
    @endif
    <div class="col-2 categories">
        <ul class="cat_list">
            @foreach ($categories as $category)
                <li>
                    <a href="#Cat{{$category->id}}">
                        <h5>{{$category->name}}</h5>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="col-10 products">
    @foreach ($catprodtype as $cat_prods)
        <div id="Cat{{$cat_prods->id}}" class="prod_list">
            <a href="#Cat{{$cat_prods->id}}">
                <h4>{{$cat_prods->name}}</h4>
            </a>
            
            @foreach ($cat_prods->products as $product)
                <div class="product" id="{{$product->id}}">
                    <h5>{{$product->name}}</h5>
                    <p>{{$product->description}}</p>
                    @forelse ($product->types->chunk(6) as $types)
                        <div class="types" id="{{$product->name}}_types">
                            <ul>
                            @foreach ($types as $type)
                                <li>
                                    <h6>{{$type->type_name}}</h6>
                                    <div class="price">
                                       <span>
                                            <?php
                                            if (in_array($cat_prods->id, array(1, 2))) {
                                                $fullprice = $product->price;
                                            } else {
                                                $fullprice = number_format($product->price + $type->type_price,2);
                                            }
                                            ?>
                                            &#163;{{$fullprice}}
                                        </span>
                                        <a href="{{route('product.addToCart', ['id' => $product->id, 'id1' => $type->id])}}">
                                            <i class="fa fa-plus-square" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </li>
                            @endforeach
                            </ul>
                        </div>
                    @empty
                    <div class="price">
                        <span>&#163;{{$product->price}}</span>
                        <a href="{{route('product.addToCart', ['id' => $product->id])}}">
                            <i class="fa fa-plus-square" aria-hidden="true"></i>
                        </a>
                    </div> 
                    @endforelse
                </div>
            @endforeach
        </div>
    @endforeach    
    </div>
</section>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ URL::to('js/index.js')}}"></script>
@endsection
