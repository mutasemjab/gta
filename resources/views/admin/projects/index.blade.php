@extends('admin.layouts.app')
@section('title', 'المشاريع')

@section('content')

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div>
        <h1 class="page-title">المشاريع</h1>
        <p class="page-sub">قسم "مشاريعنا" في الصفحة الرئيسية</p>
    </div>
    <a href="{{ route('admin.projects.create') }}" class="btn-primary-sm"><i class="bi bi-plus-lg"></i> إضافة مشروع</a>
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
                    <tr><th>الترتيب</th><th>العنوان (عربي)</th><th>العنوان (إنجليزي)</th><th>التصنيف</th><th>الحجم</th><th>الحالة</th><th>الإجراءات</th></tr>
                </thead>
                <tbody>
                    @forelse($projects as $project)
                    <tr>
                        <td>{{ $project->order_index }}</td>
                        <td>{{ $project->title_ar }}</td>
                        <td>{{ $project->title_en }}</td>
                        <td>{{ $project->category_en }}</td>
                        <td>{{ $project->size === 'big' ? 'كبير' : 'عادي' }}</td>
                        <td>
                            @if($project->is_active)
                                <span class="pill pill-info">{{ __('messages.Active') }}</span>
                            @else
                                <span class="pill pill-neutral">{{ __('messages.Inactive') }}</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn-icon-sm btn-edit" title="تعديل"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn-icon-sm btn-delete" title="حذف"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="7" class="text-center text-muted py-4">لا توجد مشاريع</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($projects->hasPages())
    <div class="panel-card-body border-top pt-3">{{ $projects->links() }}</div>
    @endif
</div>

@endsection
