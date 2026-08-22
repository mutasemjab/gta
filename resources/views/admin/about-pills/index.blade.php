@extends('admin.layouts.app')
@section('title', 'وسوم قسم من نحن')

@section('content')

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div>
        <h1 class="page-title">وسوم قسم "من نحن"</h1>
        <p class="page-sub">الوسوم الصغيرة أسفل الفقرة التعريفية (مثال: لواصق C1/C2)</p>
    </div>
    <a href="{{ route('admin.about-pills.create') }}" class="btn-primary-sm"><i class="bi bi-plus-lg"></i> إضافة وسم</a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-3">
        {{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="panel-card">
    <div class="panel-card-body p-0">
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr><th>الترتيب</th><th>النص (عربي)</th><th>النص (إنجليزي)</th><th>الإجراءات</th></tr>
                </thead>
                <tbody>
                    @forelse($aboutPills as $pill)
                    <tr>
                        <td>{{ $pill->order_index }}</td>
                        <td>{{ $pill->name_ar }}</td>
                        <td>{{ $pill->name_en }}</td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('admin.about-pills.edit', $pill->id) }}" class="btn-icon-sm btn-edit" title="تعديل"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('admin.about-pills.destroy', $pill->id) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn-icon-sm btn-delete" title="حذف"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="4" class="text-center text-muted py-4">لا توجد بيانات</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($aboutPills->hasPages())
    <div class="panel-card-body border-top pt-3">{{ $aboutPills->links() }}</div>
    @endif
</div>

@endsection
