@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
                <div class="text-center fs-1 mb-3">{{ __('Cart') }}</div>
                <div class="card">
                <div class="card-body ">
                    @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                    @endforeach
                    @endif
                    @php
                    $total_price = 0;
                    $total_payment = 0;
                    $disc = 0;
                    @endphp
                    <div class="card-group m-auto">
                        @foreach ($carts as $cart)
                        <div class="card m-3" style="width: 14rem;">
                        <img class="card-img-top" src="{{ url('storage/' . $cart->product->image) }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $cart->product->name }}</h5>
                            <form action="{{ route('update_cart', $cart) }}" method="post">
                                @method('patch')
                                @csrf
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control" aria-describedby="basic-addon2" name="amount" value={{ $cart->amount }}>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="submit">Update amount</button>
                                    </div>
                                </div>
                            </form>
                            <form action="{{ route('delete_cart', $cart) 
                        }}" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
            @php
            $total_price += $cart->product->price * $cart->amount;
            @endphp
            @if ($total_price >=200000)
                @php
                    $discount = 0.1 * $total_price;
                    $disc = '10%';
                @endphp
            @else
                @php
                    $discount = 0;
                    $disc = '0';
                @endphp
            @endif
            @php
            $total_payment = $total_price - $discount;
            @endphp
            @endforeach
        </div>
        <div class="d-flex flex-column justify-content-end align-items-end">
            <p>Total Price: Rp{{ $total_price }}</p>
            <p>Discount: {{ $disc }}</p>
            <p>Total Payment: Rp{{ $total_discount }}</p>
            <form action="{{ route('checkout') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-primary"
                @if ($carts->isEmpty()) disabled
                @endif>Checkout</button>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</div> --}}

<!-- Menu keranjang -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center fs-1 mb-3">{{ __('Cart') }}</div>
            <div class="card shadow" style="background-color: #F8F0E5">
                <div class="card-body">
                    @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                    @endforeach
                    @endif
                    @php
                    $total_price = 0;
                    $total_payment = 0;
                    $disc = 0;
                    @endphp
                    @foreach ($carts as $cart)
                    <div class="card mb-3 shadow" style="background-color: #F8F0E5">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="{{ url('storage/' . $cart->product->image) }}" class="card-img" alt="Product Image">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $cart->product->name }}</h5>
                                    <p class="card-text">Amount: {{ $cart->amount }}</p>
                                    <form action="{{ route('update_cart', $cart) }}" method="post">
                                        @method('patch')
                                        @csrf
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" aria-describedby="basic-addon2" name="amount" value={{ $cart->amount }}>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="submit">Update amount</button>
                                            </div>
                                        </div>
                                    </form>
                                    <form action="{{ route('delete_cart', $cart) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php
                    $total_price += $cart->product->price * $cart->amount;
                    @endphp
                    @endforeach
                    @if ($total_price >= 200000)
                    @php
                    $discount = 0.1 * $total_price;
                    $disc = '10%';
                    @endphp
                    @else
                    @php
                    $discount = 0;
                    $disc = '0';
                    @endphp
                    @endif
                    @php
                    $total_payment = $total_price - $discount;
                    @endphp
                    <div class="d-flex flex-column justify-content-end align-items-end">
                        <p>Total Price: Rp{{ $total_price }}</p>
                        <p>Discount: {{ $disc }}</p>
                        <p>Total Payment: Rp{{ $total_payment }}</p>
                        <form action="{{ route('checkout') }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-primary" @if ($carts->isEmpty()) disabled @endif>Checkout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection