@php $project = $project ?? null; @endphp
<div class="panel-card mb-4">
    <div class="panel-card-body">
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">التصنيف (عربي)</label>
                <input type="text" name="category_ar" value="{{ old('category_ar', $project->category_ar ?? '') }}" class="form-control @error('category_ar') is-invalid @enderror" required>
                @error('category_ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">التصنيف (إنجليزي)</label>
                <input type="text" name="category_en" value="{{ old('category_en', $project->category_en ?? '') }}" class="form-control @error('category_en') is-invalid @enderror" required>
                @error('category_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">عنوان المشروع (عربي)</label>
                <input type="text" name="title_ar" value="{{ old('title_ar', $project->title_ar ?? '') }}" class="form-control @error('title_ar') is-invalid @enderror" required>
                @error('title_ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">عنوان المشروع (إنجليزي)</label>
                <input type="text" name="title_en" value="{{ old('title_en', $project->title_en ?? '') }}" class="form-control @error('title_en') is-invalid @enderror" required>
                @error('title_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">الموقع/التفاصيل (عربي)</label>
                <input type="text" name="location_ar" value="{{ old('location_ar', $project->location_ar ?? '') }}" class="form-control @error('location_ar') is-invalid @enderror" required>
                @error('location_ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">الموقع/التفاصيل (إنجليزي)</label>
                <input type="text" name="location_en" value="{{ old('location_en', $project->location_en ?? '') }}" class="form-control @error('location_en') is-invalid @enderror" required>
                @error('location_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-4">
                <label class="form-label">حجم البطاقة</label>
                @php $size = old('size', $project->size ?? 'small'); @endphp
                <select name="size" class="form-select @error('size') is-invalid @enderror">
                    <option value="small" {{ $size === 'small' ? 'selected' : '' }}>عادي</option>
                    <option value="big" {{ $size === 'big' ? 'selected' : '' }}>كبير</option>
                </select>
                @error('size')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-4">
                @if(($project->image ?? null))
                    <img src="{{ $project->image }}" alt="image" style="height:40px;margin-bottom:6px;border-radius:6px">
                @endif
                <label class="form-label">صورة الخلفية (اختياري)</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-2">
                <label class="form-label">الترتيب</label>
                <input type="number" name="order_index" value="{{ old('order_index', $project->order_index ?? 0) }}" class="form-control @error('order_index') is-invalid @enderror">
                @error('order_index')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-2">
                <label class="form-label d-block">مفعّل</label>
                <div class="form-check form-switch">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" value="1" class="form-check-input"
                           {{ old('is_active', $project->is_active ?? true) ? 'checked' : '' }}>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="d-flex gap-2 pb-4">
    <button type="submit" class="btn-primary-sm"><i class="bi bi-save"></i> حفظ</button>
    <a href="{{ route('admin.projects.index') }}" class="btn-outline-sm">إلغاء</a>
</div>
