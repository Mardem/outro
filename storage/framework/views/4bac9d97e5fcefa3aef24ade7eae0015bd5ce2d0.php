<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="user-wrapper">
                    <div class="profile-image">
                        <?php if(Auth::user()->category == 1): ?>
                            <img src="<?php echo e(asset('https://image.flaticon.com/icons/svg/149/149074.svg')); ?>"
                                 alt="Perfil administrador">
                        <?php elseif(Auth::user()->category == 2): ?>
                            <img src="<?php echo e(asset('https://image.flaticon.com/icons/svg/1264/1264779.svg')); ?>"
                                 alt="Perfil operador">
                        <?php endif; ?>
                    </div>
                    <div class="text-wrapper">
                        <p class="profile-name">
                            <?php echo e(Auth::user()->name); ?>

                        </p>
                        <div>
                            <small class="designation text-muted">

                                <?php if(Auth::user()->category == 1): ?>
                                    Administrador
                                <?php elseif(Auth::user()->category == 2): ?>
                                    Operador
                                <?php endif; ?>

                            </small>
                            <span class="status-indicator online"></span>
                        </div>

                    </div>
                </div>
                <a href="<?php echo e(route('ocorrencia.index')); ?>" class="btn btn-success">Nova ocorrência</a>
            </div>
        </li>
        <li class="nav-item <?php echo $__env->yieldContent('dashActive'); ?>">
            <a class="nav-link" href="<?php echo e(route('admin')); ?>">
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
            <div class="collapse <?php echo $__env->yieldContent('showControle'); ?>" id="controle">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link <?php echo $__env->yieldContent('activeSocios'); ?>" href="<?php echo e(route('socios.index')); ?>">Sócios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $__env->yieldContent('activeImages'); ?>" href="<?php echo e(route('imagens.index')); ?>">Imagens</a>
                    </li>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
                        <li class="nav-item">
                            <a class="nav-link <?php echo $__env->yieldContent('activeUsuarios'); ?>" href="<?php echo e(route('usuario.index')); ?>">Usuários</a>
                        </li>
                    <?php endif; ?>
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
            <div class="collapse <?php echo $__env->yieldContent('showGerenciamento'); ?>" id="ocorrencia">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link <?php echo $__env->yieldContent('activeOcorrencia'); ?>" href="<?php echo e(route('ocorrencia.index')); ?>">Gerenciamento</a>
                    </li>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
                        <li class="nav-item">
                            <a class="nav-link <?php echo $__env->yieldContent('activeRelatorio'); ?>" href="<?php echo e(route('relatorio.index')); ?>">Relatório</a>
                        </li>
                    <?php endif; ?>
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
            <div class="collapse <?php echo $__env->yieldContent('showContact'); ?>" id="contact">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link <?php echo $__env->yieldContent('activeSMS'); ?>" href="<?php echo e(route('sms.index')); ?>">SMS</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?php echo $__env->yieldContent('activeEmail'); ?>" href="<?php echo e(route('email.create')); ?>">Email</a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</nav>