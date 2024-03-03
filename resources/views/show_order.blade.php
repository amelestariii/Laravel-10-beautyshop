@extends('layouts.app')

@section('content')

<!-- Menu detail order -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="text-center fs-1 mb-3">{{ __('Order Detail') }}</div>
                @php
                $total_price = 0;
                $total_discount = 0;
                $disc = 0;
                @endphp
                <div class="card shadow" style="background-color: #F8F0E5">
                <div class="card-body">
                    <h5 class="card-title">Order ID {{ $order->id }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">By {{ $order->user->name }}</h6>
                    @if ($order->is_paid == true)
                    <p class="card-text">Paid</p>
                    @else
                    <p class="card-text">Unpaid</p>
                    @endif
                    <hr>
                    @foreach ($order->transactions as $transaction)
                    <p>{{ $transaction->product->name }} - {{ $transaction->amount }} pcs</p>
                    @php
                    $total_price += $transaction->product->price * $transaction->amount;
                    @endphp
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
                $total_discount = $total_price - $discount;
                @endphp
                    @endforeach
                    <hr>
                    <p>Total Price: Rp{{ $total_price }}</p>
                    <p>Discount: {{ $disc }}</p>
                    <p>Total Payment: Rp{{ $total_discount }}</p>
                    <hr>
                    @if ($order->is_paid == false && $order->payment_receipt == null && !Auth::user()->is_admin)
                    <form action="{{ route('submit_payment_receipt', $order) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Upload your payment receipt</label>
                            <input type="file" name="payment_receipt" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Submit payment</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection