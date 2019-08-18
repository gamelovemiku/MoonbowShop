<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout - {{ $items->item_name }}</title>
    <link rel="stylesheet" href="/css/bulma/bulma.min.css"/>
    <link rel="stylesheet" href="/css/self-custom.css"/>
    <script src="/js/bulma.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Pridi&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css" integrity="sha256-PF6MatZtiJ8/c9O9HQ8uSUXr++R9KBYu4gbNG5511WE=" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</head>

<style>
    html, body, .button{
        font-family: 'Segoe UI' ,'Pridi', serif;
        font-weight: 600;
    }
    .button {
        font-family: 'Segoe UI' ,'Pridi', serif;
        text-transform: uppercase;
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

<body>
    @include('components.navbar')
    <section class="section">
        <div class="container is-uppercase">
            <h1 class="title is-size-1 force-bold has-text-centered">Purchase Confirmation</h1>
            <p class="subtitle has-text-centered">Reviews your order information.</b></p>
            <div class="columns">
                <div class="column is-half is-offset-one-quarter">
                    <p class="content">
                        <div class="box">
                            <div class="columns">
                                <div class="column is-12">
                                    <div class="title-category">Information</small></div>
                                    <table class="table table is-narrow is-fullwidth">
                                        <tbody>
                                            <tr>
                                                <th>PICTURE</th>
                                                <th><img src="{{ "/storage/itemshop/cover/" . $items->item_image_path }}" alt="Order Picture"/></th>
                                            </tr>
                                            <tr>
                                                <th>BUYER</th>
                                                <th>{{ "@" . Auth::user()->name }}</th>
                                            </tr>  
                                            <tr>
                                                <th>ITEM NAME</th>
                                                <th>{{ $items->item_name }}</th>
                                            </tr>   
                                             <tr>
                                                <th>PRICE</th>
                                                <th>{{ $items->item_price }}</th>
                                            </tr>   
                                            <tr>
                                                <th>CATEGORY</th>
                                                <th>{{ $items->item_category }}</th>
                                            </tr>  
                                            
                                            <tr>
                                                <th>COMMAND</th>
                                                <th>{{ $items->item_command }}</th>
                                            </tr> 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <form action="{{ action('CheckoutController@verifiedbuy') }}" method="post" id="verifyform">
                            @csrf
                            <input type="hidden" name="id" value="{{ $items->item_id}}">
                            <div class="buttons is-right">
                                <button type="submit" id="submit_button" class="button is-black is-fullwidth clickaction">Checkout for {{ $items->item_price }} Points</button>
                                <a href="/store" class="button is-danger is-fullwidth">Back to store</a>
                            </div>
                        </form>
                        </div>
                    </p>
                </div>
            </div>
        </div>
    </section>
    @include('components.footer') 
</body>
<script>
    $('.clickaction').click(function(){
        document.getElementById("submit_button").classList.add('is-loading');
        $("#verifyform").submit();
    });
</script>
</html>