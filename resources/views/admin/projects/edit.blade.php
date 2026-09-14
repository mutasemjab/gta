@extends('admin.layouts.app')
@section('title', 'تعديل مشروع')

@section('content')

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div><h1 class="page-title">تعديل مشروع</h1></div>
    <a href="{{ route('admin.projects.index') }}" class="btn-outline-sm"><i class="bi bi-arrow-right"></i> العودة للقائمة</a>
</div>

@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show mb-3">
        <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
@include('admin.projects._form')
</form>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-3">
        {{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="panel-card mb-4">
    <div class="panel-card-header"><h2 class="panel-card-title"><i class="bi bi-images"></i> معرض صور المشروع</h2></div>
    <div class="panel-card-body">
        <p class="text-muted small mb-3">هذه الصور تظهر في النافذة المنبثقة (Lightbox) عند الضغط على المشروع في الصفحة الرئيسية.</p>

        @if($project->images->isNotEmpty())
        <div class="row g-3 mb-4">
            @foreach($project->images as $img)
            <div class="col-6 col-md-3 col-lg-2">
                <div class="position-relative">
                    <img src="{{ $img->image }}" alt="" class="w-100" style="height:100px;object-fit:cover;border-radius:8px">
                    <form action="{{ route('admin.project-images.destroy', $img->id) }}" method="POST" class="position-absolute top-0 end-0 m-1" onsubmit="return confirm('حذف هذه الصورة؟')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn-icon-sm btn-delete" title="حذف"><i class="bi bi-trash"></i></button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <p class="text-muted small mb-3">لا توجد صور في المعرض بعد.</p>
        @endif

        <form action="{{ route('admin.projects.images.store', $project->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-2 align-items-end">
                <div class="col">
                    <label class="form-label">إضافة صور (يمكن اختيار أكثر من صورة)</label>
                    <input type="file" name="images[]" class="form-control @error('images') is-invalid @enderror" accept="image/*" multiple required>
                    @error('images')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    @error('images.*')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn-primary-sm"><i class="bi bi-upload"></i> رفع الصور</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
