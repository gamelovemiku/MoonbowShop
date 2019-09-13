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
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="js/bulma-toast.min.js"></script>
    <script src="/js/bulma.js"></script>

    <link href="/css/summernote-lite.css" rel="stylesheet">
    <script src="/js/summernote-lite.js"></script>

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
            <div class="columns is-multiline">
                <div class="column is-half is-offset-one-quarter">
                    <div class="box">
                        <div class="tags">

                        </div>

                        <h4 class="title is-4 has-text-weight-bold is-uppercase">เพิ่มเรื่องใหม่</h4>
                        <h4 class="subtitle is-6 is-uppercase">โพสต์เรื่องใหม่ไปยังเว็บบอร์ดพูดคุยในนาม {{ Auth::user()->name }}</h4>

                        <form action="{{ route('topic.store') }}" method="post">
                            @csrf

                            <div class="field">
                                <input class="input" type="text" name="topic" placeholder="ชื่อเรื่อง...">
                            </div>

                            <div class="field">
                                <textarea class="textarea" id="summernote" name="content"></textarea>
                            </div>

                            <div class="field">
                                <label class="checkbox">
                                    <input class="checkbox" type="checkbox" name="is_published">
                                    บันทึกเป็นแบบร่าง
                                </label>
                            </div>

                            <div class="field">
                                <div class="buttons">
                                    <button type="submit" class="button is-info has-text-weight-light">ตั้งเรื่องใหม่</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $('#summernote').summernote({
            placeholder: 'เนื้อหา..',
            tabsize: 10,
            height: 320,
            focus: true
        });
    </script>
</body>
</html>
