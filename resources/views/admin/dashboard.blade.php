@extends('admin.layouts.app')

@section('title', __('messages.dashboard'))

@section('content')

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div>
        <h1 class="page-title">{{ __('messages.dashboard') }}</h1>
        <p class="page-sub">{{ __('messages.dashboard_subtitle') }}</p>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-4">
        {{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="row g-3 mb-4">
    <div class="col-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon" style="background:#eff6ff;color:#2563eb"><i class="bi bi-tools"></i></div>
            <div class="stat-value">{{ number_format($stats['services']) }}</div>
            <div class="stat-label">{{ __('messages.stat_services') }}</div>
        </div>
    </div>
    <div class="col-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon" style="background:#f0fdf4;color:#059669"><i class="bi bi-box-seam"></i></div>
            <div class="stat-value">{{ number_format($stats['products']) }}</div>
            <div class="stat-label">{{ __('messages.stat_products') }}</div>
        </div>
    </div>
    <div class="col-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon" style="background:#faf5ff;color:#7c3aed"><i class="bi bi-building"></i></div>
            <div class="stat-value">{{ number_format($stats['projects']) }}</div>
            <div class="stat-label">{{ __('messages.stat_projects') }}</div>
        </div>
    </div>
    <div class="col-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon" style="background:#fff7ed;color:#ea580c"><i class="bi bi-people"></i></div>
            <div class="stat-value">{{ number_format($stats['clients']) }}</div>
            <div class="stat-label">{{ __('messages.stat_clients') }}</div>
        </div>
    </div>
</div>

<div class="panel-card">
    <div class="panel-card-header">
        <h2 class="panel-card-title"><i class="bi bi-lightning"></i> {{ __('messages.quick_actions') }}</h2>
    </div>
    <div class="panel-card-body">
        <div class="row g-2">
            <div class="col-6 col-md-3"><a href="{{ route('admin.hero.edit') }}" class="btn-outline-sm w-100 justify-content-center">{{ __('messages.section_hero') }}</a></div>
            <div class="col-6 col-md-3"><a href="{{ route('admin.about.edit') }}" class="btn-outline-sm w-100 justify-content-center">{{ __('messages.section_about') }}</a></div>
            <div class="col-6 col-md-3"><a href="{{ route('admin.services.index') }}" class="btn-outline-sm w-100 justify-content-center">{{ __('messages.stat_services') }}</a></div>
            <div class="col-6 col-md-3"><a href="{{ route('admin.products.index') }}" class="btn-outline-sm w-100 justify-content-center">{{ __('messages.stat_products') }}</a></div>
            <div class="col-6 col-md-3"><a href="{{ route('admin.catalog-items.index') }}" class="btn-outline-sm w-100 justify-content-center">{{ __('messages.catalog') }}</a></div>
            <div class="col-6 col-md-3"><a href="{{ route('admin.projects.index') }}" class="btn-outline-sm w-100 justify-content-center">{{ __('messages.stat_projects') }}</a></div>
            <div class="col-6 col-md-3"><a href="{{ route('admin.clients.index') }}" class="btn-outline-sm w-100 justify-content-center">{{ __('messages.stat_clients') }}</a></div>
            <div class="col-6 col-md-3"><a href="{{ route('admin.navbar.edit') }}" class="btn-outline-sm w-100 justify-content-center">{{ __('messages.navbar_footer') }}</a></div>
        </div>
    </div>
</div>

@endsection
