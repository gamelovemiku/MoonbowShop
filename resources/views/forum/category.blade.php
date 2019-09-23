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

                </div>
                <div class="level-right">
                    <div class="buttons">
                        <a class="button is-info is-outlined" href="{{ route('topic.create')}}">เพิ่มเรื่องใหม่</a>
                    <a class="button is-black" href=" {{ route('topicmanager.index') }}">โพสต์ทั้งหมดของฉัน</a>
                    </div>
                </div>
            </div>

            <p class="subtitle">หมวดหมู่</p>
            <h1 class="title">{!! $topics[0]->category->forum_category_name ?? 'ไม่มีกระทู้ที่อยู่ในหมวดนี้ <small class="is-size-6">(หรือไม่มีหมวดนี้)</small>' !!}</h1>
            <p class="subtitle is-6">
                {!! $topics[0]->category->forum_category_description ?? '' !!}
            </p>

            <div class="columns is-multiline">
                <div class="column is-9">
                    @forelse ($topics as $topic)
                        <h4 class="title is-4"><a href="{{ route('topic.show', $topic->topic_id) }}">{{ $topic->topic_title }}</a></h4>
                        <p class="subtitle is-6">{!! Str::limit($topic->topic_content, 360)!!}</p>
                        <hr>
                    @empty
                        <p class="subtitle is-6">ไม่มีโพสต์ใดๆ ในหมวดหมู่นี้</p>
                    @endforelse
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
                                                <a class="has-text-pink" href="{{ route('category.show', [$category->forum_category_id])  }}"><i class="fas fa-tags fa-xs"></i> {{ $category->forum_category_name }}</a>
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
