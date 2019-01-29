<?php $__env->startSection('showGerenciamento', 'show'); ?>
<?php $__env->startSection('activeRelatorio', 'active'); ?>
<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-sm-6 offset-sm-3 offset-md-3 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <i class="ti-user text-info icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right">Resultado das buscas</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0"><?php echo e($ocorrencias->count()); ?></h3>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted mt-3 mb-0">
                        <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> todas ocorrências encontradas
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 grid-margin strech-card">
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo e(route('searchRelatorio')); ?>" method="post" class="mb-3">
                        <?php echo csrf_field(); ?>

                        <div class="row">
                            <div class="col col-sm-4">
                                <div class="form-group">
                                    <label for="data_inicio">De:</label>
                                    <input type="text" class="form-control date" id="data_inicio" name="data_inicio" placeholder="Ex: 99/99/9999" required>
                                </div>
                            </div>
                            <div class="col col-sm-4">
                                <div class="form-group">
                                    <label for="data_fim">Até:</label>
                                    <input type="text" class="form-control date" id="data_fim" name="data_fim" placeholder="Ex: 99/99/9999" required>
                                </div>
                            </div>
                            <div class="col col-sm-4">
                                <div class="form-group mt-4">
                                    <button type="submit" class="btn btn-outline-primary">Pesquisar</button>
                                </div>
                            </div>
                        </div>

                    </form>

                    <span style="float: right;">
                        <button type="button" class="btn btn-outline-primary" onclick="generatePDF()">Imprimir</button>
                    </span>
                    <h4 class="card-title">Ocorrências</h4>
                    <p class="card-description">
                        Relatório de todas as ocorrências do sistema.
                    </p>

                    <div class="table-responsive">
                        <table class="table table-hover" id="tabelaRelatorio">
                            <thead>
                            <tr>
                                <th>Sócio</th>
                                <th>Data da Ocorrência</th>
                                <th>Título</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $ocorrencias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ocorrencia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($ocorrencia->socio->nome); ?></td>
                                    <td>
                                        <?php
                                            $date = new Date($ocorrencia->data_ocorrencia);
                                        echo $date->format('d/m/Y');
                                        ?>
                                    </td>
                                    <td><?php echo e($ocorrencia->titulo); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <?php echo e($ocorrencias->links()); ?>

                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        function generatePDF() {
            let pdf = new jsPDF();

            let res = pdf.autoTableHtmlToJson(document.getElementById("tabelaRelatorio"));


            pdf.autoTable(res.columns, res.data, {
                margin: {
                    top: 10
                },
                styles: {
                    fontSize: 12
                }
            });

            pdf.autoPrint({variant: 'non-conform'});
            window.open(pdf.output("bloburl"));
        }
        $(".date").inputmask({
            mask: ["99/99/9999"],
            keepStatic: true
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>