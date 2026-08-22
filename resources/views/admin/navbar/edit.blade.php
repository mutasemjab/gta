@extends('admin.layouts.app')
@section('title', 'شريط التنقل')

@section('content')

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div>
        <h1 class="page-title">شريط التنقل</h1>
        <p class="page-sub">شعار الموقع واسم العلامة التجارية الظاهر في الشريط العلوي</p>
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

<form action="{{ route('admin.navbar.update') }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')

<div class="panel-card mb-4">
    <div class="panel-card-header"><h2 class="panel-card-title"><i class="bi bi-image"></i> الشعار</h2></div>
    <div class="panel-card-body">
        <div class="row g-3 align-items-center">
            <div class="col-auto">
                @if($navbar->logo)
                    <img src="{{ $navbar->logo }}" alt="logo" style="height:56px;background:#152A2D;padding:8px;border-radius:8px">
                @endif
            </div>
            <div class="col">
                <label class="form-label">استبدال الشعار</label>
                <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror" accept="image/*">
                @error('logo')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
        </div>
    </div>
</div>

<div class="panel-card mb-4">
    <div class="panel-card-header"><h2 class="panel-card-title"><i class="bi bi-tag"></i> اسم العلامة التجارية</h2></div>
    <div class="panel-card-body">
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">الاسم (عربي)</label>
                <input type="text" name="brand_name_ar" value="{{ old('brand_name_ar', $navbar->brand_name_ar) }}"
                       class="form-control @error('brand_name_ar') is-invalid @enderror" required>
                @error('brand_name_ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">الاسم (إنجليزي)</label>
                <input type="text" name="brand_name_en" value="{{ old('brand_name_en', $navbar->brand_name_en) }}"
                       class="form-control @error('brand_name_en') is-invalid @enderror" required>
                @error('brand_name_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
        </div>
    </div>
</div>

<div class="d-flex gap-2 pb-4">
    <button type="submit" class="btn-primary-sm"><i class="bi bi-save"></i> حفظ</button>
</div>

</form>

@endsection
