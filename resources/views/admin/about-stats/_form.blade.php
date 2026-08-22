<div class="panel-card mb-4">
    <div class="panel-card-body">
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">التسمية (عربي)</label>
                <input type="text" name="label_ar" value="{{ old('label_ar', $aboutStat->label_ar ?? '') }}" class="form-control @error('label_ar') is-invalid @enderror" required>
                @error('label_ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">التسمية (إنجليزي)</label>
                <input type="text" name="label_en" value="{{ old('label_en', $aboutStat->label_en ?? '') }}" class="form-control @error('label_en') is-invalid @enderror" required>
                @error('label_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-4">
                <label class="form-label">القيمة</label>
                <input type="number" name="value" value="{{ old('value', $aboutStat->value ?? 0) }}" class="form-control @error('value') is-invalid @enderror" required>
                @error('value')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-4">
                <label class="form-label">اللاحقة (مثل + أو %)</label>
                <input type="text" name="suffix" value="{{ old('suffix', $aboutStat->suffix ?? '') }}" class="form-control @error('suffix') is-invalid @enderror" maxlength="10">
                @error('suffix')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-4">
                <label class="form-label">ترتيب العرض</label>
                <input type="number" name="order_index" value="{{ old('order_index', $aboutStat->order_index ?? 0) }}" class="form-control @error('order_index') is-invalid @enderror">
                @error('order_index')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
        </div>
    </div>
</div>

<div class="d-flex gap-2 pb-4">
    <button type="submit" class="btn-primary-sm"><i class="bi bi-save"></i> حفظ</button>
    <a href="{{ route('admin.about-stats.index') }}" class="btn-outline-sm">إلغاء</a>
</div>
