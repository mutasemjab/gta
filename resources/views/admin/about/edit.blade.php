@extends('admin.layouts.app')
@section('title', 'قسم من نحن')

@section('content')

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div>
        <h1 class="page-title">قسم "من نحن"</h1>
        <p class="page-sub">التعريف بالشركة في الصفحة الرئيسية</p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.about-pills.index') }}" class="btn-outline-sm"><i class="bi bi-tags"></i> الوسوم</a>
        <a href="{{ route('admin.about-stats.index') }}" class="btn-outline-sm"><i class="bi bi-graph-up"></i> الإحصائيات</a>
    </div>
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

<form action="{{ route('admin.about.update') }}" method="POST">
@csrf
@method('PUT')

<div class="panel-card mb-4">
    <div class="panel-card-header"><h2 class="panel-card-title">الشارة والعنوان</h2></div>
    <div class="panel-card-body">
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">الشارة العلوية (عربي)</label>
                <input type="text" name="eyebrow_ar" value="{{ old('eyebrow_ar', $about->eyebrow_ar) }}" class="form-control @error('eyebrow_ar') is-invalid @enderror" required>
                @error('eyebrow_ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">الشارة العلوية (إنجليزي)</label>
                <input type="text" name="eyebrow_en" value="{{ old('eyebrow_en', $about->eyebrow_en) }}" class="form-control @error('eyebrow_en') is-invalid @enderror" required>
                @error('eyebrow_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">العنوان (عربي)</label>
                <input type="text" name="title_ar" value="{{ old('title_ar', $about->title_ar) }}" class="form-control @error('title_ar') is-invalid @enderror" required>
                @error('title_ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">العنوان (إنجليزي)</label>
                <input type="text" name="title_en" value="{{ old('title_en', $about->title_en) }}" class="form-control @error('title_en') is-invalid @enderror" required>
                @error('title_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">الجملة التمهيدية (عربي)</label>
                <textarea name="lead_ar" rows="2" class="form-control @error('lead_ar') is-invalid @enderror" required>{{ old('lead_ar', $about->lead_ar) }}</textarea>
                @error('lead_ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">الجملة التمهيدية (إنجليزي)</label>
                <textarea name="lead_en" rows="2" class="form-control @error('lead_en') is-invalid @enderror" required>{{ old('lead_en', $about->lead_en) }}</textarea>
                @error('lead_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">الفقرة الأولى (عربي)</label>
                <textarea name="paragraph1_ar" rows="3" class="form-control @error('paragraph1_ar') is-invalid @enderror" required>{{ old('paragraph1_ar', $about->paragraph1_ar) }}</textarea>
                @error('paragraph1_ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">الفقرة الأولى (إنجليزي)</label>
                <textarea name="paragraph1_en" rows="3" class="form-control @error('paragraph1_en') is-invalid @enderror" required>{{ old('paragraph1_en', $about->paragraph1_en) }}</textarea>
                @error('paragraph1_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">الفقرة الثانية (عربي)</label>
                <textarea name="paragraph2_ar" rows="3" class="form-control @error('paragraph2_ar') is-invalid @enderror" required>{{ old('paragraph2_ar', $about->paragraph2_ar) }}</textarea>
                @error('paragraph2_ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">الفقرة الثانية (إنجليزي)</label>
                <textarea name="paragraph2_en" rows="3" class="form-control @error('paragraph2_en') is-invalid @enderror" required>{{ old('paragraph2_en', $about->paragraph2_en) }}</textarea>
                @error('paragraph2_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
        </div>
    </div>
</div>

<div class="panel-card mb-4">
    <div class="panel-card-header"><h2 class="panel-card-title">الشارة الجانبية (DE)</h2></div>
    <div class="panel-card-body">
        <div class="row g-3">
            <div class="col-md-2">
                <label class="form-label">رمز الشارة</label>
                <input type="text" name="badge_title" value="{{ old('badge_title', $about->badge_title) }}" class="form-control @error('badge_title') is-invalid @enderror" maxlength="10">
                @error('badge_title')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-5">
                <label class="form-label">نص الشارة (عربي)</label>
                <input type="text" name="badge_text_ar" value="{{ old('badge_text_ar', $about->badge_text_ar) }}" class="form-control @error('badge_text_ar') is-invalid @enderror">
                @error('badge_text_ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-5">
                <label class="form-label">نص الشارة (إنجليزي)</label>
                <input type="text" name="badge_text_en" value="{{ old('badge_text_en', $about->badge_text_en) }}" class="form-control @error('badge_text_en') is-invalid @enderror">
                @error('badge_text_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
        </div>
    </div>
</div>

<div class="d-flex gap-2 pb-4">
    <button type="submit" class="btn-primary-sm"><i class="bi bi-save"></i> حفظ</button>
</div>

</form>

@endsection
