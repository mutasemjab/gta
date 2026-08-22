<div class="panel-card mb-4">
    <div class="panel-card-body">
        <div class="row g-3">
            <div class="col-md-5">
                <label class="form-label">النص (عربي)</label>
                <input type="text" name="name_ar" value="{{ old('name_ar', $aboutPill->name_ar ?? '') }}" class="form-control @error('name_ar') is-invalid @enderror" required>
                @error('name_ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-5">
                <label class="form-label">النص (إنجليزي)</label>
                <input type="text" name="name_en" value="{{ old('name_en', $aboutPill->name_en ?? '') }}" class="form-control @error('name_en') is-invalid @enderror" required>
                @error('name_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-2">
                <label class="form-label">الترتيب</label>
                <input type="number" name="order_index" value="{{ old('order_index', $aboutPill->order_index ?? 0) }}" class="form-control @error('order_index') is-invalid @enderror">
                @error('order_index')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
        </div>
    </div>
</div>

<div class="d-flex gap-2 pb-4">
    <button type="submit" class="btn-primary-sm"><i class="bi bi-save"></i> حفظ</button>
    <a href="{{ route('admin.about-pills.index') }}" class="btn-outline-sm">إلغاء</a>
</div>
