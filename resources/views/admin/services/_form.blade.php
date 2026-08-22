@php $service = $service ?? null; @endphp
<div class="panel-card mb-4">
    <div class="panel-card-body">
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">العنوان (عربي)</label>
                <input type="text" name="title_ar" value="{{ old('title_ar', $service->title_ar ?? '') }}" class="form-control @error('title_ar') is-invalid @enderror" required>
                @error('title_ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">العنوان (إنجليزي)</label>
                <input type="text" name="title_en" value="{{ old('title_en', $service->title_en ?? '') }}" class="form-control @error('title_en') is-invalid @enderror" required>
                @error('title_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">الوصف (عربي)</label>
                <textarea name="description_ar" rows="3" class="form-control @error('description_ar') is-invalid @enderror" required>{{ old('description_ar', $service->description_ar ?? '') }}</textarea>
                @error('description_ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">الوصف (إنجليزي)</label>
                <textarea name="description_en" rows="3" class="form-control @error('description_en') is-invalid @enderror" required>{{ old('description_en', $service->description_en ?? '') }}</textarea>
                @error('description_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-4">
                @if(($service->icon ?? null))
                    <img src="{{ $service->icon }}" alt="icon" style="height:36px;margin-bottom:6px">
                @endif
                <label class="form-label">أيقونة (اختياري)</label>
                <input type="file" name="icon" class="form-control @error('icon') is-invalid @enderror" accept="image/*">
                @error('icon')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-4">
                <label class="form-label">الترتيب</label>
                <input type="number" name="order_index" value="{{ old('order_index', $service->order_index ?? 0) }}" class="form-control @error('order_index') is-invalid @enderror">
                @error('order_index')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-4">
                <label class="form-label d-block">مفعّل</label>
                <div class="form-check form-switch">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" value="1" class="form-check-input"
                           {{ old('is_active', $service->is_active ?? true) ? 'checked' : '' }}>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="d-flex gap-2 pb-4">
    <button type="submit" class="btn-primary-sm"><i class="bi bi-save"></i> حفظ</button>
    <a href="{{ route('admin.services.index') }}" class="btn-outline-sm">إلغاء</a>
</div>
