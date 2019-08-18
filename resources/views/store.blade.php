<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Store</title>
    <link rel="stylesheet" href="/css/bulma/bulma.min.css"/>
    <link rel="stylesheet" href="/css/self-custom.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css"/>
    <link href="https://fonts.googleapis.com/css?family=Poppins|Pridi&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.css" integrity="sha256-a2tobsqlbgLsWs7ZVUGgP5IvWZsx8bTNQpzsqCSm5mk=" crossorigin="anonymous" />
    <script src="js/bulma-toast.min.js"></script>
    <script src="/js/bulma.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    @include('components.navbar')
    <section class="section">
        <div class="container is-uppercase">
            <h1 class="title is-size-1 force-bold">Store</h1>
            <p class="subtitle">Buy your item, to make your gameplay better.</p>
            <div class="columns">
                <div class="column is-8">
                    <div class="box">
                        @include('components.alert') 
                        <div class="title-category">On sale now for limited time!
                            <p class="text-category">Make your new equipment for supporters!</p>
                        </div>
                        <div class="columns is-multiline">
                            @forelse ($items as $item)
                                <div class="column is-3">
                                    <div class="box box-fullheight">
                                        <div class="title-product">{{ $item->item_name }}
                                            <p class="subtitle-product">{{ $item->item_desc }}</p>
                                            <figure class="image container is-96x96">
                                                <img src="/storage/itemshop/cover/{{ $item->item_image_path}}" alt="product">
                                            </figure>
                                            <p class="pricetag-product">{{ $item->item_price }} Points / 1 Pcs</p>
                                            <div class="buttons is-centered button-product">
                                                <a href="/store/checkout/{{ $item->item_id }}" class="button is-black is-outlined">Buy</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="column is-12">
                                    <p class="is-size-6 has-text-centered has-text-danger" style="margin: 25%">There are no items available for sale.</p>
                                </div>
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
                                <span class="tag is-black is-large">{{ $balance }} Points</span>
                            </div>
                        </div>
                    </div>
                    <div class="box" style="width: 100%">
                        <div class="title-category">Redeem
                            <p class="text-category">Have any redeem code? REDEEM IT and GET PRIZE!</p>
                        </div>
                        <form action="{{ action('RedeemController@redeem') }}" method="post">
                            @csrf
                            <div class="field">
                                <input class="input" type="text" name="redeemcode">
                            </div>
                            <div class="buttons">
                                <button class="button" type="submit">Redeem</button>
                            </div>                            
                        </form>
                    </div>
                    @include('components.serverstatus') 
                </div>
            </div>
        </div>
    </section>
    @include('components.footer') 
</body>
</html>