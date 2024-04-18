<a href="/post/<?php echo e($post->id); ?>" class="list-group-item list-group-item-action">
    <img class="avatar-tiny" src="https://gravatar.com/avatar/b9408a09298632b5151200f3449434ef?s=128" />
    <strong><?php echo e($post -> title); ?></strong> 
    <span class="text-muted small"> 
        <?php if(isset($hideAuthor)): ?>
        by <?php echo e($post->user->username); ?>

        <?php endif; ?> 
        on <?php echo e($post->created_at->format('n/j/Y')); ?>

    </span>
</a><?php /**PATH C:\Users\hp\Desktop\laravel-project\ourmainapp\resources\views/components/post.blade.php ENDPATH**/ ?>