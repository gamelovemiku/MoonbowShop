<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Topup</title>
    <link rel="stylesheet" href="/css/bulma/bulma.min.css"/>
    <link rel="stylesheet" href="/css/self-custom.css"/>
    <script src="/js/bulma.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Pridi&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css" integrity="sha256-PF6MatZtiJ8/c9O9HQ8uSUXr++R9KBYu4gbNG5511WE=" crossorigin="anonymous" />
    <script src="https://www.paypal.com/sdk/js?client-id=AVXryUcNd6hdPCIA9Nk5CrPS6Hc-laYQjzi4K-lESiRTAgB2-Ut1JjKP7Ouz_Xea8RDyvWQt6Q7TSWA_"></script>
</head>

<script>
    paypal.Buttons({
        createOrder: function(data, actions) {
        // Set up the transaction
        return actions.order.create({
        purchase_units: [{
            amount: {
                value: '12'
            }
        }]
        });
    }
    }).render('#paypal');
</script>

<body>
    @include('components.navbar')
    <section class="section" style="margin-bottom: 3em; margin-top: 4em;">
        <div class="container is-uppercase">
            <h1 class="title is-size-1 force-bold">Topup</h1>
            <p class="subtitle">Get more points and donate to the server.</p>
            <div class="columns">
                <div class="column is-8">
                    <div class="box">
                        <div class="title-category">Credit Card
                            <p class="text-category">The leading payment gateway in the world, Less fees.</p>
                        </div>
                        <div class="columns is-multiline">
                            @forelse ($plans as $plan)
                                <div class="column is-4">
                                    <div class="box" style="width: 100%">
                                        <div class="title-category">Credit Card
                                            <p class="text-price">{{ $plan->plan_price }} THB</p>
                                            <div class="content" style="margin-top: 1rem;">
                                                <div class="title">{{ number_format($plan->plan_points_amount) }} Points</div>
                                                <div class="subtitle is-7">Instantly receive by system</div>
                                            </div>
                                        <a href="{{ route('topup.show', [$plan->plan_id]) }}" class="button is-info is-fullwidth"><i class="fas fa-credit-card" style="margin-right: 8px;"></i>Purchase ({{ $plan->plan_price }} THB)</a>
                                        </div>
                                    </div>
                                </div>
                            @empty

                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="column is-4">
                    <div class="box" style="width: 100%">
                        <div class="columns">
                            <div class="column">
                                <div class="title-category">Accounts
                                    <p class="text-category">Your personal status.</p>
                                </div>
                                <span class="tag is-black is-large">{{ $user_points }} Points</span>
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="title-category"><i class="fab fa-discord"></i> Official Discord
                            <p class="text-category">Support offline chat / Community</p>
                        </div>
                        <iframe src="https://discordapp.com/widget?id=606226758932496473&theme=dark" width="100%" height="500" frameborder="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
