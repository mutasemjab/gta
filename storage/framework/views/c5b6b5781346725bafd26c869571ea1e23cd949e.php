<footer>
  <div class="wrap">
    <div class="foot-grid">
      <div>
        <a class="brand" href="<?php echo e(url('/')); ?>#home">
          <?php if($navbar->logo): ?>
            <img src="<?php echo e($navbar->logo); ?>" alt="<?php echo e(app()->getLocale() === 'ar' ? $navbar->brand_name_ar : $navbar->brand_name_en); ?>">
          <?php endif; ?>
        </a>
        <p class="fabout"><?php echo e(app()->getLocale() === 'ar' ? $footer->about_ar : $footer->about_en); ?></p>
        <div class="socials">
          <?php if($footer->facebook_url): ?>
          <a href="<?php echo e($footer->facebook_url); ?>" aria-label="Facebook"><svg viewBox="0 0 24 24" fill="none" stroke-width="1.8"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg></a>
          <?php endif; ?>
          <?php if($footer->instagram_url): ?>
          <a href="<?php echo e($footer->instagram_url); ?>" aria-label="Instagram"><svg viewBox="0 0 24 24" fill="none" stroke-width="1.8"><rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1"/></svg></a>
          <?php endif; ?>
          <?php if($footer->linkedin_url): ?>
          <a href="<?php echo e($footer->linkedin_url); ?>" aria-label="LinkedIn"><svg viewBox="0 0 24 24" fill="none" stroke-width="1.8"><path d="M16 8a6 6 0 016 6v6h-4v-6a2 2 0 00-4 0v6h-4v-10h4v2a4 4 0 014-2z"/><rect x="2" y="9" width="4" height="11"/><circle cx="4" cy="4" r="2"/></svg></a>
          <?php endif; ?>
          <?php if($footer->whatsapp_url): ?>
          <a href="<?php echo e($footer->whatsapp_url); ?>" aria-label="WhatsApp"><svg viewBox="0 0 24 24" fill="none" stroke-width="1.8"><path d="M21 11.5a8.5 8.5 0 01-12.8 7.3L3 21l2.3-5.1A8.5 8.5 0 1121 11.5z"/></svg></a>
          <?php endif; ?>
        </div>
      </div>
      <div class="foot-col">
        <h4><?php echo e(__('messages.footer_explore')); ?></h4>
        <a href="#about"><?php echo e(__('messages.footer_link_about')); ?></a><a href="#services"><?php echo e(__('messages.footer_link_services')); ?></a>
        <a href="#products"><?php echo e(__('messages.footer_link_products')); ?></a><a href="#projects"><?php echo e(__('messages.footer_link_projects')); ?></a>
      </div>
      <div class="foot-col">
        <h4><?php echo e(__('messages.footer_products_col')); ?></h4>
        <?php $__currentLoopData = $products->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="#products"><?php echo e(app()->getLocale() === 'ar' ? $product->name_ar : $product->name_en); ?></a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <a href="#catalog"><?php echo e(__('messages.footer_link_catalog')); ?></a>
      </div>
      <div class="foot-col">
        <h4><?php echo e(__('messages.footer_contact_col')); ?></h4>
        <a href="tel:<?php echo e($contactInfo->phone); ?>"><?php echo e($contactInfo->phone); ?></a>
        <a href="mailto:<?php echo e($contactInfo->email); ?>"><?php echo e($contactInfo->email); ?></a>
        <a href="#contact"><?php echo e(app()->getLocale() === 'ar' ? $contactInfo->address_ar : $contactInfo->address_en); ?></a>
        <a href="#contact"><?php echo e(app()->getLocale() === 'ar' ? $contactInfo->hours_ar : $contactInfo->hours_en); ?></a>
      </div>
    </div>
    <div class="foot-bottom">
      <span><?php echo e(app()->getLocale() === 'ar' ? $footer->copyright_ar : $footer->copyright_en); ?></span>
      <?php if($footer->tagline_ar || $footer->tagline_en): ?>
      <span><?php echo e(app()->getLocale() === 'ar' ? $footer->tagline_ar : $footer->tagline_en); ?></span>
      <?php endif; ?>
    </div>
  </div>
</footer>
<?php /**PATH C:\xampp\htdocs\gta\resources\views/front/includes/footer.blade.php ENDPATH**/ ?>