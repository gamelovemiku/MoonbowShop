<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Topup</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css" integrity="sha256-vK3UTo/8wHbaUn+dTQD0X6dzidqc5l7gczvH+Bnowwk=" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css?family=Pridi&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css" integrity="sha256-PF6MatZtiJ8/c9O9HQ8uSUXr++R9KBYu4gbNG5511WE=" crossorigin="anonymous" />
    <script src="https://www.paypal.com/sdk/js?client-id=AVXryUcNd6hdPCIA9Nk5CrPS6Hc-laYQjzi4K-lESiRTAgB2-Ut1JjKP7Ouz_Xea8RDyvWQt6Q7TSWA_"></script>
</head>

<style>
    html, body{
        /*font-family: 'Pridi', serif;*/
        font-weight: 600;
    }
    .force-bold{
        font-weight: 800;
    }
    .title-product{
        font-size: 18px;
        font-weight: 800;
    }
    .subtitle-product{
        color: lightgrey;
        font-size: 12px;
        font-weight: 400;
    }
    .pricetag-product{
        color: gray;
        font-size: 16px;
        font-weight: 600;
        text-align: center;
    }
    .button-product{
        margin-top: 8px;
    }
    .small-title{
        font-size: 10px;
        margin: 12px;
    }
    .title-category {
        font-size: 24px;
        font-weight: 800;
        margin-bottom: 12px;
    }
    .text-category {
        color: lightgray;
        font-size: 14px;
        font-weight: 600;
    }
    .box-fullheight {
        height: 100%;
    }
    .title-news {
        font-size: 16px;
        font-weight: 600;
    }
    .text-news {
        color: gray;
        font-size: 12px;
        font-weight: 400;
    }
    .text-stats {
        color: lightgray;
        font-size: 12px;
        font-weight: 600;
    }
    .section {
        margin-top: 64px;
    }
    .text-price{
        color: darkgoldenrod;
        font-size: 18px;
        font-weight: 600;
    }
    .button {
        font-weight: 500;
    }

</style>

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
    <section class="section">
        <div class="container is-uppercase">
            <h1 class="title is-size-1 force-bold">Topup</h1>
            <p class="subtitle">Get more points and donate to the server.</p>
            <div class="columns">
                <div class="column is-8">
                    <div class="box">
                        <div class="title-category">Paypal
                            <p class="text-category">The leading payment gateway inthe world, Less fees.</p>
                        </div>
                        <div class="columns is-multiline">
                            <div class="column is-4">
                                <div class="box" style="width: 100%">
                                    <div class="title-category">Paypal
                                        <p class="text-price">49 THB</p>
                                        <div class="content" style="margin-top: 1rem;">
                                            <div class="title">80 Points</div>
                                            <div class="subtitle">+30 Points (Bonus)</div>
                                        </div>
                                        <hr/>
                                        <a class="button is-info is-fullwidth"><i class="fab fa-paypal" style="margin-right: 8px;"></i> Purchase (49 THB)</a>
                                    </div>
                                </div>
                            </div>
                            <div class="column is-4">
                                <div class="box" style="width: 100%">
                                    <div class="title-category">Paypal
                                        <p class="text-price">129 THB</p>
                                        <div class="content" style="margin-top: 1rem;">
                                            <div class="title">160 Points</div>
                                            <div class="subtitle">+50 Points (Bonus)</div>
                                        </div>
                                        <hr/>
                                        <a class="button is-info is-fullwidth"><i class="fab fa-paypal" style="margin-right: 8px;"></i> Purchase (129 THB)</a>
                                    </div>
                                </div>
                            </div>
                            <div class="column is-4">
                                <div class="box" style="width: 100%">
                                    <div class="title-category">Paypal
                                        <p class="text-price">349 THB</p>
                                        <div class="content" style="margin-top: 1rem;">
                                            <div class="title">540 Points</div>
                                            <div class="subtitle">+90 Points (Bonus)</div>
                                        </div>
                                        <hr/>
                                        <a class="button is-info is-fullwidth"><i class="fab fa-paypal" style="margin-right: 8px;"></i> Purchase (369 THB)</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr/>
                        <div class="title-category">TrueMoney
                            <p class="text-category">Famous thai topup cashcard. but have many fees.</p>
                        </div>
                        <div class="columns is-multiline">
                            <div class="column is-4">
                                <div class="box" style="width: 100%">
                                    <div class="title-category">truemoney
                                        <p class="text-price">50 THB</p>
                                        <div class="content" style="margin-top: 1rem;">
                                            <div class="title">35 Points</div>
                                            <div class="subtitle">+5 Points (Bonus)</div>
                                        </div>
                                        <hr/>
                                        <a class="button is-danger is-fullwidth"><i class="fas fa-money-check-alt" style="margin-right: 8px;"></i> Purchase (50 THB)</a>
                                    </div>
                                </div>
                            </div>
                            <div class="column is-4">
                                <div class="box" style="width: 100%">
                                    <div class="title-category">truemoney
                                        <p class="text-price">90 THB</p>
                                        <div class="content" style="margin-top: 1rem;">
                                            <div class="title">72 Points</div>
                                            <div class="subtitle">+10 Points (Bonus)</div>
                                        </div>
                                        <hr/>
                                        <a class="button is-danger is-fullwidth"><i class="fas fa-money-check-alt" style="margin-right: 8px;"></i> Purchase (90 THB)</a>
                                    </div>
                                </div>
                            </div>
                            <div class="column is-4">
                                <div class="box" style="width: 100%">
                                    <div class="title-category">truemoney
                                        <p class="text-price">300 THB</p>
                                        <div class="content" style="margin-top: 1rem;">
                                            <div class="title">250 Points</div>
                                            <div class="subtitle">+30 Points (Bonus)</div>
                                        </div>
                                        <hr/>
                                        <a class="button is-danger is-fullwidth"><i class="fas fa-money-check-alt" style="margin-right: 8px;"></i> Purchase (300 THB)</a>
                                    </div>
                                </div>
                            </div>
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
                                <span class="tag is-black is-large">0 Points</span>
                            </div>
                        </div>
                    </div>
                    <div class="box" style="width: 100%; height: 100%">
                        <div class="title-category"><i class="fab fa-discord"></i> Official Discord
                            <p class="text-category">Support offline chat / Community</p>
                        </div>
                        <iframe src="https://discordapp.com/widget?id=606226758932496473&theme=dark" width="100%" height="500" allowtransparency="true" frameborder="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('components.footer') 
</body>
</html>