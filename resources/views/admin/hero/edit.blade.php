@extends('admin.layouts.app')
@section('title', 'قسم الهيرو')

@section('content')

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div>
        <h1 class="page-title">قسم الهيرو</h1>
        <p class="page-sub">أول ما يظهر لزائر الصفحة الرئيسية</p>
    </div>
    <a href="{{ route('admin.hero-stats.index') }}" class="btn-outline-sm">
        <i class="bi bi-graph-up"></i> إحصائيات الهيرو
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-3">
        {{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif
@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show mb-3">
        <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<form action="{{ route('admin.hero.update') }}" method="POST">
@csrf
@method('PUT')

<div class="panel-card mb-4">
    <div class="panel-card-header"><h2 class="panel-card-title">الشارة والعنوان</h2></div>
    <div class="panel-card-body">
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">الشارة العلوية (عربي)</label>
                <input type="text" name="eyebrow_ar" value="{{ old('eyebrow_ar', $hero->eyebrow_ar) }}" class="form-control @error('eyebrow_ar') is-invalid @enderror" required>
                @error('eyebrow_ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">الشارة العلوية (إنجليزي)</label>
                <input type="text" name="eyebrow_en" value="{{ old('eyebrow_en', $hero->eyebrow_en) }}" class="form-control @error('eyebrow_en') is-invalid @enderror" required>
                @error('eyebrow_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-md-4">
                <label class="form-label">العنوان - السطر الأول (عربي)</label>
                <input type="text" name="heading_line1_ar" value="{{ old('heading_line1_ar', $hero->heading_line1_ar) }}" class="form-control @error('heading_line1_ar') is-invalid @enderror" required>
                @error('heading_line1_ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-4">
                <label class="form-label">العنوان - الجزء المميز (عربي)</label>
                <input type="text" name="heading_highlight_ar" value="{{ old('heading_highlight_ar', $hero->heading_highlight_ar) }}" class="form-control @error('heading_highlight_ar') is-invalid @enderror" required>
                @error('heading_highlight_ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-4">
                <label class="form-label">العنوان - السطر الأخير (عربي)</label>
                <input type="text" name="heading_line2_ar" value="{{ old('heading_line2_ar', $hero->heading_line2_ar) }}" class="form-control @error('heading_line2_ar') is-invalid @enderror" required>
                @error('heading_line2_ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-md-4">
                <label class="form-label">العنوان - السطر الأول (إنجليزي)</label>
                <input type="text" name="heading_line1_en" value="{{ old('heading_line1_en', $hero->heading_line1_en) }}" class="form-control @error('heading_line1_en') is-invalid @enderror" required>
                @error('heading_line1_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-4">
                <label class="form-label">العنوان - الجزء المميز (إنجليزي)</label>
                <input type="text" name="heading_highlight_en" value="{{ old('heading_highlight_en', $hero->heading_highlight_en) }}" class="form-control @error('heading_highlight_en') is-invalid @enderror" required>
                @error('heading_highlight_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-4">
                <label class="form-label">العنوان - السطر الأخير (إنجليزي)</label>
                <input type="text" name="heading_line2_en" value="{{ old('heading_line2_en', $hero->heading_line2_en) }}" class="form-control @error('heading_line2_en') is-invalid @enderror" required>
                @error('heading_line2_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-md-6">
                <label class="form-label">النص التعريفي (عربي)</label>
                <textarea name="lead_ar" rows="3" class="form-control @error('lead_ar') is-invalid @enderror" required>{{ old('lead_ar', $hero->lead_ar) }}</textarea>
                @error('lead_ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">النص التعريفي (إنجليزي)</label>
                <textarea name="lead_en" rows="3" class="form-control @error('lead_en') is-invalid @enderror" required>{{ old('lead_en', $hero->lead_en) }}</textarea>
                @error('lead_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
        </div>
    </div>
</div>

<div class="panel-card mb-4">
    <div class="panel-card-header"><h2 class="panel-card-title">الأزرار والشريط الزخرفي</h2></div>
    <div class="panel-card-body">
        <div class="row g-3">
            <div class="col-md-4">
                <label class="form-label">رابط الزر الأساسي</label>
                <input type="text" name="primary_btn_link" value="{{ old('primary_btn_link', $hero->primary_btn_link) }}" class="form-control @error('primary_btn_link') is-invalid @enderror" required>
                @error('primary_btn_link')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-4">
                <label class="form-label">رابط الزر الثانوي</label>
                <input type="text" name="secondary_btn_link" value="{{ old('secondary_btn_link', $hero->secondary_btn_link) }}" class="form-control @error('secondary_btn_link') is-invalid @enderror" required>
                @error('secondary_btn_link')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-4">
                <label class="form-label">الشريط الزخرفي أسفل الهيرو</label>
                <input type="text" name="strip_text" value="{{ old('strip_text', $hero->strip_text) }}" class="form-control @error('strip_text') is-invalid @enderror">
                @error('strip_text')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
        </div>
    </div>
</div>

<div class="d-flex gap-2 pb-4">
    <button type="submit" class="btn-primary-sm"><i class="bi bi-save"></i> حفظ</button>
</div>

</form>

@endsection
