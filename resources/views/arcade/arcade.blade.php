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

    html, .hero.is-black {
        background-color: #08050A;
    }

    .navbar.is-black {
        background-color: #460277;
    }

    hover:.navbar.is-black {
        background-color: #460277;
    }

    ::-webkit-scrollbar-thumb {
        background: #460277;
    }

    ::-webkit-scrollbar-track {
        background-color: #08050A;
    }

</style>

@section('header-text')
    Arcade
@endsection

<body>
    @include('components.navbar')
    <section class="hero is-large is-info space-for-navbar" style="background-image: url('/storage/backend/background/arcade_bg.gif'); background-position: center; background-repeat: no-repeat; background-size: cover;">
        <div class="hero-body">
            <div class="container is-uppercase">
                <h1 class="title is-1 force-bold">
                    Arcade
                </h1>

                <h2 class="subtitle">
                    สถานที่จะรวบรวมกิจกรรมต่างๆ ที่จัดขึ้นควบคู่กับกิจกรรมภายในเกม<br> สำหรับงานวันต่างๆที่เกิดขึ้นรวมไปถึงมีกิจกรรมให้ผู้เล่นได้เล่น เช่น กล่องสุ่มของ <br>จับฉลาก แลกของขวัญ หรือแม้กระทั่งส่งของขวัญให้เพื่อน
                </h2>

                ขณะนี้คุณมีพ้อยท์อยู่ <a class="has-text-warning">{{ number_format(Auth::user()->points_balance) }} พ้อยท์</a> เอาไปใช้ได้เลย!

            </div>
        </div>
    </section>
    <section class="hero is-large is-black">
        <div class="hero-body">
            <div class="container is-uppercase">
                <h1 class="title is-1 force-bold">
                    Features <a style="font-size: 1rem">Beta</a>
                </h1>

                <p class="subtitle">
                    สิ่งที่คุณสามารถทำได้บน Arcade
                </p>

                <div class="columns is-multiline">
                    <div class="column is-3">
                        <h4 class="title is-4">
                            สุ่มรางวัล <p class="tag is-danger is-small force-bold" style="font-size: 9px;">Current Developing..</p>
                        </h4>
                        <p class="subtitle is-6">
                            ได้รางวัลจากการสุ่มของโดยใช้พ้อยท์ในการสุ่มรางวัล
                        </p>
                    </div>
                    <div class="column is-3">
                        <h4 class="title is-4">
                            เพิ่มอัตราในเกม
                        </h4>
                        <p class="subtitle is-6">
                            ได้รับไอเท็มหรือค่าต่างๆ มากขึ้นเป็นทวีคูณ
                        </p>
                    </div>
                    <div class="column is-3">
                        <h4 class="title is-4">
                            ร้านค้าผู้เล่นออนไลน์
                        </h4>
                        <p class="subtitle is-6">
                            ขายไอเท็มได้เองเหมือนซื้อจากร้านค้าหลัก
                        </p>
                    </div>
                    <div class="column is-3">
                        <h4 class="title is-4">
                            ส่งของให้คนอื่น
                        </h4>
                        <p class="subtitle is-6">
                            สร้างรหัสแลกให้ผู้อื่นได้รับสิ่งของ
                        </p>
                    </div>

                    <div class="column is-3">
                        <h4 class="title is-4">
                            ซื้อตั๋วเข้าโซน
                        </h4>
                        <p class="subtitle is-6">
                            บางที่ในเซิร์ฟเวอร์ต้องมีตั๋วก่อนเข้า
                        </p>
                    </div>

                    <div class="column is-3">
                        <h4 class="title is-4">
                            แลกเงินเข้าเกม
                        </h4>
                        <p class="subtitle is-6">
                            เปลี่ยนจากพ้อยท์ให้เป็นเงินภายในเกม
                        </p>
                    </div>

                    <div class="column is-3">
                        <h4 class="title is-4">
                            ประมูลสินค้า
                        </h4>
                        <p class="subtitle is-6">
                            เมื่อของมันหายากต้องมีคนอยากได้
                        </p>
                    </div>

                    <div class="column is-3">
                        <h4 class="title is-4">
                            แคลนอารีน่า
                        </h4>
                        <p class="subtitle is-6">
                            เพราะโลกนี้ทุกคนไม่ได้เป็นมิตรกัน
                        </p>
                    </div>

                    <div class="column is-12 has-text-centered">

                        <a href="{{ route('central.index') }}" class="button is-large has-text-white" style="margin-top: 6rem; background: #6700b3; font-color: white; border-color: #460277">
                            เข้าสู่ Arcade Central
                        </a>

                        <p class="content is-small"  style="margin-top: 1rem;">
                            คำเตือน: ระวังพ้อยท์หมด
                        </p>

                    </div>
                </div>

            </div>
        </div>
    </section>
</body>

</html>
