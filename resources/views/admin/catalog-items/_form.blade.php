@php $catalogItem = $catalogItem ?? null; @endphp
<div class="panel-card mb-4">
    <div class="panel-card-body">
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">الوسم (عربي)</label>
                <input type="text" name="meta_label_ar" value="{{ old('meta_label_ar', $catalogItem->meta_label_ar ?? '') }}" class="form-control @error('meta_label_ar') is-invalid @enderror" placeholder="PDF · نظرة عامة">
                @error('meta_label_ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">الوسم (إنجليزي)</label>
                <input type="text" name="meta_label_en" value="{{ old('meta_label_en', $catalogItem->meta_label_en ?? '') }}" class="form-control @error('meta_label_en') is-invalid @enderror" placeholder="PDF · Overview">
                @error('meta_label_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">العنوان (عربي)</label>
                <input type="text" name="title_ar" value="{{ old('title_ar', $catalogItem->title_ar ?? '') }}" class="form-control @error('title_ar') is-invalid @enderror" required>
                @error('title_ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">العنوان (إنجليزي)</label>
                <input type="text" name="title_en" value="{{ old('title_en', $catalogItem->title_en ?? '') }}" class="form-control @error('title_en') is-invalid @enderror" required>
                @error('title_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">الوصف (عربي)</label>
                <textarea name="description_ar" rows="3" class="form-control @error('description_ar') is-invalid @enderror" required>{{ old('description_ar', $catalogItem->description_ar ?? '') }}</textarea>
                @error('description_ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">الوصف (إنجليزي)</label>
                <textarea name="description_en" rows="3" class="form-control @error('description_en') is-invalid @enderror" required>{{ old('description_en', $catalogItem->description_en ?? '') }}</textarea>
                @error('description_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                @if(($catalogItem->file ?? null))
                    <a href="{{ $catalogItem->file }}" target="_blank" class="d-block mb-2"><i class="bi bi-file-earmark-pdf"></i> الملف الحالي</a>
                @endif
                <label class="form-label">ملف PDF{{ $catalogItem ? ' (اتركه فارغًا للإبقاء على الملف الحالي)' : '' }}</label>
                <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" accept="application/pdf" {{ $catalogItem ? '' : 'required' }}>
                @error('file')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-3">
                <label class="form-label">الترتيب</label>
                <input type="number" name="order_index" value="{{ old('order_index', $catalogItem->order_index ?? 0) }}" class="form-control @error('order_index') is-invalid @enderror">
                @error('order_index')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-3">
                <label class="form-label d-block">مفعّل</label>
                <div class="form-check form-switch">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" value="1" class="form-check-input"
                           {{ old('is_active', $catalogItem->is_active ?? true) ? 'checked' : '' }}>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="d-flex gap-2 pb-4">
    <button type="submit" class="btn-primary-sm"><i class="bi bi-save"></i> حفظ</button>
    <a href="{{ route('admin.catalog-items.index') }}" class="btn-outline-sm">إلغاء</a>
</div>
