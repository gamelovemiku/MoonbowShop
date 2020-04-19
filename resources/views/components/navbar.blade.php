<nav class="navbar is-black is-fixed-top">
    <div class="container is-uppercase">
        <div class="navbar-brand">
            <a class="navbar-item">
                <div>
                    <small style="font-size: 9px;">SHELTERMC's</small><br/>
                    <div style="margin-top: -12px;">
                        @hasSection ('header-text')
                            @yield('header-text')
                        @else
                            Control Panel
                        @endif

                    </div>
                </div>
            </a>

            <a role="button" class="navbar-burger">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div class="navbar-menu">
            @guest

            <div class="navbar-start">
                <a class="navbar-item" href="/forum">
                    <i class="fab fa-discord" style="margin-right: 8px;"></i> FORUM
                </a>
            </div>

            <li class="navbar-end">
                <a class="navbar-item" href="{{ route('login') }}">
                    <i class="fas fa-sign-in-alt" style="margin-right: 8px;"></i> {{ __('Login') }}
                </a>
                <a class="navbar-item" href="{{ route('register') }}">
                    <i class="fas fa-user-plus" style="margin-right: 8px;"></i> {{ __('Register') }}
                </a>
            </li>
            @else
                <div class="navbar-start">

                    <a class="navbar-item" href="/home">
                        <i class="fas fa-home" style="margin-right: 8px;"></i> HOME
                    </a>

                    <a class="navbar-item" href="/store">
                        <i class="fas fa-shopping-bag" style="margin-right: 8px;"></i> STORE
                    </a>

                    <!--a-- class="navbar-item" href="{{ route('arcade.index') }}">
                        <i class="fas fa-dice" style="margin-right: 8px;"></i> ARCADE <p style="margin-left: 0.5rem; font-size: 8px;" class="tag is-small is-warning">New</p>
                    </!--a-->

                    <a class="navbar-item" href="/boosters">
                        <i class="fas fa-diagnoses" style="margin-right: 8px;"></i> BOOSTERS
                    </a>

                    <a class="navbar-item" href="/topup">
                        <i class="fas fa-donate" style="margin-right: 8px;"></i> TOPUP
                    </a>

                    <a class="navbar-item" href="/forum">
                        <i class="fab fa-discord" style="margin-right: 8px;"></i> FORUM
                    </a>
                </div>
                <div class="navbar-end">
                    @if(Auth::user()->role->role_id == 1)

                    <div class="navbar-item has-dropdown is-hoverable" href="{{ route('admin.controlpanel') }}">
                        <a class="navbar-link"><i class="fas fa-cogs" style="margin-right: 8px;"></i> แผงควบคุม</a>

                        <div class="navbar-dropdown is-boxed">

                            <p class="navbar-title">
                                ร้านค้าและไอเท็ม
                            </p>

                            <a href="{{ route('item.index') }}" class="navbar-item">
                                <i class="fas fa-shopping-cart" style="margin-right: 8px;"></i> ร้านค้า
                            </a>

                            <a href="{{ route('redeem.index') }}" class="navbar-item">
                                <i class="fas fa-gifts" style="margin-right: 8px;"></i> โค๊ดแลกรางวัล
                            </a>

                            <a href="{{ route('category.index') }}" class="navbar-item">
                                <i class="fas fa-question-circle" style="margin-right: 8px;"></i> สุ่มรางวัล
                            </a>

                            <a href="{{ route('category.index') }}" class="navbar-item">
                                <i class="fas fa-dice" style="margin-right: 8px;"></i> ลานบันเทิง
                            </a>

                            <hr class="navbar-divider">

                            <p class="navbar-title">
                                การควบคุมระบบ
                            </p>

                            <a href="{{ route('dashboard.index') }}" class="navbar-item">
                                <i class="fas fa-file-invoice" style="margin-right: 8px;"></i> ภาพรวม
                            </a>

                            <a href="{{ route('usereditor.index') }}" class="navbar-item">
                                <i class="fas fa-user-edit" style="margin-right: 8px;"></i> ตัวจัดการผู้ใช้
                            </a>

                            <a href="{{ route('notice.index') }}" class="navbar-item">
                                <i class="fas fa-bullhorn" style="margin-right: 8px;"></i> ประกาศ
                            </a>

                            <a href="{{ route('commandsender') }}" class="navbar-item">
                                <i class="fas fa-terminal" style="margin-right: 8px;"></i> ตัวส่งคำสั่ง
                            </a>

                            <a href="{{ route('recyclebin.index') }}" class="navbar-item">
                                <i class="fas fa-recycle" style="margin-right: 8px;"></i> ถังขยะ
                            </a>

                            <hr class="navbar-divider">

                            <p class="navbar-title">
                                ระบบ
                            </p>

                            <a href="{{ route('settings.index') }}" class="navbar-item">
                                <i class="fas fa-info-circle" style="margin-right: 8px;"></i> การตั้งค่าทั่วไป
                            </a>

                            <a href="{{ route('paymentplan.index') }}" class="navbar-item">
                                <i class="fas fa-credit-card" style="margin-right: 8px;"></i> ตั้งค่าการเติมเงิน
                            </a>

                            <a href="{{ route('paymentplan.index') }}" class="navbar-item">
                                <i class="fas fa-plug" style="margin-right: 8px;"></i> ส่วนเสริม
                            </a>

                        </div>
                    </div>

                    @endif
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link"><i class="fas fa-user" style="margin-right: 8px;"></i>{{ Auth::user()->name }}</a>
                        <div class="navbar-dropdown is-boxed">

                            <p class="navbar-title">
                                ทั่วไป
                            </p>

                            <a href="{{ route('pocket.index') }}" class="navbar-item">
                                <i class="fas fa-inbox" style="margin-right: 8px;"></i> กระเป๋าเก็บของ
                            </a>

                            <a href="{{ route('history.index') }}" class="navbar-item">
                                <i class="fas fa-flag-checkered" style="margin-right: 8px;"></i> ประวัติกิจกรรมบัญชี
                            </a>

                            <a href="{{ route('history.index') }}" class="navbar-item">
                                <i class="fas fa-receipt" style="margin-right: 8px;"></i> ประวัติการจ่ายเงิน
                            </a>

                            <hr class="navbar-divider">

                            <p class="navbar-title">
                                บัญชี
                            </p>

                            <a href="{{ route('profile.index') }}" class="navbar-item">
                                <i class="fas fa-user-cog" style="margin-right: 8px;"></i> โปรไฟล์
                            </a>

                            <a class="navbar-item" href="{{ route('logout') }}">
                                ออกจากระบบ
                            </a>
                        </div>
                    </div>
            @endguest
        </div>
    </div>

</nav>
