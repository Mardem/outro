<div class="form-group">
    <form action="<?php echo e(route('search')); ?>" method="post" id="form-search">
        <?php echo csrf_field(); ?>

        <?php echo e($slot); ?>


        <div class="form-group">
            <div class="form-group col-md-4">
                <label for="email">Sócio*:</label>
                <input type="text" id="email" name="search" aria-label="Username"
                    aria-describedby="colored-addon3">
            </div>
        </div>
    </form>
</div>