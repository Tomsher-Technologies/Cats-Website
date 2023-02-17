@php
    $disabled = '';
    if ($isedit == 'true') {
        $disabled = 'disabled';
    }
    
@endphp
<div class="card mb-4">
    <div class="card-body">
        <h2>Seo Section</h2>
        <div class="form-group">
            <label for="exampleInputEmail1">SEO Title</label>
            <input class="form-control" type="text" {{ $disabled }} name="seo_title"
                value="{{ $model != '' ? old('seo_title', $model->seo ? $model->seo->title : '') : old('seo_title') }}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">SEO Description</label>
            <textarea class="form-control" name="seo_description" {{ $disabled }}>{{ $model != '' ? old('seo_description', $model->seo ? $model->seo->description : '') : old('seo_description') }}</textarea>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">SEO Keywords</label>
            <p class="mb-1">Comma separated keywords</p>
            <textarea class="form-control" name="seo_keyword" {{ $disabled }}>{{ $model != '' ? old('seo_keyword', $model->seo ? $model->seo->keywords : '') : old('seo_keyword') }}</textarea>
        </div>
        <hr />
        <h5>Facebook Section</h5>
        <div class="form-group">
            <label for="exampleInputEmail1">Facebook Title</label>
            <input class="form-control" type="text" {{ $disabled }} name="og_title"
                value="{{ $model != '' ? old('og_title', $model->seo ? $model->seo->og_title : '') : old('og_title') }}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Facebook Description</label>
            <textarea class="form-control" name="og_description" {{ $disabled }}>{{ $model != '' ? old('og_description', $model->seo ? $model->seo->og_description : '') : old('og_description') }}</textarea>
        </div>
        <hr />
        <h5>Twitter Section</h5>
        <div class="form-group">
            <label for="exampleInputEmail1">Twitter Title</label>
            <input class="form-control" type="text" {{ $disabled }} name="twitter_title"
                value="{{ $model != '' ? old('twitter_title', $model->seo ? $model->seo->twitter_title : '') : old('twitter_title') }}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Twitter Description</label>
            <textarea class="form-control" name="twitter_description" {{ $disabled }}>{{ $model != '' ? old('twitter_description', $model->seo ? $model->seo->twitter_description : '') : old('twitter_description') }}</textarea>
        </div>
    </div>
</div>