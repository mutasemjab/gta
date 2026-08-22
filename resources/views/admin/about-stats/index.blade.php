@extends('admin.layouts.app')
@section('title', 'إحصائيات قسم من نحن')

@section('content')

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div>
        <h1 class="page-title">إحصائيات قسم "من نحن"</h1>
        <p class="page-sub">شريط الأرقام أسفل قسم "من نحن"</p>
    </div>
    <a href="{{ route('admin.about-stats.create') }}" class="btn-primary-sm"><i class="bi bi-plus-lg"></i> إضافة إحصائية</a>
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
                    <tr><th>الترتيب</th><th>التسمية (عربي)</th><th>التسمية (إنجليزي)</th><th>القيمة</th><th>الإجراءات</th></tr>
                </thead>
                <tbody>
                    @forelse($aboutStats as $stat)
                    <tr>
                        <td>{{ $stat->order_index }}</td>
                        <td>{{ $stat->label_ar }}</td>
                        <td>{{ $stat->label_en }}</td>
                        <td>{{ $stat->value }}{{ $stat->suffix }}</td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('admin.about-stats.edit', $stat->id) }}" class="btn-icon-sm btn-edit" title="تعديل"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('admin.about-stats.destroy', $stat->id) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn-icon-sm btn-delete" title="حذف"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="text-center text-muted py-4">لا توجد بيانات</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($aboutStats->hasPages())
    <div class="panel-card-body border-top pt-3">{{ $aboutStats->links() }}</div>
    @endif
</div>

@endsection
