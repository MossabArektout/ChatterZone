<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title><?php if(isset($doctitle)): ?>
      <?php echo e($doctitle); ?> | ChatterZone
      <?php else: ?>
      ChatterZone
      <?php endif; ?>
    </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
    <script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js" integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet" />
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css']); ?>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/js/app.js']); ?>
  </head>
  <body>
    <header class="header-bar mb-3">
      <div class="container d-flex flex-column flex-md-row align-items-center p-3">
        <h4 class="my-0 mr-md-auto font-weight-normal"><a href="/" class="text-white">ChatterZone</a></h4>
        
        <?php if(auth()->guard()->check()): ?>
        <div class="flex-row my-3 my-md-0">
          <a href="#" class="text-white mr-2 header-search-icon" title="Search" data-toggle="tooltip" data-placement="bottom"><i class="fas fa-search"></i></a>
          <span class="text-white mr-2 header-chat-icon" title="Chat" data-toggle="tooltip" data-placement="bottom"><i class="fas fa-comment"></i></span>
          <a href="/profile/<?php echo e(auth()->user()->username); ?>" class="mr-2"><img title="My Profile" data-toggle="tooltip" data-placement="bottom" style="width: 32px; height: 32px; border-radius: 16px" src="https://gravatar.com/avatar/f64fc44c03a8a7eb1d52502950879659?s=128" /></a>
          <a class="btn btn-sm btn-success mr-2" href="/create-post">Create Post</a>
          <form action="/logout" method="POST" class="d-inline">
            <?php echo csrf_field(); ?>
            <button class="btn btn-sm btn-secondary">Sign Out</button>
          </form>
        </div> 
        <?php else: ?>
        <form action="/login" method="POST" class="mb-0 pt-2 pt-md-0">
          <?php echo csrf_field(); ?>
          <div class="row align-items-center">
            <div class="col-md mr-0 pr-md-0 mb-3 mb-md-0">
              <input name="loginusername" class="form-control form-control-sm input-dark" type="text" placeholder="Username" autocomplete="off" />
            </div>
            <div class="col-md mr-0 pr-md-0 mb-3 mb-md-0">
              <input name="loginpassword" class="form-control form-control-sm input-dark" type="password" placeholder="Password" />
            </div>
            <div class="col-md-auto">
              <button class="btn btn-primary btn-sm">Sign In</button>
            </div>
          </div>
        </form>
        <?php endif; ?>

        
      </div>
    </header>
    <!-- header ends here -->

    <?php if(session() -> has('success')): ?>
    <div class="container container--narrow">
      <div class="alert alert-success text-center">
        <?php echo e(session('success')); ?>

      </div>
    </div>
    <?php endif; ?>

    <?php if(session() -> has('failure')): ?>
    <div class="container container--narrow">
      <div class="alert alert-danger text-center">
        <?php echo e(session('failure')); ?>

      </div>
    </div>
    <?php endif; ?>

    <?php echo e($slot); ?>


    <!-- footer begins -->
    <footer class="border-top text-center small text-muted py-3">
        <p class="m-0">Copyright &copy; <?php echo e(date('Y')); ?> <a href="/" class="text-muted">OurApp</a>. All rights reserved.</p>
    </footer>

    <?php if(auth()->guard()->check()): ?>
    <div date-username="<?php echo e(auth()->user()->username); ?>" data-avatat="<?php echo e(auth()->user()->avatar); ?>" id="chat-wrapper" class="chat-wrapper shadow border-top border-left border-right"></div>
    <?php endif; ?>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script>
        $('[data-toggle="tooltip"]').tooltip()
    </script>
    </body>
</html><?php /**PATH C:\Users\hp\Desktop\laravel-project\ourmainapp\resources\views/components/layout.blade.php ENDPATH**/ ?>