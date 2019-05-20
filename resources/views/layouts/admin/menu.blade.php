<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="user-wrapper">
                    <div class="profile-image">
                        @if(Auth::user()->category == 1)
                            <img src="{{ asset('https://image.flaticon.com/icons/svg/149/149074.svg') }}"
                                 alt="Perfil administrador">
                        @elseif(Auth::user()->category == 2)
                            <img src="{{ asset('https://image.flaticon.com/icons/svg/1264/1264779.svg') }}"
                                 alt="Perfil operador">
                        @endif
                    </div>
                    <div class="text-wrapper">
                        <p class="profile-name">
                            {{ Auth::user()->name }}
                        </p>
                        <div>
                            <small class="designation text-muted">

                                @if(Auth::user()->category == 1)
                                    Administrador
                                @elseif(Auth::user()->category == 2)
                                    Operador
                                @endif

                            </small>
                            <span class="status-indicator online"></span>
                        </div>

                    </div>
                </div>
                <a href="{{ route('ocorrencia.index') }}" class="btn btn-success">Nova ocorrência</a>
            </div>
        </li>
        <li class="nav-item @yield('dashActive')">
            <a class="nav-link" href="{{ route('admin') }}">
                <i class="menu-icon mdi mdi-television"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#controle" aria-expanded="false" aria-controls="controle">
                <i class="menu-icon ti-link"></i>
                <span class="menu-title">Controle</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse @yield('showControle')" id="controle">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link @yield('activeSocios')" href="{{ route('socios.index') }}">Sócios</a>
                    </li>

                    @can('admin')
                    <li class="nav-item">
                        <a class="nav-link @yield('activeImages')" href="{{ route('imagens.index') }}">Imagens</a>
                    </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('activeUsuarios')" href="{{ route('usuario.index') }}">Usuários</a>
                        </li>
                    @endcan
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ocorrencia" aria-expanded="false"
               aria-controls="ocorrencia">
                <i class="menu-icon ti-archive"></i>
                <span class="menu-title">Ocorrências</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse @yield('showGerenciamento')" id="ocorrencia">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link @yield('activeOcorrencia')" href="{{ route('ocorrencia.index') }}">Gerenciamento</a>
                    </li>

                    @can('admin')
                        <li class="nav-item">
                            <a class="nav-link @yield('activeRelatorio')" href="{{ route('relatorio.index') }}">Relatório</a>
                        </li>
                    @endcan
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#contact" aria-expanded="false"
               aria-controls="contact">
                <i class="menu-icon ti-agenda"></i>
                <span class="menu-title">Contato</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse @yield('showContact')" id="contact">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link @yield('activeSMS')" href="{{ route('sms.index') }}">SMS</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link @yield('activeEmail')" href="{{ route('email.create') }}">Email</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item @yield('ReceiptActive')">
            <a class="nav-link" href="{{ route('receipt.index') }}">
                <i class="menu-icon ti-bookmark-alt"></i>
                <span class="menu-title">Recibos</span>
            </a>
        </li>
    </ul>
</nav>
