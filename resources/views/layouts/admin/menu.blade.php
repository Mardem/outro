<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="user-wrapper">
                    <div class="profile-image">
                        <img src="{{ asset('https://image.flaticon.com/icons/svg/149/149074.svg') }}" alt="profile image">
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
                <a href="#" class="btn btn-success">Novo chamado</a>
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
                    <li class="nav-item @yield('activeSocios')">
                        <a class="nav-link" href="{{ route('socios.index') }}">Sócios</a>
                    </li>
                    <li class="nav-item @yield('activeUsuarios')">
                        <a class="nav-link" href="{{ route('usuario.index') }}">Usuários</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ocorrencia" aria-expanded="false" aria-controls="ocorrencia">
                <i class="menu-icon ti-archive"></i>
                <span class="menu-title">Ocorrências</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse @yield('showGerenciamento')"  id="ocorrencia">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item @yield('activeOcorrencia')">
                        <a class="nav-link" href="{{ route('ocorrencia.index') }}">Gerenciamento</a>
                    </li>
                    <li class="nav-item @yield('activeRelatorio')">
                        <a class="nav-link" href="{{ route('relatorio.index') }}">Relatório Geral</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#contato" aria-expanded="false" aria-controls="contato">
                <i class="menu-icon ti-agenda"></i>
                <span class="menu-title">Contato</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse @yield('showContato')" id="contato">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="#">SMS</a>
                    </li>
                    <li class="nav-item @yield('activeEmail')">
                        <a class="nav-link" href="{{ route('email.create') }}">Email</a>
                    </li>
                </ul>
            </div>
        </li>

    </ul>
</nav>