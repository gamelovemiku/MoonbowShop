@extends('manage.profilecenter')

@section('content')

<nav class="breadcrumb is-small" aria-label="breadcrumbs">
    <ul>
        <li><a href="/manage">{{ Auth::user()->name }}</a></li>
        <li class="is-active"><a href="/manage/profile" aria-current="page">Profile</a></li>
    </ul>
</nav>

<h4 class="title is-size-4 has-text-weight-bold">แก้ไขโปรไฟล์</h4>
<p class="subtitle is-size-7">แก้ไขโปรไฟล์ของคุณเอง<b class="force-bold"></b></p>

<form method="post" action="{{ route('profile.updateprofile') }}" enctype="multipart/form-data">
    @csrf
    <div class="columns">
        <div class="column is-8">

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">อีเมล</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <input class="input is-white" type="email" name="email" value="{{ $user->email }}" readonly>
                            @error('email')
                                <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">ชื่อผู้ใช้</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <input class="input" type="text" name="name" value="{{ $user->name }}">
                            @error('name')
                                <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">ภาพประจำตัว</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="file is-black is-small has-name">
                            <label class="file-label">
                            <input class="file-input" type="file" name="avatar">
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
                            @error('avatar')
                                <p class="help is-danger">{{ $message }}</p>
                            @enderror
                    </div>
                </div>
            </div>

            <div class="buttons is-right">
                <button type="submit" class="button is-primary is-outlined">
                    บันทึกการเปลี่ยนแปลง
                </button>
            </div>
        </div>
        <div class="column is-4">
            <div class="">
                <figure class="image is-squared" style="width: 50%">
                    <img loading="lazy" src="/storage/avatar/{{ $user->profile_image_path}}" alt="product">
                </figure>
            </div>
        </div>
    </div>
</form>
@endsection
