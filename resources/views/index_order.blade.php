@extends('layouts.app')

@section('content')

<!-- Page Order -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="text-center fs-1 mb-3">{{ __('Orders') }}</div>
                <div class="card shadow" style="background-color: #F8F0E5">
                <div class="card-body m-auto">
                    @foreach ($orders as $order)
                    <div class="card mb-2 shadow" style="width: 30rem; background-color: #F8F0E5">
                        <div class="card-body">
                            <a href="{{ route('show_order', $order) }}">
                                <h5 class="card-title">Order ID {{ $order->id}}</h5>
                            </a>
                            <h6 class="card-subtitle mb-2 text-muted">By {{$order->user->name }}</h6>
                            @if ($order->is_paid == true)
                            <p class="card-text">Paid</p>
                            <form action="{{route('nota', $order->user_id) }}" method="get">
                                <a href="nota">
                                <button class="btn btn-success" type="submit">Struk</button></a>
                            </form>
                            @else
                            <p class="card-text">Unpaid</p>
                            @if ($order->payment_receipt)
                            <div class="d-flex flew-row justify-content-around">
                                @if (Auth::user()->is_admin)
                                <div class="d-flex flew-row justify-content-around">
                                    <a href="{{ url('storage/' . $order->payment_receipt) }} "class="btn btn-primary">Show payment receipt</a>
                                </div>
                                <form action="{{route('confirm_payment', $order) }}" method="post">
                                    @csrf
                                    <button class="btn btn-success" type="submit">Confirm</button>
                                </form>
                                @endif
                            </div>
                            @endif
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
