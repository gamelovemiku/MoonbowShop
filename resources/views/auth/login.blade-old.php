@extends('layouts.app')

@section('content')
<section class="section" style="margin-bottom: 3em; margin-top: 4em;">
    <div class="container">
        <div class="columns">
            <div class="column is-half is-offset-one-quarter">
                <div class="box">
                    <div class="tabs-wrapper">
                        <div class="tabs">
                            <ul>
                                <li class="is-active">
                                    <a>
                                        <span class="icon is-small"><i class="fas fa-sign-in-alt"></i></span>
                                        <span>Login</span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="icon is-small"><i class="fas fa-user-plus"></i></span>
                                        <span>Register</span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="icon is-small"><i class="fas fa-hourglass-half"></i></span>
                                        <span>Forgot Password</span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="tabs-content">
                            <ul>
                                <li class="is-active">
                                    <div class="field">
                                        <h4 class="title is-size-4 has-text-weight-bold">Sign in</h4>
                                        <p class="subtitle is-size-7">Tell me where you are!</p>
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
                                                    <a class="button is-text is-small" href="{{ route('password.request') }}">
                                                        {{ __('Forgot Your Password?') }}
                                                    </a>
                                                @endif
                                            </div>
                                        </form>
                                    </div>
                                </li>
                                <li>
                                    <div class="field">
                                        <h4 class="title is-size-4 has-text-weight-bold">Register</h4>
                                        <p class="subtitle is-size-7">A few step to get access to store</p>
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf

                                            <div class="field">
                                                <label for="name" class="label">Username</label>

                                                <div class="control">
                                                    <input id="name" type="text" class="input @error('name') is-danger @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="field">
                                                <label for="email" class="label">{{ __('E-Mail Address') }}</label>

                                                <div class="control">
                                                    <input id="email" type="email" class="input @error('email') is-danger @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="field">
                                                <label for="password" class="label">{{ __('Password') }}</label>

                                                <div class="control">
                                                    <input id="password" type="password" class="input @error('password') is-danger @enderror" name="password" required autocomplete="new-password">

                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="field">
                                                <label for="password-confirm" class="label">{{ __('Confirm Password') }}</label>

                                                <div class="control">
                                                    <input id="password-confirm" type="password" class="input" name="password_confirmation" required autocomplete="new-password">
                                                </div>
                                            </div>

                                            <div class="field">
                                                <div class="control">
                                                    <button type="submit" class="button is-black">
                                                        {{ __('Register') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
