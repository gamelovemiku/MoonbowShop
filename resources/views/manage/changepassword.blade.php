@extends('manage.managecenter')

@section('content')

<nav class="breadcrumb is-small" aria-label="breadcrumbs">
    <ul>
        <li><a href="/manage">{{ Auth::user()->name }}</a></li>
        <li><a href="/manage/profile">Profile</a></li>
        <li class="is-active"><a href="/manage/changepassword" aria-current="page">Change Password</a></li>
    </ul>
</nav>

<h4 class="title is-size-4 force-bold">Change Password</h4>
<p class="subtitle is-size-6">Reset your password<b class="force-bold"></b></p>
<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="field">
        <div class="columns">
            <div class="column is-6" style="height: 100%">
                <div class="field">
                    <label for="password" class="label">New Password</label>

                    <div class="control">
                        <input id="password" type="password" class="input @error('password') is-danger @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="field">
                    <label for="password" class="label">Confirm New Password</label>

                    <div class="control">
                        <input id="password" type="password" class="input @error('password') is-danger @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="buttons">
                    <button type="submit" class="button is-black">
                        Change Password
                    </button>
                </div>
            </div>
            <div class="column is-6">
                <div class="notification">
                    <button class="delete"></button>
                    Lorem ipsum dolor sit amet, consectetur
                    adipiscing elit lorem ipsum dolor. <strong>Pellentesque risus mi</strong>, tempus quis placerat ut, porta nec nulla. Vestibulum rhoncus ac ex sit amet fringilla. Nullam gravida purus diam, et dictum <a>felis venenatis</a> efficitur. Sit amet,
                    consectetur adipiscing elit
                </div>
            </div>
        </div>
    </div>
</form>
@endsection