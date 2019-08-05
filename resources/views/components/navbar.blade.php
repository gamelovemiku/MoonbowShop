<nav class="navbar is-black is-fixed-top">
    <div class="container is-uppercase">
        <div class="navbar-brand">
            <a class="navbar-item">
                <div><small style="font-size: 12px;">MOONBOWMC</small><br/><b>CONTROL PANEL</b></div>
            </a>
        </div>
        <div class="navbar-burger burger" data-target="navMenubd-example">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item" href="/home">
                    <i class="fas fa-home" style="margin-right: 8px;"></i> HOME
                </a>

                <a class="navbar-item" href="/store">
                    <i class="fas fa-shopping-bag" style="margin-right: 8px;"></i> STORE
                </a>

                <a class="navbar-item" href="/statistics">
                    <i class="fas fa-diagnoses" style="margin-right: 8px;"></i> STATISTICS
                </a>

                <a class="navbar-item" href="/topup">
                    <i class="fas fa-donate" style="margin-right: 8px;"></i> TOPUP
                </a>

                <a class="navbar-item" href="/about">
                    <i class="fas fa-share-alt" style="margin-right: 8px;"></i> About
                </a>

                <a class="navbar-item" href="/forum">
                    <i class="fab fa-discord" style="margin-right: 8px;"></i> FORUM
                </a>
            </div>
        </div>
            <div class="navbar-end">
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        <i class="fas fa-user" style="margin-right: 8px;"></i> {{ Auth::user()->name }} 
                    </a>
                <div class="navbar-dropdown is-boxed">

                    <a class="navbar-item">
                        Exchange Money
                    </a>

                    <a class="navbar-item">
                        Shop History
                    </a>

                    <a class="navbar-item">
                        Report / Feedback
                    </a>

                    <hr class="navbar-divider">

                    <a class="navbar-item">
                        Manage Profile
                    </a>

                    <a class="navbar-item" href="{{ route('logout') }}">
                        Logout
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>