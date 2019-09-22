<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forum</title>
    <link rel="stylesheet" href="/css/bulma/bulma.css"/>
    <link rel="stylesheet" href="/css/self-custom.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css"/>
    <link href="https://fonts.googleapis.com/css?family=Poppins|Pridi:300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.css" integrity="sha256-a2tobsqlbgLsWs7ZVUGgP5IvWZsx8bTNQpzsqCSm5mk=" crossorigin="anonymous" />

    <script src="/js/bulma-toast.min.js"></script>
    <script src="/js/bulma.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    @include('components.navbar')
    <section class="hero is-info is-small space-for-navbar" style="background-image: url('https://i.imgur.com/piFsBod.png'); background-position: center; background-repeat: no-repeat; background-size: cover;">
        <div class="hero-body">
            <div class="container is-uppercase">
                <h4 class="title is-4 force-bold">
                    Forums
                </h1>
                <h6 class="subtitle is-6">
                    Moonbow Community
                </h2>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            @include('components.alert')
            <div class="level">
                <div class="level-left">
                    เรื่องทั้งหมดที่ถูกโพสต์ใน Forum มีจำนวนทั้งหมด {{ count($topics) }} เรื่อง
                </div>
                <div class="level-right">
                    <div class="buttons">
                        <a class="button is-info is-outlined" href="{{ route('topic.create')}}">เพิ่มเรื่องใหม่</a>
                    <a class="button is-black" href=" {{ route('topicmanager.index') }}">โพสต์ทั้งหมดของฉัน</a>
                    </div>
                </div>
            </div>
            <div class="columns is-multiline">
                <div class="column is-9">
                    <div class="card">
                        <header class="card-header">
                            <p class="card-header-title has-text-info">
                                กำลังได้รับความนิยม
                            </p>
                            <a href="#" class="card-header-icon has-text-info" aria-label="more options">
                            <span class="icon">
                                <i class="fas fa-rss-square"></i>
                            </span>
                            </a>
                        </header>
                        <div class="card-content">
                            <div class="content">
                                <table class="table is-fullwidth">
                                    <tbody>
                                        @foreach($mostviews as $topic)
                                        <tr>
                                            <th>
                                                <div class="level">
                                                    <div class="level-left">
                                                        <div class="level-item">
                                                            <a class="has-text-dark" href="/forum/topic/{{ $topic->topic_id }}">{{ $topic->topic_title }}</a>
                                                        </div>
                                                    </div>
                                                    <div class="level-right">
                                                        <div class="level-item">
                                                            <div><small>โดย {{ $topic->user->name }} | ดู {{ $topic->topic_views }} ครั้ง |  {{ count($topic->comment) }} ตอบกลับ</small></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </th>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <header class="card-header">
                            <p class="card-header-title  has-text-pink">
                                มาใหม่ล่าสุด
                            </p>
                            <a href="#" class="card-header-icon has-text-pink" aria-label="more options">
                            <span class="icon">
                                <i class="fas fa-fire-alt" aria-hidden="true"></i>
                            </span>
                            </a>
                        </header>
                        <div class="card-content">
                            <div class="content">
                                <table class="table is-fullwidth">
                                    <tbody>
                                        @foreach($lastest as $topic)
                                        <tr>
                                            <th>
                                                <div class="level">
                                                    <div class="level-left">
                                                        <div class="level-item">
                                                            <a class="has-text-dark" href="/forum/topic/{{ $topic->topic_id }}">{{ $topic->topic_title }}</a>
                                                        </div>
                                                    </div>
                                                    <div class="level-right">
                                                        <div class="level-item">
                                                            <div><small>โดย {{ $topic->user->name }} | ดู {{ $topic->topic_views }} ครั้ง |  {{ count($topic->comment) }} ตอบกลับ</small></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </th>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-3">
                    <h4 class="title is-4">ตามหมวดหมู่</h4>
                    <div class="box">
                        <table class="table is-fullwidth">
                            <tbody>
                                @foreach($categories as $category)
                                <tr>
                                    <th>
                                        <div class="level">
                                            <div class="level-left">
                                                <div class="level-item">
                                                <a class="has-text-pink" href="{{ route('category.show', [$category->forum_category_name])  }}"><i class="fas fa-tags fa-xs"></i> {{ $category->forum_category_name }}</a>
                                                </div>
                                            </div>
                                            <div class="level-right">
                                                <div class="level-item">

                                                </div>
                                            </div>
                                        </div>
                                    </th>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('components.footer')
</body>
</html>
