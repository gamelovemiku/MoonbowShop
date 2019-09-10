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

    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="js/bulma-toast.min.js"></script>
    <script src="/js/bulma.js"></script>

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

    <section class="section hero is-white">
        <div class="container">
            <div class="columns is-multiline">
                <div class="column is-three-fifths is-offset-one-fifth">
                    <div class="post">
                        <div class="tags">
                            <span class="tag is-link">#Room</span>
                        </div>

                        <h4 class="title is-4 has-text-weight-bold is-uppercase">เพิ่มเรื่องใหม่----------------------------------------------------------------------------------------------</h4>

                        <div id="editor">
                            <p>Hello World!</p>
                            <p>Some initial <strong>bold</strong> text</p>
                            <p><br></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        var quill = new Quill('#editor', {
          theme: 'snow'
        });
    </script>
</body>
</html>
