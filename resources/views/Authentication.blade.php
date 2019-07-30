<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Authentication</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css" integrity="sha256-vK3UTo/8wHbaUn+dTQD0X6dzidqc5l7gczvH+Bnowwk=" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css?family=Pridi&display=swap" rel="stylesheet">
</head>

<style>
    html, body{
        /*font-family: 'Pridi', serif;*/
    }
</style>
<body>
    @include('components.navbar')
    <section class="section">
        <div class="container is-uppercase">
            <div class="box" style="width: 100%">
                <h4 class="title is-size-4">Moonbow</h4>
                <p class="subtitle is-size-7">Authentication</p>
                <form class="form">
                    <div class="field">
                        <div class="control">
                            <input class="input" type="text" placeholder="Username">
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <input class="input" type="password" placeholder="Passcode">
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <div class="button is-small is-link">Login</div>
                            <div class="button is-small">Reset Password</div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>