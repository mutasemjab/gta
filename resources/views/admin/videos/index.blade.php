@extends('admin.layouts.app')
@section('title', 'الفيديوهات (ريلز)')

@section('content')

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div>
        <h1 class="page-title">الفيديوهات (ريلز)</h1>
        <p class="page-sub">قسم عرض الفيديوهات على شكل ريلز في الصفحة الرئيسية</p>
    </div>
    <a href="{{ route('admin.videos.create') }}" class="btn-primary-sm"><i class="bi bi-plus-lg"></i> إضافة فيديو</a>
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
                    <tr><th>الترتيب</th><th>المعاينة</th><th>التسمية (عربي)</th><th>الحالة</th><th>الإجراءات</th></tr>
                </thead>
                <tbody>
                    @forelse($videos as $video)
                    <tr>
                        <td>{{ $video->order_index }}</td>
                        <td>
                            @if($video->thumbnail)
                                <img src="{{ $video->thumbnail }}" alt="" style="height:44px;border-radius:6px">
                            @else
                                <i class="bi bi-camera-reels fs-4 text-muted"></i>
                            @endif
                        </td>
                        <td>{{ $video->title_ar ?: '—' }}</td>
                        <td>
                            @if($video->is_active)
                                <span class="pill pill-info">{{ __('messages.Active') }}</span>
                            @else
                                <span class="pill pill-neutral">{{ __('messages.Inactive') }}</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('admin.videos.edit', $video->id) }}" class="btn-icon-sm btn-edit" title="تعديل"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('admin.videos.destroy', $video->id) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn-icon-sm btn-delete" title="حذف"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="text-center text-muted py-4">لا توجد فيديوهات بعد</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($videos->hasPages())
    <div class="panel-card-body border-top pt-3">{{ $videos->links() }}</div>
    @endif
</div>

@endsection
