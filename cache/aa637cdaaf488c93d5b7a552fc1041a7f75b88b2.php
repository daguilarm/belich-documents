<li>
    <?php if($url = is_string($item) ? $item : $item->url): ?>
        <?php
            $url = str_replace('_location_', $page->locale, $url);
        ?>
        
        <a href="<?php echo e($page->url($url)); ?>"
            class="level-base <?php echo e('level-' . $level); ?> <?php echo e($page->isActive($url) ? 'active' : ''); ?> hover:text-blue-500"
        >
            <?php echo e($label); ?>

        </a>
    <?php else: ?>
        
        <p class="level-base <?php echo e('level-' . $level); ?>"><?php echo e($label); ?></p>
    <?php endif; ?>

    <?php if(! is_string($item) && $item->children): ?>
        
        <?php echo $__env->make('_nav.menu', ['items' => $item->children, 'level' => ++$level], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
</li>
<?php /**PATH /Users/daguilarm/Sites/belich-documents/source/_nav/menu-item.blade.php ENDPATH**/ ?>