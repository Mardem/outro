<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo">
            <img src="<?php echo e(asset('images/logo-200.png')); ?>" alt="">
        </a>

    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center">

        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown d-none d-xl-inline-block">
                <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                    <span class="profile-text">Olá, <?php echo e(Auth::user()->name); ?>!</span>

                    <?php if(Auth::user()->category == 1): ?>
                        <img class="img-xs rounded-circle" src="<?php echo e(asset('https://image.flaticon.com/icons/svg/149/149074.svg')); ?>"
                             alt="Perfil administrador">
                    <?php elseif(Auth::user()->category == 2): ?>
                        <img class="img-xs rounded-circle" src="<?php echo e(asset('https://image.flaticon.com/icons/svg/1264/1264779.svg')); ?>"
                             alt="Perfil operador" style="background: #fff; padding: 3px">
                    <?php endif; ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                    <a class="dropdown-item p-0">
                        <div class="d-flex border-bottom">
                            <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                                <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
                            </div>
                            <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                                <i class="mdi mdi-account-outline mr-0 text-gray"></i>
                            </div>
                            <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                                <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
                            </div>
                        </div>
                    </a>
                    <a class="dropdown-item text-danger" href="#" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        Sair
                    </a>

                    <form action="<?php echo e(route('logout')); ?>" id="logout-form" method="post" style="display: none;">
                        <?php echo csrf_field(); ?>
                    </form>
                    
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>