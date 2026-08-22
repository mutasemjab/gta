@extends('admin.layouts.app')
@section('title', 'التذييل')

@section('content')

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div>
        <h1 class="page-title">التذييل (Footer)</h1>
        <p class="page-sub">النص التعريفي، روابط التواصل الاجتماعي وحقوق النشر</p>
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

<form action="{{ route('admin.footer.update') }}" method="POST">
@csrf
@method('PUT')

<div class="panel-card mb-4">
    <div class="panel-card-header"><h2 class="panel-card-title"><i class="bi bi-card-text"></i> نبذة عن الشركة</h2></div>
    <div class="panel-card-body">
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">النص (عربي)</label>
                <textarea name="about_ar" rows="3" class="form-control @error('about_ar') is-invalid @enderror" required>{{ old('about_ar', $footer->about_ar) }}</textarea>
                @error('about_ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">النص (إنجليزي)</label>
                <textarea name="about_en" rows="3" class="form-control @error('about_en') is-invalid @enderror" required>{{ old('about_en', $footer->about_en) }}</textarea>
                @error('about_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
        </div>
    </div>
</div>

<div class="panel-card mb-4">
    <div class="panel-card-header"><h2 class="panel-card-title"><i class="bi bi-c-circle"></i> حقوق النشر والشعار السفلي</h2></div>
    <div class="panel-card-body">
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">حقوق النشر (عربي)</label>
                <input type="text" name="copyright_ar" value="{{ old('copyright_ar', $footer->copyright_ar) }}" class="form-control @error('copyright_ar') is-invalid @enderror" required>
                @error('copyright_ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">حقوق النشر (إنجليزي)</label>
                <input type="text" name="copyright_en" value="{{ old('copyright_en', $footer->copyright_en) }}" class="form-control @error('copyright_en') is-invalid @enderror" required>
                @error('copyright_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">الشعار السفلي (عربي)</label>
                <input type="text" name="tagline_ar" value="{{ old('tagline_ar', $footer->tagline_ar) }}" class="form-control @error('tagline_ar') is-invalid @enderror">
                @error('tagline_ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">الشعار السفلي (إنجليزي)</label>
                <input type="text" name="tagline_en" value="{{ old('tagline_en', $footer->tagline_en) }}" class="form-control @error('tagline_en') is-invalid @enderror">
                @error('tagline_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
        </div>
    </div>
</div>

<div class="panel-card mb-4">
    <div class="panel-card-header"><h2 class="panel-card-title"><i class="bi bi-share"></i> روابط التواصل الاجتماعي</h2></div>
    <div class="panel-card-body">
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label"><i class="bi bi-facebook"></i> فيسبوك</label>
                <input type="text" name="facebook_url" value="{{ old('facebook_url', $footer->facebook_url) }}" class="form-control @error('facebook_url') is-invalid @enderror">
                @error('facebook_url')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label"><i class="bi bi-instagram"></i> إنستغرام</label>
                <input type="text" name="instagram_url" value="{{ old('instagram_url', $footer->instagram_url) }}" class="form-control @error('instagram_url') is-invalid @enderror">
                @error('instagram_url')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label"><i class="bi bi-linkedin"></i> لينكدإن</label>
                <input type="text" name="linkedin_url" value="{{ old('linkedin_url', $footer->linkedin_url) }}" class="form-control @error('linkedin_url') is-invalid @enderror">
                @error('linkedin_url')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label"><i class="bi bi-whatsapp"></i> واتساب</label>
                <input type="text" name="whatsapp_url" value="{{ old('whatsapp_url', $footer->whatsapp_url) }}" class="form-control @error('whatsapp_url') is-invalid @enderror">
                @error('whatsapp_url')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
        </div>
    </div>
</div>

<div class="d-flex gap-2 pb-4">
    <button type="submit" class="btn-primary-sm"><i class="bi bi-save"></i> حفظ</button>
</div>

</form>

@endsection
