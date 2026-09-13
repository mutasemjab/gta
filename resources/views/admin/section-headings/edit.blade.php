@extends('admin.layouts.app')
@section('title', 'عناوين الأقسام')

@section('content')

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div>
        <h1 class="page-title">عناوين الأقسام</h1>
        <p class="page-sub">الشارة والعنوان والوصف الظاهرين أعلى كل قسم في الصفحة الرئيسية</p>
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

<form action="{{ route('admin.section-headings.update') }}" method="POST">
@csrf
@method('PUT')

@foreach($sections as $key => $meta)
@php $h = $headings[$key] ?? null; @endphp
<div class="panel-card mb-4">
    <div class="panel-card-header"><h2 class="panel-card-title">{{ $meta['label'] }}</h2></div>
    <div class="panel-card-body">
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">الشارة العلوية (عربي)</label>
                <input type="text" name="data[{{ $key }}][eyebrow_ar]" value="{{ old("data.$key.eyebrow_ar", $h->eyebrow_ar ?? '') }}" class="form-control @error("data.$key.eyebrow_ar") is-invalid @enderror">
                @error("data.$key.eyebrow_ar")<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">الشارة العلوية (إنجليزي)</label>
                <input type="text" name="data[{{ $key }}][eyebrow_en]" value="{{ old("data.$key.eyebrow_en", $h->eyebrow_en ?? '') }}" class="form-control @error("data.$key.eyebrow_en") is-invalid @enderror">
                @error("data.$key.eyebrow_en")<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">العنوان (عربي)</label>
                <input type="text" name="data[{{ $key }}][title_ar]" value="{{ old("data.$key.title_ar", $h->title_ar ?? '') }}" class="form-control @error("data.$key.title_ar") is-invalid @enderror">
                @error("data.$key.title_ar")<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">العنوان (إنجليزي)</label>
                <input type="text" name="data[{{ $key }}][title_en]" value="{{ old("data.$key.title_en", $h->title_en ?? '') }}" class="form-control @error("data.$key.title_en") is-invalid @enderror">
                @error("data.$key.title_en")<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            @if($meta['has_desc'])
            <div class="col-md-6">
                <label class="form-label">الوصف (عربي)</label>
                <textarea name="data[{{ $key }}][description_ar]" rows="2" class="form-control @error("data.$key.description_ar") is-invalid @enderror">{{ old("data.$key.description_ar", $h->description_ar ?? '') }}</textarea>
                @error("data.$key.description_ar")<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">الوصف (إنجليزي)</label>
                <textarea name="data[{{ $key }}][description_en]" rows="2" class="form-control @error("data.$key.description_en") is-invalid @enderror">{{ old("data.$key.description_en", $h->description_en ?? '') }}</textarea>
                @error("data.$key.description_en")<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            @endif
        </div>
    </div>
</div>
@endforeach

<div class="d-flex gap-2 pb-4">
    <button type="submit" class="btn-primary-sm"><i class="bi bi-save"></i> حفظ الكل</button>
</div>

</form>

@endsection
