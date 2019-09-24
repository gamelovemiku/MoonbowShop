<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Store</title>
    <link rel="stylesheet" href="/css/bulma/bulma.css"/>
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
    <section class="hero is-info space-for-navbar" style="background-image: url('https://i.imgur.com/EORC8LJ.png'); background-position: center; background-repeat: no-repeat; background-size: cover;">
        <div class="hero-body">
            <div class="container is-uppercase">
                <h1 class="title is-1 force-bold">
                    Store
                </h1>
                <h2 class="subtitle">
                    ร้านค้าไอเท็ม ซื้อผ่านทางเว็บไซต์
                </h2>
            </div>
        </div>
    </section>
    <section class="section"  style="margin-bottom: 4em;">
        @include('components.alert')
        <div class="container is-uppercase">
            <div class="columns">
                <div class="column is-8">
                    <div class="box">
                        <div class="tabs-wrapper">
                            <div class="tabs is-toggle is-fullwidth ">
                                <ul>
                                    <li class="is-active" id="lastest">
                                        <a>ไอเท็มใหม่ล่าสุด</a>
                                    </li>
                                    <li id="bestseller">
                                        <a>ขายดี</a>
                                    </li>
                                    <li id="onsale">
                                        <a>กำลังลดราคา</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="tabs-content">
                                <ul>
                                    <li class="is-active">
                                        <div class="columns is-multiline">
                                            @forelse ($lastest as $key => $item)
                                                <div class="column is-3">
                                                    <div class="card box-fullheight">
                                                        <div class="card-content">
                                                            <div class="field">
                                                                <div class="tags are-normal force-bold">
                                                                    @if($key == 0) <span class="tag is-warning">Lastest</span> @endif
                                                                    <span class="tag is-danger">New</span>
                                                                </div>
                                                            </div>

                                                            <div class="title-product @if($key == 0) has-text-info @endif">{{ $item->item_name }}
                                                                <p class="subtitle-product">{{ $item->item_desc }}</p>

                                                                <div class="field" style="margin-top: 0.75rem;">
                                                                    <figure class="image container is-96x96">
                                                                        <img loading="lazy" src="/storage/itemshop/cover/{{ $item->item_image_path}}" alt="product">
                                                                    </figure>
                                                                </div>

                                                                <p class="is-size-6 has-text-weight-medium has-text-centered">
                                                                    @if($item->item_discount_price == null) {{ $item->item_price }} พ้อยท์ @else <small class="has-text-dark"><del>{{ $item->item_price }}</small> > </small> <a class="has-text-danger">{{ $item->item_discount_price }} พ้อยท์</a>   @endif
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer">
                                                            <div class="card-footer-item">
                                                                <a href="/store/checkout/{{ $item->item_id }}" class="button @if($key == 0) is-primary @else is-black @endif  is-outlined">@if($key == 0) ซื้อตอนนี้เลย! @else ซื้อ @endif</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @empty
                                                <div class="column is-12">
                                                    <p class="is-size-6 has-text-centered has-text-danger" style="margin: 25%">ไม่มีไอเท็มใดวางขายเลย</p>
                                                </div>
                                            @endforelse
                                        </div>
                                    </li>
                                    <li>
                                        <div class="columns is-multiline">
                                            @forelse ($bestseller as $key => $item)
                                                <div class="column is-3">
                                                    <div class="card box-fullheight">
                                                        <div class="card-content">
                                                            <div class="field">
                                                                <div class="tags are-normal force-bold">
                                                                    @if($key == 0) <span class="tag is-info">Popular</span> @endif
                                                                    <span class="tag is-light">{{ $item->item_sold . " SOLD"}}</span>
                                                                </div>
                                                            </div>

                                                            <div class="title-product @if($key == 0) has-text-info @endif">{{ $item->item_name }}
                                                                <p class="subtitle-product">{{ $item->item_desc }}</p>

                                                                <div class="field" style="margin-top: 0.75rem;">
                                                                    <figure class="image container is-96x96">
                                                                        <img loading="lazy" src="/storage/itemshop/cover/{{ $item->item_image_path}}" alt="product">
                                                                    </figure>
                                                                </div>

                                                                <p class="is-size-6 has-text-weight-medium has-text-centered">
                                                                    @if($item->item_discount_price == null) {{ $item->item_price }} พ้อยท์ @else <small class="has-text-dark"><del>{{ $item->item_price }}</small> > </small> <a class="has-text-danger">{{ $item->item_discount_price }} พ้อยท์</a>   @endif
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer">
                                                            <div class="card-footer-item">
                                                                <a href="/store/checkout/{{ $item->item_id }}" class="button @if($key == 0) is-primary @else is-black @endif  is-outlined">@if($key == 0) ซื้อตอนนี้เลย @else ซื้อ @endif</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @empty
                                                <div class="column is-12">
                                                    <p class="is-size-6 has-text-centered has-text-danger" style="margin: 25%">ไม่มีไอเท็มใดวางขายเลย</p>
                                                </div>
                                            @endforelse
                                        </div>
                                    </li>
                                    <li>
                                        <div class="columns is-multiline">
                                            @forelse ($discount as $key => $item)
                                                <div class="column is-3">
                                                    <div class="card box-fullheight">
                                                        <div class="card-content">
                                                            <div class="field">
                                                                <div class="tags are-normal force-bold">
                                                                    <span class="tag is-primary">Discount</span>
                                                                </div>
                                                            </div>

                                                            <div class="title-product @if($key == 0) has-text-info @endif">{{ $item->item_name }}
                                                                <p class="subtitle-product">{{ $item->item_desc }}</p>

                                                                <div class="field" style="margin-top: 0.75rem;">
                                                                    <figure class="image container is-96x96">
                                                                        <img loading="lazy" src="/storage/itemshop/cover/{{ $item->item_image_path}}" alt="product">
                                                                    </figure>
                                                                </div>

                                                                <p class="is-size-6 has-text-weight-medium has-text-centered">
                                                                        @if($item->item_discount_price == null) {{ $item->item_price }} พ้อยท์ @else <small class="has-text-dark"><del>{{ $item->item_price }}</small> > </small> <a class="has-text-danger">{{ $item->item_discount_price }} พ้อยท์</a>   @endif
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer">
                                                            <div class="card-footer-item">
                                                                <a href="/store/checkout/{{ $item->item_id }}" class="button @if($key == 0) is-primary @else is-black @endif  is-outlined">@if($key == 0) ซื้อตอนนี้เลย @else ซื้อ @endif</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @empty
                                                <div class="column is-12">
                                                    <p class="is-size-6 has-text-centered has-text-danger" style="margin: 25%">ไม่มีไอเท็มใดกำลังลดราคาเลย</p>
                                                </div>
                                            @endforelse
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="box" id="allitems">
                        <div class="level">
                            <div class="level-left">
                                <div class="title-category">ไอเท็มในร้านทั้งหมด
                                    <p class="text-category has-text-weight-light">รายการสินค้าทั้งหมดที่วางขายในร้านค้า</p>
                                </div>
                            </div>
                            <div class="level-right">

                            </div>
                        </div>
                        <div class="columns is-multiline">
                            @forelse ($items as $item)
                            <div class="column is-3">
                                <div class="card box-fullheight">
                                    <div class="card-content">
                                        <div class="field">
                                            <div class="tags are-normal force-bold">

                                            </div>
                                        </div>

                                        <div class="title-product @if($key == 0) has-text-info @endif">{{ $item->item_name }}
                                            <p class="subtitle-product">{{ $item->item_desc }}</p>

                                            <div class="field" style="margin-top: 0.75rem;">
                                                <figure class="image container is-96x96">
                                                    <img loading="lazy" src="/storage/itemshop/cover/{{ $item->item_image_path}}" alt="product">
                                                </figure>
                                            </div>

                                            <p class="is-size-6 has-text-weight-medium has-text-centered">
                                                @if($item->item_discount_price == null) {{ $item->item_price }} พ้อยท์ @else <small class="has-text-dark"><del>{{ $item->item_price }}</small> > </small> <a class="has-text-danger">{{ $item->item_discount_price }} พ้อยท์</a>   @endif
                                            </p>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="card-footer-item">
                                            <a href="/store/checkout/{{ $item->item_id }}" class="button @if($key == 0) is-primary @else is-black @endif  is-outlined">@if($key == 0) ซื้อตอนนี้เลย! @else ซื้อ @endif</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                                <div class="column is-12">
                                    <p class="is-size-6 has-text-centered has-text-danger" style="margin: 25%">ไม่มีไอเท็มใดวางขายเลย</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="column is-4">
                    @include('components.accounts')

                    <div class="box" style="width: 100%">
                        <div class="title-category">ประกาศของร้านค้า
                            <p class="text-category has-text-weight-light">ข้อมูลเกี่ยวกับการซื้อบนร้านค้า</p>
                        </div>
                        <table class="table is-fullwidth">
                            <thead>
                                <tr>
                                    <th width="15%">แท็ก</th>
                                    <th width="85%">ข้อความ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($notices as $key => $notice)
                                    <tr>
                                        <th width="15%">
                                            <div class="tags">
                                                <span class="tag is-danger">{{ $notice->notice_tag }}</span>
                                                @if($key == 0) <span class="tag is-light">Lastest</span> @endif
                                            </div>
                                        </th>
                                        <th width="85%">{{ Str::limit($notice->notice_title, 120) }}</th>
                                    </tr>
                                @empty
                                    <td class="has-text-centered has-text-pink" colspan="2">
                                        ไม่มีประกาศใดๆ ที่เกี่ยวกับร้านค้า
                                    </td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!--div--- class="box" style="width: 100%">
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
                    </!--div--->

                    @include('components.serverstatus')
                </div>
            </div>
        </div>
    </section>
    @include('components.footer')
</body>
</html>
