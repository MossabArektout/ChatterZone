<?php if (isset($component)) { $__componentOriginal23a33f287873b564aaf305a1526eada4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal23a33f287873b564aaf305a1526eada4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout','data' => ['doctitle' => $doctitle]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['doctitle' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($doctitle)]); ?>
    <div class="container py-md-5 container--narrow">
        <h2>
          <img class="avatar-small" src="https://gravatar.com/avatar/b9408a09298632b5151200f3449434ef?s=128" /> <?php echo e($sharedData['username']); ?>

          <?php if(auth()->guard()->check()): ?>
          <?php if(!$sharedData['currentlyFollowing'] AND auth()->user()->username != $sharedData['username']): ?>
          <form class="ml-2 d-inline" action="/create-follow/<?php echo e($sharedData['username']); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <button class="btn btn-primary btn-sm">Follow <i class="fas fa-user-plus"></i></button>
          </form>
          <?php endif; ?>

          <?php if($sharedData['currentlyFollowing']): ?>
          <form class="ml-2 d-inline" action="/remove-follow/<?php echo e($sharedData['username']); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <button class="btn btn-danger btn-sm">Stop Following <i class="fas fa-user-times"></i></button>
          </form>
          <?php endif; ?>
          <?php if(auth()->user()->username == $sharedData['username']): ?>
          <a href="/manage-avatar" class="btn btn-secondary btn-sm">Manage Avatar</a>
          <?php endif; ?>
          <?php endif; ?>
        </h2>
  
        <div class="profile-nav nav nav-tabs pt-2 mb-4">
          <a href="/profile/<?php echo e($sharedData['username']); ?>" class="profile-nav-link nav-item nav-link <?php echo e(Request::segment(3) == "" ? "active" : ""); ?>">Posts: <?php echo e($sharedData['postCount']); ?></a>
          <a href="/profile/<?php echo e($sharedData['username']); ?>/followers" class="profile-nav-link nav-item nav-link" <?php echo e(Request::segment(3) == "followers" ? "active" : ""); ?>>Followers: <?php echo e($sharedData['followerCount']); ?></a>
          <a href="/profile/<?php echo e($sharedData['username']); ?>/following" class="profile-nav-link nav-item nav-link" <?php echo e(Request::segment(3) == "following" ? "active" : ""); ?>>Following: <?php echo e($sharedData['followingCount']); ?></a>
        </div>

        <div class="profile-slot-content">
            <?php echo e($slot); ?>

        </div>
      </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $attributes = $__attributesOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__attributesOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $component = $__componentOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__componentOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?><?php /**PATH C:\Users\hp\Desktop\laravel-project\ourmainapp\resources\views/components/profile.blade.php ENDPATH**/ ?>