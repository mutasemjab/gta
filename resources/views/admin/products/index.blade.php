@extends('admin.layouts.app')
@section('title', 'المنتجات')

@section('content')

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div>
        <h1 class="page-title">المنتجات</h1>
        <p class="page-sub">قسم "منتجاتنا" في الصفحة الرئيسية</p>
    </div>
    <a href="{{ route('admin.products.create') }}" class="btn-primary-sm"><i class="bi bi-plus-lg"></i> إضافة منتج</a>
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
                    <tr><th>الترتيب</th><th>الكود</th><th>الاسم (عربي)</th><th>الاسم (إنجليزي)</th><th>الحالة</th><th>الإجراءات</th></tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                    <tr>
                        <td>{{ $product->order_index }}</td>
                        <td>{{ $product->code }}</td>
                        <td>{{ $product->name_ar }}</td>
                        <td>{{ $product->name_en }}</td>
                        <td>
                            @if($product->is_active)
                                <span class="pill pill-info">{{ __('messages.Active') }}</span>
                            @else
                                <span class="pill pill-neutral">{{ __('messages.Inactive') }}</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn-icon-sm btn-edit" title="تعديل"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn-icon-sm btn-delete" title="حذف"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="6" class="text-center text-muted py-4">لا توجد منتجات</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($products->hasPages())
    <div class="panel-card-body border-top pt-3">{{ $products->links() }}</div>
    @endif
</div>

@endsection
