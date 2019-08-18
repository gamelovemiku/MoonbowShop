@extends('layouts.app')

@section('content')
<section class="section">
    <div class="container">
        <div class="columns">
            <div class="column is-half is-offset-one-quarter">
                <h1 class="title is-size-1 force-bold">Login</h1>
                <p class="subtitle">Required ingame joined.<b class="force-bold"></b></p>
                <div class="notification">
                    <u>For new player</u>, You need to joined into the server at least one time and then using command <strong>/webshop getaccess [Password]</strong> to get access to use webshop.
                </div>
                <div class="box">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="field">
                            <label for="email" class="label">{{ __('E-Mail Address') }}</label>

                            <div class="control">
                                <input id="email" type="email" class="input @error('email') is-danger @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <p class="help is-danger">{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="field">
                            <label for="password" class="label">{{ __('Password') }}</label>

                            <div class="control">
                                <input id="password" type="password" class="input @error('password') is-danger @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <p class="help is-danger">{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="field">
                            <div class="control">
                                <div class="b-checkbox is-warning">
                                    
                                </div>
                                <input class="checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>

                        <div class="buttons">
                            <button type="submit" class="button is-black">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="button is-text" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
