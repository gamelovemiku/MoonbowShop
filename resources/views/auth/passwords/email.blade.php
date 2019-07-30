@extends('layouts.app')

@section('content')
<section class="section">
    <div class="container">
        <div class="columns">
            <div class="column is-half is-offset-one-quarter">
                <h1 class="title is-size-1 force-bold">Reset Password</h1>
                <p class="subtitle">Recovery your game account<b class="force-bold"></b></p>

                <div class="box">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="field">
                            <label for="email">{{ __('E-Mail Address') }}</label>

                            <div class="control">
                                <input id="email" type="email" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="buttons">
                            <button type="submit" class="button is-black">
                                {{ __('Send Password Reset Link') }}
                            </button>
                            <button type="reset" class="button">
                                Clear
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
