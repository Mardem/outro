<?php if(Session::has('success')): ?>
    <script>
        swal({
            title: "Okay!",
            text: "<?php echo e(Session::get('success')); ?>",
            icon: "success"
        });
    </script>
<?php endif; ?>

<?php if(Session::has('error')): ?>
    <script>
        swal({
            title: "Opss...",
            text: "<?php echo e(Session::get('error')); ?>",
            icon: "error"
        });
    </script>
<?php endif; ?>