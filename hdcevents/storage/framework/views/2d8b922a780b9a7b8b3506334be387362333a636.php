<?php $__env->startSection('title', 'HDC Events'); ?>

<?php $__env->startSection('content'); ?>

<div id="search-container" class="col-md-12">
    <h1>Busque um evento</h1>
    <form action="/" method="GET">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar">
    </form>
</div>

<div id="events-container" class="col-md-12">
    <?php if($search): ?>
        <h2>Próximos Eventos</h2>
        <p class="subtitle">Veja os eventos dos próximos dias.</p>

        <div id="cards-container" class="row">
            <?php if(count($events) == 0): ?>
                <p>Não foi possível encontrar nenhum evento com "<?php echo e($search); ?>"! <a href="/">Ver todos</a>.</p>
            <?php else: ?>
                <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card col-md-3">
                        <img src="/img/events/<?php echo e($event->image); ?>" alt="<?php echo e($event->title); ?>">
                        <div class="card-body">
                            <p class="card-date"><?php echo e(date('d/m/Y', strtotime($event->date))); ?></p>
                            <h5 class="card-title"><?php echo e($event->title); ?></h5>
                            <p class="card-participants">X participantes</p>
                            <a href="/events/<?php echo e($event->id); ?>" class="btn btn-primary">Saber mais</a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    <?php else: ?>
        <p>Preencha o campo de busca para encontrar eventos.</p>
    <?php endif; ?>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Toledo\OneDrive\Área de Trabalho\ProjectsPHP\LaravelMatheusBat\hdcevents\resources\views/welcome.blade.php ENDPATH**/ ?>