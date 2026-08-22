@extends('admin.layouts.app')
@section('title', 'معلومات التواصل')

@section('content')

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div>
        <h1 class="page-title">معلومات التواصل</h1>
        <p class="page-sub">تظهر في التذييل وفي قسم "تواصل معنا" بالصفحة الرئيسية</p>
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

<form action="{{ route('admin.contact-info.update') }}" method="POST">
@csrf
@method('PUT')

<div class="panel-card mb-4">
    <div class="panel-card-body">
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">الهاتف</label>
                <input type="text" name="phone" value="{{ old('phone', $contactInfo->phone) }}" class="form-control @error('phone') is-invalid @enderror" required>
                @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">البريد الإلكتروني</label>
                <input type="email" name="email" value="{{ old('email', $contactInfo->email) }}" class="form-control @error('email') is-invalid @enderror" required>
                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">العنوان (عربي)</label>
                <input type="text" name="address_ar" value="{{ old('address_ar', $contactInfo->address_ar) }}" class="form-control @error('address_ar') is-invalid @enderror" required>
                @error('address_ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">العنوان (إنجليزي)</label>
                <input type="text" name="address_en" value="{{ old('address_en', $contactInfo->address_en) }}" class="form-control @error('address_en') is-invalid @enderror" required>
                @error('address_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">ساعات العمل (عربي)</label>
                <input type="text" name="hours_ar" value="{{ old('hours_ar', $contactInfo->hours_ar) }}" class="form-control @error('hours_ar') is-invalid @enderror" required>
                @error('hours_ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">ساعات العمل (إنجليزي)</label>
                <input type="text" name="hours_en" value="{{ old('hours_en', $contactInfo->hours_en) }}" class="form-control @error('hours_en') is-invalid @enderror" required>
                @error('hours_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
        </div>
    </div>
</div>

<div class="d-flex gap-2 pb-4">
    <button type="submit" class="btn-primary-sm"><i class="bi bi-save"></i> حفظ</button>
</div>

</form>

@endsection
