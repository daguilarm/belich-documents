<?php $level = $level ?? 0 ?>
<ul class="my-0">
    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $labelLocale = explode('||', $label);
            $label = $page->locale === 'en' ? $labelLocale[0] : $labelLocale[1];
        ?>
        <?php echo $__env->make('_nav.menu-item', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php /**PATH /Users/daguilarm/Sites/belich-documents/source/_nav/menu.blade.php ENDPATH**/ ?>