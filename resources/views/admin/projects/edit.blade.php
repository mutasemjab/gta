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

@endsection
