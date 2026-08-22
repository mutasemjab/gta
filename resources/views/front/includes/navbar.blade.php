<header class="nav" id="nav">
  <div class="wrap nav-in">
    <a href="{{ url('/') }}#home" class="brand">
      @if($navbar->logo)
        <img src="{{ $navbar->logo }}" alt="{{ app()->getLocale() === 'ar' ? $navbar->brand_name_ar : $navbar->brand_name_en }}">
      @else
        <span>{{ app()->getLocale() === 'ar' ? $navbar->brand_name_ar : $navbar->brand_name_en }}</span>
      @endif
    </a>
    <ul class="nav-links" id="navLinks">
      <li><a href="#home">{{ __('messages.nav_home') }}</a></li>
      <li><a href="#about">{{ __('messages.nav_about') }}</a></li>
      <li><a href="#services">{{ __('messages.nav_services') }}</a></li>
      <li><a href="#products">{{ __('messages.nav_products') }}</a></li>
      <li><a href="#catalog">{{ __('messages.nav_catalog') }}</a></li>
      <li><a href="#projects">{{ __('messages.nav_projects') }}</a></li>
      <li><a href="#clients">{{ __('messages.nav_clients') }}</a></li>
      <li><a href="#reels">{{ __('messages.nav_reels') }}</a></li>
      <li><a href="#contact">{{ __('messages.nav_contact') }}</a></li>
    </ul>
    <div class="nav-cta">
      @foreach(LaravelLocalization::getSupportedLocales() as $locale => $properties)
        @if($locale !== app()->getLocale())
          <a href="{{ LaravelLocalization::getLocalizedURL($locale, null, [], true) }}" class="btn btn-ghost lang-switch">
            {{ strtoupper($locale) }}
          </a>
        @endif
      @endforeach
      <a href="#contact" class="btn btn-primary">{{ __('messages.nav_cta') }}
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
      </a>
      <button class="burger" id="burger" aria-label="Menu"><span></span><span></span><span></span></button>
    </div>
  </div>
</header>
