@extends('layouts.app')

@section('title', 'Log in')

@section('content')
    <div class="card mx-auto grid max-w-4xl md:mt-4 md:grid-cols-2">
        {{-- Welcome panel (hidden on phones) --}}
        <div class="relative hidden overflow-hidden bg-lucky-point p-10 text-white md:block">
            <div class="absolute -top-20 -right-20 size-64 rounded-full bg-ship-cove/40"></div>
            <div class="absolute -bottom-24 -left-16 size-72 rounded-full bg-cornflower/15"></div>

            <div class="relative">
                <p class="text-xs font-semibold tracking-widest text-cornflower uppercase">Universidad de Dagupan</p>
                <h2 class="mt-3 text-3xl leading-tight font-bold">SITE<br>Student Manager</h2>
                <p class="mt-4 max-w-xs text-sm text-mystic">
                    Add, view, edit, and delete the students of the School of Information Technology Education.
                </p>
            </div>
        </div>

        {{-- Login form --}}
        <div>
            <div class="accent-bar md:hidden"></div>

            <div class="p-8 sm:p-10">
                <h1 class="text-2xl font-bold tracking-tight">Welcome back</h1>
                <p class="mt-1 text-sm text-lucky-point/70">Log in to manage SITE students.</p>

                <form method="POST" action="{{ route('login') }}" class="mt-8 space-y-5">
                    @csrf

                    <div>
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                               placeholder="you@example.com"
                               class="form-input @error('email') is-invalid @enderror" autofocus>
                        @error('email')
                            <p class="form-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password"
                               placeholder="••••••••"
                               class="form-input @error('password') is-invalid @enderror">
                        @error('password')
                            <p class="form-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-full">Log in</button>
                </form>
            </div>
        </div>
    </div>
@endsection
