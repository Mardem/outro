<div class="form-group">
    <form action="<?php echo e(route('search')); ?>" method="post" id="form-search">
        <?php echo csrf_field(); ?>

        <?php echo e($slot); ?>


        <div class="input-group">
            <input type="text" id="pesquisa" name="search" placeholder=" Pesquisar..." aria-label="Username"
                   aria-describedby="colored-addon3">
            <div class="input-group-append bg-primary border-primary">
                                    <span class="input-group-text bg-transparent search" id="sendSearch">
                                      <i class="ti-search text-white"></i>
                                    </span>
            </div>
        </div>
    </form>
</div>