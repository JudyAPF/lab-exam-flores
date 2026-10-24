@extends('layouts.app')

@section('title', 'Log in')

@section('content')
    <div class="card card-narrow">
        <h1>Welcome back</h1>
        <p class="muted">Log in to manage SITE students.</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                       class="@error('email') is-invalid @enderror" autofocus>
                @error('email')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password"
                       class="@error('password') is-invalid @enderror">
                @error('password')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary btn-block">Log in</button>
        </form>
    </div>
@endsection
