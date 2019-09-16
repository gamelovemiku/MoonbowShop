@extends('manage.admin.controlpanel')

@section('content')

<nav class="breadcrumb is-small" aria-label="breadcrumbs">
    <ul>
        <li><a href="/manage">{{ Auth::user()->name }}</a></li>
        <li><a href="/manage/profile">Admin</a></li>
        <li class="is-active"><a href="{{ route('paymentplan.index') }}">Payment Plan</a></li>
    </ul>
</nav>

<div class="columns">
    <div class="column is-6">
        <h4 class="title is-size-4 force-bold">Payment</h4>
        <p class="subtitle is-size-7">Set topup plans to make your player donate to you.<b class="force-bold"></b></p>
    </div>
    <div class="column is-6 has-text-right">
        <a href="{{ route('paymentplan.create') }}" class="button is-small is-light">
            <i class="fas fa-plus fa-xs" style="margin-right: 6px;"></i>New Payment Plan
        </a>
    </div>
</div>

<table class="table is-hoverable is-fullwidth">
    <thead>
        <tr>
            <th>#</th>
            <th>Provider</th>
            <th>Billing Amount</th>
            <th>Points Amount</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($plans as $key => $plan)
        <tr>
            <th>{{ $key+1 }}</th>
            <th>{{ $plan->plan_provider }}</th>
            <th>{{ $plan->plan_price}}</th>
            <th>{{ $plan->plan_points_amount}}</th>
            <th>
                <div class="buttons">
                    <form action="{{ route('paymentplan.edit', [$plan->plan_id])}}" method="get">
                        @method('get')
                        @csrf
                        <button type="submit" style="margin-right: 8px;" class="button is-link is-small">Edit</button>
                    </form>

                    <form action="{{ route('paymentplan.destroy', [$plan->plan_id])}}" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit" class="button is-danger is-small">Delete</button>
                    </form>
                </div>
            </th>

        </tr>
        @empty
        <tr>
            <td class="has-text-centered has-text-danger" colspan="5">
                You doesn't have any notice!
            </td>
        </tr>
    @endforelse
    </tbody>
</table>

@endsection
