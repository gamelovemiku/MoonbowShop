@extends('manage.admin.controlpanel')

@section('content')

<nav class="breadcrumb is-small" aria-label="breadcrumbs">
    <ul>
        <li><a href="{{ route('profile.index') }}">{{ Auth::user()->name }}</a></li>
        <li><a href="{{ route('admin.controlpanel') }}">Admin</a></li>
        <li><a href="{{ route('paymentplan.index') }}">PaymentPlan</a></li>
        <li class="is-active"><a href="{{ route('item.index') }}" aria-current="page">Item</a></li>
    </ul>
</nav>

<h4 class="title is-size-4 force-bold">Edit payment plan</h4>
<p class="subtitle is-size-6">Add more item to your itemshop<b class="force-bold"></b></p>
<div class="field">
        <form action="{{ route('paymentplan.update', [$plan->plan_id]) }}" method="POST">
            @method('put')
            @csrf

            <div class="columns">
                <div class="column is-6">
                    <div class="field">
                        <label class="label">Payment provider</label>

                        <div class="control">
                            <input type="text" class="input @error('provider') is-danger @enderror" name="provider" maxlength="30" value="{{ $plan->plan_provider }}">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Pricing</label>
                        <div class="control">
                        <input class="input" name="price" value="{{ $plan->plan_price }}">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Amount of Points</label>
                        <div class="control">
                            <input class="input" name="points_amount" value="{{ $plan->plan_points_amount }}">
                        </div>
                    </div>
                </div>

                <div class="column is-6">
                    <div class="notification is-warning">
                        <ul>
                            <li><b>Payment Provider</b> is your payment provider name.</li>
                            <li><b>Payment pricing </b> is how amount of money player need to buy this package.</li>
                            <li><b>AMOUNT OF POINTS</b> is how many points player will recieve when transaction is completed.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="buttons is-right">
                <button type="submit" class="button is-black">
                    Edit payment plan
                </button>
            </div>
        </form>
    </div>
@endsection
