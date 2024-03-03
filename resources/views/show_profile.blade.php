@extends('layouts.app')

@section('content')

<!-- Menu Profil -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="text-center fs-1 mb-3">{{ __('Profile') }}</div>
                <div class="card shadow" style="background-color: #F8F0E5">
                <div class="card-body">
                    @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                    @endforeach
                    @endif
                    <form action="{{ route('edit_profile') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" placeholder="Name" class="form-control" value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" value="{{$user->email }}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <input type="role" class="form-control" value="{{ $user->is_admin ? 'Admin' : 'Member' }}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Confirm password</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>
                        <div class="d-flex align-items-center justify-content-center">
                            <button type="submit" class="btn btn-primary mt-3">Change profile details</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
