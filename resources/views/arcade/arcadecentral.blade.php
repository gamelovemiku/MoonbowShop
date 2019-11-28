<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Arcade - ลานบันเทิง</title>
    <link rel="stylesheet" href="/css/bulma/bulma.css"/>
    <link rel="stylesheet" href="/css/self-custom.css"/>
    <script src="/js/bulma.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Pridi&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css" integrity="sha256-PF6MatZtiJ8/c9O9HQ8uSUXr++R9KBYu4gbNG5511WE=" crossorigin="anonymous" />
</head>

<style>

    html, .hero.is-black, .card, .box {
        background-color: #05040B;
    }

    .navbar.is-black {
        background-color: #05040B;
    }

    ::-webkit-scrollbar-thumb {
        background: #DD3537;
    }

    ::-webkit-scrollbar-track {
        background-color: #05040B;
    }

</style>

@section('header-text')
    Arcade Central
@endsection

<body>
    @include('components.navbar')
    <div id="arcade-central">
        <section class="hero is-fullheight is-info space-for-navbar" style="background-image: url('https://cdn175.picsart.com/228963358002202.gif'); background-position: center; background-repeat: no-repeat; background-size: cover;">
            <div class="hero-body">
                <div class="container is-uppercase">
                    <h1 class="title is-1 force-bold">
                        Arcade Central
                    </h1>

                    <h2 class="subtitle">
                        อาณาจักรของ Arcade
                    </h2>
                    <div class="tile is-ancestor">
                        <div class="tile is-vertical is-4">
                            <div class="tile">
                                <div class="tile is-parent is-vertical">
                                    <article class="tile is-child notification is-black">
                                        <p class="title">รับของรายวัน</p>
                                        <p class="subtitle">รับฟรีของรางวัลพิเศษทุกวัน</p>
                                        <a href="#" class="button is-danger is-outlined is-fullwidth">รับ Diamond x64 ฟรีตอนนี้</a>
                                    </article>
                                    <article class="tile is-child notification is-black">
                                        <p class="title">โหวตช่วยเซิร์ฟเวอร์</p>
                                        <p class="subtitle">ได้รับ 15 พ้อยท์ฟรี ต่อการโหวตต่อครั้ง</p>
                                        <a href="#" class="button is-white is-outlined is-fullwidth">ไปยัง MCHUBTH.net</a>
                                    </article>
                                    <article class="tile is-child notification is-black">
                                        <p class="title">สุ่มของ</p>
                                        <p class="subtitle">เลือกกล่องสุ่มของ แล้วไปลุ้นรางวัลได้เลย</p>
                                        <a href="#" class="button is-danger is-outlined is-fullwidth">ซื้อกล่องสุ่มของ</a>
                                    </article>
                                </div>
                            </div>
                        </div>
                        <div class="tile is-parent">
                            <article class="tile is-child notification is-black">
                                <div class="content">
                                    <p class="title">Tall tile</p>
                                    <p class="subtitle">With even more content</p>
                                    <div class="content">
                                    <!-- Content -->
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>

    <script src="https://unpkg.com/vue"></script>
    <script src="https://unpkg.com/buefy/dist/buefy.min.js"></script>

    <script>

        new Vue({
            el: '#arcade-central',
            methods: {
                roleIdToText: function(id) {
                    switch(id) {
                        case 1:
                            return 'ผู้ดูแล'
                        case 2:
                            return 'ผู้เล่นทั่วไป'
                    }
                },
            },
            computed: {

            },
            data() {
                return {
                    data,
                    selected: data[-1],
                    columns: [
                        {
                            field: 'item_id',
                            label: 'เลขอ้างอิง',
                        },
                        {
                            field: 'item_name',
                            label: 'ชื่อไอเท็ม',
                        },
                        {
                            field: 'item_desc',
                            label: 'รายละเอียดโดยย่อ',
                        },
                        {
                            field: 'item_price',
                            label: 'ราคา',
                        },
                        {
                            field: 'item_sold',
                            label: 'ขายไปแล้ว',
                            centered: true
                        }
                    ],
                    name: null,
                    price: 0,
                }
            }
        })

    </script>

</body>
</html>
