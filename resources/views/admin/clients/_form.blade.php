@php $client = $client ?? null; @endphp
<div class="panel-card mb-4">
    <div class="panel-card-body">
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">اسم العميل / الشركة</label>
                <input type="text" name="name" value="{{ old('name', $client->name ?? '') }}" class="form-control @error('name') is-invalid @enderror" required>
                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-3">
                @if(($client->logo ?? null))
                    <img src="{{ $client->logo }}" alt="logo" style="height:32px;margin-bottom:6px">
                @endif
                <label class="form-label">شعار (اختياري)</label>
                <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror" accept="image/*">
                @error('logo')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-2">
                <label class="form-label">الترتيب</label>
                <input type="number" name="order_index" value="{{ old('order_index', $client->order_index ?? 0) }}" class="form-control @error('order_index') is-invalid @enderror">
                @error('order_index')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-1">
                <label class="form-label d-block">مفعّل</label>
                <div class="form-check form-switch">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" value="1" class="form-check-input"
                           {{ old('is_active', $client->is_active ?? true) ? 'checked' : '' }}>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="d-flex gap-2 pb-4">
    <button type="submit" class="btn-primary-sm"><i class="bi bi-save"></i> حفظ</button>
    <a href="{{ route('admin.clients.index') }}" class="btn-outline-sm">إلغاء</a>
</div>
