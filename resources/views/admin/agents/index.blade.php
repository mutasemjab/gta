@extends('admin.layouts.app')
@section('title', 'وكلاؤنا')

@section('content')

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div>
        <h1 class="page-title">وكلاؤنا</h1>
        <p class="page-sub">قسم "وكلاؤنا" في الصفحة الرئيسية</p>
    </div>
    <a href="{{ route('admin.agents.create') }}" class="btn-primary-sm"><i class="bi bi-plus-lg"></i> إضافة وكيل</a>
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
                    <tr><th>الترتيب</th><th>الاسم</th><th>الحالة</th><th>الإجراءات</th></tr>
                </thead>
                <tbody>
                    @forelse($agents as $agent)
                    <tr>
                        <td>{{ $agent->order_index }}</td>
                        <td>{{ $agent->name }}</td>
                        <td>
                            @if($agent->is_active)
                                <span class="pill pill-info">{{ __('messages.Active') }}</span>
                            @else
                                <span class="pill pill-neutral">{{ __('messages.Inactive') }}</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('admin.agents.edit', $agent->id) }}" class="btn-icon-sm btn-edit" title="تعديل"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('admin.agents.destroy', $agent->id) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn-icon-sm btn-delete" title="حذف"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="4" class="text-center text-muted py-4">لا يوجد وكلاء</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($agents->hasPages())
    <div class="panel-card-body border-top pt-3">{{ $agents->links() }}</div>
    @endif
</div>

@endsection
