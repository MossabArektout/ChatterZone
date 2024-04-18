<?php if (isset($component)) { $__componentOriginal5a2bbd0fc262bb39fed3532418250e13 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5a2bbd0fc262bb39fed3532418250e13 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.profile','data' => ['sharedData' => $sharedData,'doctitle' => ''.e($sharedData['username']).'\'s Profile']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('profile'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['sharedData' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($sharedData),'doctitle' => ''.e($sharedData['username']).'\'s Profile']); ?>
  <div class="list-group">
    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if (isset($component)) { $__componentOriginalbe59bb4860554bf4e18abcc14efde964 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbe59bb4860554bf4e18abcc14efde964 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.post','data' => ['post' => $post,'hideAuthor' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('post'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['post' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($post),'hideAuthor' => true]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbe59bb4860554bf4e18abcc14efde964)): ?>
<?php $attributes = $__attributesOriginalbe59bb4860554bf4e18abcc14efde964; ?>
<?php unset($__attributesOriginalbe59bb4860554bf4e18abcc14efde964); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbe59bb4860554bf4e18abcc14efde964)): ?>
<?php $component = $__componentOriginalbe59bb4860554bf4e18abcc14efde964; ?>
<?php unset($__componentOriginalbe59bb4860554bf4e18abcc14efde964); ?>
<?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5a2bbd0fc262bb39fed3532418250e13)): ?>
<?php $attributes = $__attributesOriginal5a2bbd0fc262bb39fed3532418250e13; ?>
<?php unset($__attributesOriginal5a2bbd0fc262bb39fed3532418250e13); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5a2bbd0fc262bb39fed3532418250e13)): ?>
<?php $component = $__componentOriginal5a2bbd0fc262bb39fed3532418250e13; ?>
<?php unset($__componentOriginal5a2bbd0fc262bb39fed3532418250e13); ?>
<?php endif; ?><?php /**PATH C:\Users\hp\Desktop\laravel-project\ourmainapp\resources\views/profile-posts.blade.php ENDPATH**/ ?>