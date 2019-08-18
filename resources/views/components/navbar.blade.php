<nav class="navbar is-light is-fixed-top">
    <div class="container is-uppercase">
        <div class="navbar-brand">
            <a class="navbar-item">
                <div>
                    <small style="font-size: 9px;">MOONBOWMC</small><br/>
                    <div style="margin-top: -12px;">Control Panel</div>
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
    
                    <a class="navbar-item" href="/statistics">
                        <i class="fas fa-diagnoses" style="margin-right: 8px;"></i> STATISTICS
                    </a>
    
                    <a class="navbar-item" href="/topup">
                        <i class="fas fa-donate" style="margin-right: 8px;"></i> TOPUP
                    </a>
    
                    <a class="navbar-item" href="/forum">
                        <i class="fab fa-discord" style="margin-right: 8px;"></i> FORUM
                    </a>
                </div>
                <div class="navbar-end">
                        <div class="navbar-item has-dropdown is-hoverable">
                            <a class="navbar-link"><i class="fas fa-user" style="margin-right: 8px;"></i>{{ Auth::user()->name }}</a>
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
        
                            <a href="/manage" class="navbar-item">
                                Manage Profile
                            </a>
        
                            <a class="navbar-item" href="{{ route('logout') }}">
                                Logout
                            </a>
                        </div>
                    </div>
            @endguest
        </div>
        </div>
    </div>
</nav>