<div class="form-group">
    <label for="exampleInputEmail1">Seo Url
        @if ($required)
            <span class="error error-star" style="font-size: 20px;line-height: 1;">*</span>
        @endif
    </label>
    <input class="form-control" type="text" name="slug" wire:model="slug" wire:change="isUnique()"
        {{ $required ? 'required' : '' }}>
    @error('slug')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
