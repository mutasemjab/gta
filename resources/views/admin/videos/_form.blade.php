@php $video = $video ?? null; @endphp
<div class="panel-card mb-4">
    <div class="panel-card-body">
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">التسمية (عربي، اختياري)</label>
                <input type="text" name="title_ar" value="{{ old('title_ar', $video->title_ar ?? '') }}" class="form-control @error('title_ar') is-invalid @enderror">
                @error('title_ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">التسمية (إنجليزي، اختياري)</label>
                <input type="text" name="title_en" value="{{ old('title_en', $video->title_en ?? '') }}" class="form-control @error('title_en') is-invalid @enderror">
                @error('title_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                @if(($video->video ?? null))
                    <video src="{{ $video->video }}" style="height:120px;border-radius:8px;margin-bottom:6px" muted></video>
                @endif
                <label class="form-label">ملف الفيديو (MP4){{ $video ? ' — اتركه فارغًا للإبقاء على الفيديو الحالي' : '' }}</label>
                <input type="file" name="video" class="form-control @error('video') is-invalid @enderror" accept="video/mp4,video/quicktime,video/webm" {{ $video ? '' : 'required' }}>
                @error('video')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                @if(($video->thumbnail ?? null))
                    <img src="{{ $video->thumbnail }}" alt="thumbnail" style="height:120px;border-radius:8px;margin-bottom:6px">
                @endif
                <label class="form-label">صورة مصغّرة (اختياري)</label>
                <input type="file" name="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror" accept="image/*">
                @error('thumbnail')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-3">
                <label class="form-label">الترتيب</label>
                <input type="number" name="order_index" value="{{ old('order_index', $video->order_index ?? 0) }}" class="form-control @error('order_index') is-invalid @enderror">
                @error('order_index')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-3">
                <label class="form-label d-block">مفعّل</label>
                <div class="form-check form-switch">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" value="1" class="form-check-input"
                           {{ old('is_active', $video->is_active ?? true) ? 'checked' : '' }}>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="d-flex gap-2 pb-4">
    <button type="submit" class="btn-primary-sm"><i class="bi bi-save"></i> حفظ</button>
    <a href="{{ route('admin.videos.index') }}" class="btn-outline-sm">إلغاء</a>
</div>
