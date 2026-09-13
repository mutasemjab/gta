<header class="nav" id="nav">
  <div class="wrap nav-in">
    <a href="<?php echo e(url('/')); ?>#home" class="brand">
      <?php if($navbar->logo): ?>
        <img src="<?php echo e($navbar->logo); ?>" alt="<?php echo e(app()->getLocale() === 'ar' ? $navbar->brand_name_ar : $navbar->brand_name_en); ?>">
      <?php else: ?>
        <span><?php echo e(app()->getLocale() === 'ar' ? $navbar->brand_name_ar : $navbar->brand_name_en); ?></span>
      <?php endif; ?>
    </a>
    <ul class="nav-links" id="navLinks">
      <li><a href="#home"><?php echo e(__('messages.nav_home')); ?></a></li>
      <li><a href="#about"><?php echo e(__('messages.nav_about')); ?></a></li>
      <li><a href="#services"><?php echo e(__('messages.nav_services')); ?></a></li>
      <li><a href="#products"><?php echo e(__('messages.nav_products')); ?></a></li>
      <li><a href="#catalog"><?php echo e(__('messages.nav_catalog')); ?></a></li>
      <li><a href="#projects"><?php echo e(__('messages.nav_projects')); ?></a></li>
      <li><a href="#agents"><?php echo e(__('messages.nav_agents')); ?></a></li>
      <li><a href="#clients"><?php echo e(__('messages.nav_clients')); ?></a></li>
      <li><a href="#reels"><?php echo e(__('messages.nav_reels')); ?></a></li>
      <li><a href="#contact"><?php echo e(__('messages.nav_contact')); ?></a></li>
    </ul>
    <div class="nav-cta">
      <?php $__currentLoopData = LaravelLocalization::getSupportedLocales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale => $properties): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($locale !== app()->getLocale()): ?>
          <a href="<?php echo e(LaravelLocalization::getLocalizedURL($locale, null, [], true)); ?>" class="btn btn-ghost lang-switch">
            <?php echo e(strtoupper($locale)); ?>

          </a>
        <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <a href="#contact" class="btn btn-primary"><?php echo e(__('messages.nav_cta')); ?>

        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
      </a>
      <button class="burger" id="burger" aria-label="Menu"><span></span><span></span><span></span></button>
    </div>
  </div>
</header>
<?php /**PATH C:\xampp\htdocs\gta\resources\views/front/includes/navbar.blade.php ENDPATH**/ ?>