<?php if (isset($component)) { $__componentOriginal5a2bbd0fc262bb39fed3532418250e13 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5a2bbd0fc262bb39fed3532418250e13 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.profile','data' => ['sharedData' => $sharedData,'doctitle' => ''.e($sharedData['username']).'\'s Followers']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('profile'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['sharedData' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($sharedData),'doctitle' => ''.e($sharedData['username']).'\'s Followers']); ?>
    <div class="list-group">
      <?php $__currentLoopData = $followers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $follow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <a href="/profile/<?php echo e($follow->userDoingTheFollowing->username); ?>" class="list-group-item list-group-item-action">
        <img class="avatar-tiny" src="https://gravatar.com/avatar/b9408a09298632b5151200f3449434ef?s=128" />
        <?php echo e($follow->userDoingTheFollowing->username); ?>

      </a>
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
<?php endif; ?><?php /**PATH C:\Users\hp\Desktop\laravel-project\ourmainapp\resources\views/profile-followers.blade.php ENDPATH**/ ?>