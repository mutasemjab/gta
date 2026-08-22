@php $product = $product ?? null; @endphp
<div class="panel-card mb-4">
    <div class="panel-card-body">
        <div class="row g-3">
            <div class="col-md-3">
                <label class="form-label">رمز التصنيف (Chip)</label>
                <input type="text" name="chip_label" value="{{ old('chip_label', $product->chip_label ?? '') }}" class="form-control @error('chip_label') is-invalid @enderror" placeholder="C2TE">
                @error('chip_label')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-3">
                <label class="form-label">كود المنتج</label>
                <input type="text" name="code" value="{{ old('code', $product->code ?? '') }}" class="form-control @error('code') is-invalid @enderror" placeholder="GTA-FIX-FLEX">
                @error('code')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-3">
                <label class="form-label">الترتيب</label>
                <input type="number" name="order_index" value="{{ old('order_index', $product->order_index ?? 0) }}" class="form-control @error('order_index') is-invalid @enderror">
                @error('order_index')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-3">
                <label class="form-label d-block">مفعّل</label>
                <div class="form-check form-switch">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" value="1" class="form-check-input"
                           {{ old('is_active', $product->is_active ?? true) ? 'checked' : '' }}>
                </div>
            </div>
            <div class="col-md-6">
                <label class="form-label">اسم المنتج (عربي)</label>
                <input type="text" name="name_ar" value="{{ old('name_ar', $product->name_ar ?? '') }}" class="form-control @error('name_ar') is-invalid @enderror" required>
                @error('name_ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">اسم المنتج (إنجليزي)</label>
                <input type="text" name="name_en" value="{{ old('name_en', $product->name_en ?? '') }}" class="form-control @error('name_en') is-invalid @enderror" required>
                @error('name_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">الوصف (عربي)</label>
                <textarea name="description_ar" rows="3" class="form-control @error('description_ar') is-invalid @enderror" required>{{ old('description_ar', $product->description_ar ?? '') }}</textarea>
                @error('description_ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">الوصف (إنجليزي)</label>
                <textarea name="description_en" rows="3" class="form-control @error('description_en') is-invalid @enderror" required>{{ old('description_en', $product->description_en ?? '') }}</textarea>
                @error('description_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-4">
                <label class="form-label">تسمية المواصفة (عربي)</label>
                <input type="text" name="spec_label_ar" value="{{ old('spec_label_ar', $product->spec_label_ar ?? '') }}" class="form-control @error('spec_label_ar') is-invalid @enderror" placeholder="التغطية">
                @error('spec_label_ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-4">
                <label class="form-label">تسمية المواصفة (إنجليزي)</label>
                <input type="text" name="spec_label_en" value="{{ old('spec_label_en', $product->spec_label_en ?? '') }}" class="form-control @error('spec_label_en') is-invalid @enderror" placeholder="Coverage">
                @error('spec_label_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-4">
                <label class="form-label">قيمة المواصفة</label>
                <input type="text" name="spec_value" value="{{ old('spec_value', $product->spec_value ?? '') }}" class="form-control @error('spec_value') is-invalid @enderror" placeholder="~5 kg/m²">
                @error('spec_value')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
        </div>
    </div>
</div>

<div class="d-flex gap-2 pb-4">
    <button type="submit" class="btn-primary-sm"><i class="bi bi-save"></i> حفظ</button>
    <a href="{{ route('admin.products.index') }}" class="btn-outline-sm">إلغاء</a>
</div>
