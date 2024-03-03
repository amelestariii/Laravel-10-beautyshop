@extends('layouts.app')

@section('content')
        <!-- Menu Produk -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @if (Auth::check() && Auth::user()->is_admin)
                        {{-- <div class="card" style="background-color: #F8F0E5"> --}}
                            <div class="text-center fs-1 mb-3">{{ __('Products') }}
                    @endif
                                @if (Auth::check() && Auth::user()->is_admin)
                                <div>
                                    <form action="{{ route('create_product') }}" method="get">
                                        @csrf
                                        <button type="submit" class="btn btn-success mt-2">Add product</button>
                                    </form> 
                                </div>
                                @endif
                            </div>
                            @if (Auth::check() && Auth::user()->is_admin == 0)
                                <h1 class="text-center font-weight-bold">Our Products</h1>
                            @endif
                            <div class="card-group my-10">
                                @foreach ($products as $product)
                                <div class="row justify-content-center">
                                    <div class="card m-3 shadow" style="width: 13rem; background-color: #F8F0E5">
                                        <img class="card-img-top" src="{{ url('storage/' . $product->image) }}" alt="Card image cap">
                                        <div class="card-body">
                                            <p class="card-text">{{ $product->name }}</p>
                                            <p class="card-text">Rp{{ $product->price }}</p>
                                            <form action="{{ route('show_product', $product) }}" method="get" class="d-flex align-items-center justify-content-center">
                                                <button type="submit" class="btn btn-primary"  style="width: 100px; height: 30px; font-size: 13px;">Show detail</button>
                                            </form>
                                            @if (Auth::check() && Auth::user()->is_admin)
                                            <form action="{{ route('delete_product', $product) }}" method="post" class="d-flex align-items-center justify-content-center">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger mt-2"  style="width: 100px; height: 30px; font-size: 11px;">Delete product</button>
                                            </form>
                                            @endif
                                        </div>
                                    </div>  
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
 

@endsection
