<div class="form-group">
    <label for="{{ $name }}">{{ $text }}
        @if ($required)
            <span class="text-danger" style="font-size: 20px;line-height: 1;">*</span>
        @endif
    </label>
    <input class="form-control" type="{{ $type }}" id="{{ $name }}" name="{{ $name }}"
        value="{{ $model != '' ? old($name, $model->$name) : old($name) }}" {{ $required ? 'required' : '' }}
        {{ $disabled ? 'disabled' : '' }}>
    @error($name)
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
