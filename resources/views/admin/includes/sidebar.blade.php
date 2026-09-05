<aside class="sidebar" id="sidebar">

    {{-- Brand --}}
    <div class="sidebar-brand">
        <div class="brand-icon">
            <i class="bi bi-mortarboard-fill"></i>
        </div>
        <span class="brand-text">Gta</span>
    </div>

    {{-- Navigation --}}
    <nav class="sidebar-nav">

        <div class="nav-label">{{ __('messages.main') }}</div>
        <ul>
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}"
                    class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-speedometer2"></i>
                    <span>{{ __('messages.dashboard') }}</span>
                </a>
            </li>
        </ul>

        <div class="nav-label">محتوى الموقع</div>
        <ul>
            <li class="nav-item">
                <a href="{{ route('admin.navbar.edit') }}"
                    class="nav-link {{ request()->routeIs('admin.navbar.*') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-menu-button-wide"></i>
                    <span>شريط التنقل</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.footer.edit') }}"
                    class="nav-link {{ request()->routeIs('admin.footer.*') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-layout-text-window-reverse"></i>
                    <span>التذييل</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.contact-info.edit') }}"
                    class="nav-link {{ request()->routeIs('admin.contact-info.*') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-telephone"></i>
                    <span>معلومات التواصل</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.hero.edit') }}"
                    class="nav-link {{ request()->routeIs('admin.hero.*') || request()->routeIs('admin.hero-stats.*') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-star"></i>
                    <span>قسم الهيرو</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.about.edit') }}"
                    class="nav-link {{ request()->routeIs('admin.about.*') || request()->routeIs('admin.about-pills.*') || request()->routeIs('admin.about-stats.*') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-info-circle"></i>
                    <span>قسم من نحن</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.services.index') }}"
                    class="nav-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-tools"></i>
                    <span>الخدمات</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.products.index') }}"
                    class="nav-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-box-seam"></i>
                    <span>المنتجات</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.catalog-items.index') }}"
                    class="nav-link {{ request()->routeIs('admin.catalog-items.*') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-file-earmark-pdf"></i>
                    <span>الداتا شيت</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.projects.index') }}"
                    class="nav-link {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-building"></i>
                    <span>المشاريع</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.agents.index') }}"
                    class="nav-link {{ request()->routeIs('admin.agents.*') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-person-badge"></i>
                    <span>وكلاؤنا</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.clients.index') }}"
                    class="nav-link {{ request()->routeIs('admin.clients.*') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-people"></i>
                    <span>العملاء</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.videos.index') }}"
                    class="nav-link {{ request()->routeIs('admin.videos.*') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-play-btn"></i>
                    <span>الفيديوهات (ريلز)</span>
                </a>
            </li>
        </ul>

    </nav>

    {{-- Sidebar Footer --}}
    <div class="sidebar-footer">
        <ul>
            <li class="nav-item">
                <a href="{{ route('admin.login.edit', auth('admin')->id()) }}" class="nav-link">
                    <i class="nav-icon bi bi-gear"></i>
                    <span>{{ __('messages.settings') }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link"
                    onclick="event.preventDefault(); document.getElementById('admin-logout-form').submit();">
                    <i class="nav-icon bi bi-box-arrow-right"></i>
                    <span>{{ __('messages.sign_out') }}</span>
                </a>
            </li>
        </ul>
        <button class="sidebar-collapse-btn" id="sidebarCollapseBtn" title="{{ __('messages.collapse_sidebar') }}">
            <i class="bi bi-arrow-bar-left"></i>
        </button>
    </div>

</aside>
