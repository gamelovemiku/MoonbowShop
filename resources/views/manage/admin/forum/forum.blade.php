@extends('manage.admin.controlpanel')

@section('content')

<nav class="breadcrumb is-small" aria-label="breadcrumbs">
    <ul>
        <li><a href="{{ route('profile.index') }}">{{ Auth::user()->name }}</a></li>
        <li><a href="{{ route('admin.controlpanel') }}">Admin</a></li>
        <li><a href="{{ route('forumcontrol.index') }}">Itemshop</a></li>
        <li class="is-active"><a href="{{ route('forumcontrol.index') }}" aria-current="page">Forum Category</a></li>
    </ul>
</nav>

<div class="columns">
    <div class="column is-6">
        <h4 class="title is-size-4 has-text-weight-bold">Forum Category</h4>
        <p class="subtitle is-size-7">Category Manager using in forum<b class="force-bold"></b></p>
    </div>
    <div class="column is-6 has-text-right">

        <a href="{{ route('forumcontrol.create')}}" class="button is-small is-light">
            <i class="fas fa-plus fa-xs" style="margin-right: 4px;"></i>Add category
        </a>

    </div>
</div>
<div class="columns">
    <div class="column is-12">
        <table class="table is-hoverable is-fullwidth">
            <thead>
                <tr>
                    <th>Category Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <th>{{ $category->forum_category_name }}</th>
                        <th>{{ $category->forum_category_description }}</th>
                        <th>
                            <div class="buttons">
                                <div class="buttons">
                                    <form action="{{ route('forumcontrol.destroy', [$category->forum_category_id])}}" method="post">
                                        @method('delete')
                                        @csrf

                                        <div class="buttons">
                                            <a href="{{ route('forumcontrol.edit', [$category->forum_category_id])}}" class="button is-primary is-small">Edit</a>
                                            <button type="submit" class="button is-danger is-small">Delete</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection
