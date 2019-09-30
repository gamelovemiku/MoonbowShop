@extends('manage.admin.controlpanel')

@section('content')

<nav class="breadcrumb is-small" aria-label="breadcrumbs">
    <ul>
        <li><a href="{{ route('profile.index') }}">{{ Auth::user()->name }}</a></li>
        <li><a href="{{ route('admin.controlpanel') }}">Admin</a></li>
        <li><a href="{{ route('item.index') }}">Itemshop</a></li>
        <li class="is-active"><a aria-current="page">Edit Item</a></li>
    </ul>
</nav>
<div class="tabs is-small">
    <ul>
        <li class="is-active"><a href="{{ route('item.index') }}">Item</a></li>
        <li><a href="{{ route('category.index') }}">Category</a></li>
    </ul>
</div>
<h4 class="title is-size-4 force-bold">Edit Item <small>(#{{ $item->item_id }})</small></h4>
<p class="subtitle is-size-6">Edit item to your itemshop<b class="force-bold"></b></p>
<div class="field">
    <form method="POST" action="{{ route('item.update', ['item' => $item->item_id]) }}" enctype="multipart/form-data">
        @method('put')
        @csrf

        <div class="columns">
            <div class="column is-6">
                <div class="field">
                    <label for="item_name" class="label">Item name</label>

                    <div class="control">
                        <input id="item_name" type="text" class="input @error('itemname') is-danger @enderror" name="item_name" value="{{ $item->item_name }}">
                        @error('item_name')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label for="item_desc" class="label">Item Description</label>

                    <div class="control">
                        <textarea rows="4" id="item_desc" type="text" class="textarea @error('itemdesc') is-danger @enderror" name="item_desc">{{ $item->item_desc }}</textarea>
                        @error('item_desc')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <img class="image" src="/storage/itemshop/cover/{{ $item->item_image_path}}" width="64px">
                <div class="field">
                    <div class="file is-black is-small has-name">
                        <label class="file-label">
                        <input class="file-input" type="file" name="cover">
                        <span class="file-cta">
                            <span class="file-icon">
                                <i class="fas fa-upload"></i>
                            </span>
                            <span class="file-label">
                                <p id="upload-header">Upload</p>
                            </span>
                        </span>
                        <span class="file-name">
                            <p id="upload-filename">No Select file</p>
                        </span>
                        </label>
                    </div>
                    @error('cover')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="column is-6">
                <div class="field">
                    <label for="category" class="label">Item Category</label>
                    <div class="control has-icons-left">
                        <div class="select is-fullwidth">
                            <select id="category" name="category" width="100%">
                                @foreach ($categorys as $category)
                                    <option value="{{ $category->category_id }}" @if($item->category_id == $category->category_id) selected @endif>{{ ucwords($category->category_name) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="icon is-small is-left">
                            <i class="fas fa-tags"></i>
                        </div>
                    </div>

                </div>

                <div class="field">
                    <label for="item_price" class="label">Price <small class="has-text-grey-light">(Points)</small></label>
                    <div class="control">
                        <input id="item_price" class="input" name="item_price" value="{{ $item->item_price }}">
                        @error('item_price')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label for="item_price" class="label">Discount Price <small class="has-text-grey-light">(Optional)</small></label>
                    <div class="control">
                        <input id="item_price" class="input" name="item_discount_price" value="{{ $item->item_discount_price }}">
                        @error('item_discount_price')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label for="command" class="label">Game Command</label>

                    <div class="control">
                        <textarea id="command" type="text" class="input @error('itemdesc') is-danger @enderror" name="item_command">{{ $item->item_command }}</textarea>
                        @error('item_command')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <p class="content is-small">- Uses <b>%player</b> to make the system replace to player's name.</p>
            </div>

        </div>

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <div class="buttons is-right">
            <button type="submit" class="button is-black">
                Edit item
            </button>
        </div>
    </form>
</div>
@endsection
