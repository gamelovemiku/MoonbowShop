<nav class="navbar is-black" role="navigation" aria-label="main navigation">
        <div class="container is-uppercase">
            <div class="navbar-brand">
                <a class="navbar-item">
                    <div><small style="font-size: 12px;">MOONBOWMC</small><br/><b>CONTROL PANEL</b></div>
                </a>
            
                <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                </a>
            </div>
            
            <div id="navbarBasicExample" class="navbar-menu">
                <div class="navbar-start">
                    <a class="navbar-item">
                        <i class="fas fa-shopping-bag" style="margin-right: 8px;"></i> STORE
                    </a>
                
                    <a class="navbar-item">
                        <i class="fas fa-boxes" style="margin-right: 8px;"></i>  REDEEM
                    </a>

                    <a class="navbar-item">
                        <i class="fas fa-diagnoses" style="margin-right: 8px;"></i> STATISTICS
                    </a>

                    <a class="navbar-item">
                        <i class="fab fa-discord" style="margin-right: 8px;"></i> FORUM
                    </a>
                </div>
            </div>
                <div class="navbar-end">
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            {{ Auth::user()->name }} <i class="fas fa-user" style="margin-left: 8px;"></i>
                        </a>
                    <div class="navbar-dropdown">
                        <a class="navbar-item">
                            Free daily item
                        </a>
                        <a class="navbar-item">
                            Topup
                        </a>
                        <a class="navbar-item" href="{{ route('logout') }}">
                            Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>