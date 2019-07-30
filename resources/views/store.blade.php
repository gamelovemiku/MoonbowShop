<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Store</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css" integrity="sha256-vK3UTo/8wHbaUn+dTQD0X6dzidqc5l7gczvH+Bnowwk=" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css?family=Pridi&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css" integrity="sha256-PF6MatZtiJ8/c9O9HQ8uSUXr++R9KBYu4gbNG5511WE=" crossorigin="anonymous" />
    <script crossorigin src="https://unpkg.com/react@16/umd/react.development.js"></script>
    <script crossorigin src="https://unpkg.com/react-dom@16/umd/react-dom.development.js"></script>
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

</style>

<script>
    class App extends Component {
        constructor(props) {

        }
        render() {
            return (

            )
        }
    }
</script>

<body>
    @include('components.navbar')
    <section class="section">
        <div class="container is-uppercase">
            <h1 class="title is-size-1 force-bold">Store</h1>
            <p class="subtitle">Buy your item, to make your gameplay better.</p>
            <div class="columns">
                <div class="column is-8">
                    <div class="box" style="width: 100%">
                        <div class="title-category">On sale now for limited time!
                            <p class="text-category">Make your new equipment for supporters!</p>
                        </div>
                        <div class="columns is-multiline">
                            @foreach ($items as $item)
                                <div class="column is-3">
                                    <div class="box box-fullheight">
                                        <div class="title-product">{{ $item->item_name }}
                                            <p class="subtitle-product">{{ $item->item_desc }}</p>
                                            <img width="100%" src="{{ "./assets/image/store/" . $item->item_image_path }}" alt="product">
                                            <p class="pricetag-product">{{ $item->item_price }} Points / 64 Pcs</p>
                                            <div class="buttons is-centered button-product">
                                                <a href="/checkout/{{ $item->item_id }}" class="button is-link is-outlined">Buy</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="column is-4">
                    <div class="box" style="width: 100%">
                        <div class="columns">
                            <div class="column">
                                <div class="title-category">Notice
                                    <p class="text-category">Information from admin to let you know.</p>
                                </div>
                                <div class="box">
                                    <div class="title-news">Summers Sale!</div>
                                    <p class="text-news">Stay focus, We are offer you to buy any item in store with discount up to 60% from normal price!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box" style="width: 100%">
                        <div class="title-category">Redeem
                            <p class="text-category">Have any redeem code? REDEEM IT and GET PRIZE!</p>
                        </div>
                        <form>
                            <div class="field">
                                <input class="input" type="text">
                            </div>
                            <div class="buttons">
                                
                                <div class="button" type="submit">Redeem</div>
                                <div class="button is-text" type="submit">Redeem Terms</div>
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