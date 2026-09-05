@extends('admin.layouts.app')
@section('title', 'الداتا شيت')

@section('content')

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div>
        <h1 class="page-title">الداتا شيت</h1>
        <p class="page-sub">ملفات PDF (عربي وإنجليزي) القابلة للتحميل في قسم "مركز التحميل"</p>
    </div>
    <a href="{{ route('admin.catalog-items.create') }}" class="btn-primary-sm"><i class="bi bi-plus-lg"></i> إضافة داتا شيت</a>
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
                    <tr><th>الترتيب</th><th>العنوان (عربي)</th><th>العنوان (إنجليزي)</th><th>الملفات</th><th>الحالة</th><th>الإجراءات</th></tr>
                </thead>
                <tbody>
                    @forelse($catalogItems as $item)
                    <tr>
                        <td>{{ $item->order_index }}</td>
                        <td>{{ $item->title_ar }}</td>
                        <td>{{ $item->title_en }}</td>
                        <td>
                            @if($item->file_ar)<a href="{{ $item->file_ar }}" target="_blank" title="PDF عربي" class="me-1"><i class="bi bi-file-earmark-pdf"></i> AR</a>@endif
                            @if($item->file_en)<a href="{{ $item->file_en }}" target="_blank" title="PDF إنجليزي"><i class="bi bi-file-earmark-pdf"></i> EN</a>@endif
                            @if(!$item->file_ar && !$item->file_en) — @endif
                        </td>
                        <td>
                            @if($item->is_active)
                                <span class="pill pill-info">{{ __('messages.Active') }}</span>
                            @else
                                <span class="pill pill-neutral">{{ __('messages.Inactive') }}</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('admin.catalog-items.edit', $item->id) }}" class="btn-icon-sm btn-edit" title="تعديل"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('admin.catalog-items.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn-icon-sm btn-delete" title="حذف"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="6" class="text-center text-muted py-4">لا توجد ملفات</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($catalogItems->hasPages())
    <div class="panel-card-body border-top pt-3">{{ $catalogItems->links() }}</div>
    @endif
</div>

@endsection
