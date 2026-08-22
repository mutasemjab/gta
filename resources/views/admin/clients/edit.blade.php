@extends('admin.layouts.app')
@section('title', 'تعديل عميل')

@section('content')

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div><h1 class="page-title">تعديل عميل</h1></div>
    <a href="{{ route('admin.clients.index') }}" class="btn-outline-sm"><i class="bi bi-arrow-right"></i> العودة للقائمة</a>
</div>

@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show mb-3">
        <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<form action="{{ route('admin.clients.update', $client->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
@include('admin.clients._form')
</form>

@endsection
