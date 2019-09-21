<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="/css/bulma/bulma.css"/>
    <link rel="stylesheet" href="/css/self-custom.css"/>
    <script src="/js/bulma.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Pridi&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css" integrity="sha256-PF6MatZtiJ8/c9O9HQ8uSUXr++R9KBYu4gbNG5511WE=" crossorigin="anonymous" />
</head>

<body>
    @include('components.navbar')
    <section class="hero is-info space-for-navbar" style="background-image: url('https://i.imgur.com/EORC8LJ.png'); background-position: center; background-repeat: no-repeat; background-size: cover;">
        <div class="hero-body">
            <div class="container is-uppercase">
                <h1 class="title is-1 force-bold">
                    Home
                </h1>
                <h2 class="subtitle">
                    Overview about your gameplay.
                </h2>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container is-uppercase">
            <div class="columns">
                <div class="column is-8">
                    <div class="box" style="width: 100%">
                        <div class="title-category has-text-info">Notice
                            <p class="text-category">News, Information to let you stay updated!</p>
                        </div>
                        <table class="table is-fullwidth is-hoverable">
                            <thead>
                                <tr>
                                    <th width="20%">Notice Type</th>
                                    <th width="80%">Title</th>
                                </tr>
                            </thead>
                            @forelse ($notices as $notice)
                                <tr>
                                    <th width="25%">
                                        <div class="tags">
                                            @if($notice->notice_show_on_store == 1) <div class="tag is-warning">Store</div> @endif
                                            <div class="tag is-info">{{ $notice->notice_tag }}</div>
                                        </div>
                                    </th>
                                    <th width="75%">{{ $notice->notice_title }}</th>
                                </tr>
                            @empty

                            @endforelse
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <div class="box" style="width: 100%">
                        <div class="title-category has-text-info">Pinned Information
                            <p class="text-category">About server information, how to play, getting started and etc.</p>
                        </div>
                    <p class="has-text-weight-light">{{ $settings->website_desc }}</p>
                    </div>
                </div>
                <div class="column is-4">
                    <div class="box">
                        <div class="columns">
                            <div class="column">
                                <div class="title-category">Accounts
                                    <p class="text-category">Your personal status.</p>
                                </div>
                                <span class="tag is-black is-large">{{ $balance }} Points</span>
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="columns">
                            <div class="column">
                                <div class="title-category">Social Media
                                    <p class="text-category">Take a closer by follow us on social.</p>
                                </div>
                                <span class="icon is-large">
                                    <i class="fab fa-facebook fa-2x"></i>
                                </span>
                                <span class="icon is-large">
                                    <i class="fab fa-twitter fa-2x"></i>
                                </span>
                                <span class="icon is-large">
                                    <i class="fab fa-instagram fa-2x"></i>
                                </span>
                                <span class="icon is-large">
                                    <i class="fab fa-discord fa-2x"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <iframe style="height: 340px; margin: 0px" src="https://discordapp.com/widget?id=606226758932496473&theme=dark" width="100%"></iframe>
                </div>
            </div>
        </div>
    </section>
    @include('components.footer')
</body>
</html>
