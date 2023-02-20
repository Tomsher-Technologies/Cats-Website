@php
    $randomNum = rand(0, 99);
@endphp

<div class="card mb-4">
    <div class="card-body">
        <h3>{{ $block->name }}</h3>

        <input type="hidden" name="block_id[]" value="{{ $block->id }}">

        @if ($block->has_heading)
            <x-input name="block_heading[{{ $block->id }}]" text="Heading" :model="$block" />
        @endif

        @if ($block->has_content)
            <div class="form-group">
                <label for="name">Content</label>
                <textarea class="form-control" name="block_content[{{ $block->id }}]" id="engEditor{{ $randomNum }}">{!! $block->content !!}</textarea>
            </div>
            <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
            <script>
                var engEditor = ClassicEditor.create(document.querySelector('#engEditor{{ $randomNum }}'));
            </script>
        @endif

        @if ($block->has_button)

            <div class="form-group">
                <label for="Button text">Button text</label>
                <input class="form-control" type="text" id="Button text"
                    name="block_button_text[{{ $block->id }}]" value="{{ $block->button_text }}">
            </div>

            <div class="form-group">
                <label for="Button link">Button link</label>
                <input class="form-control" type="url" id="Button link"
                    name="block_button_url[{{ $block->id }}]" value="{{ $block->button_link }}">
            </div>
        @endif

    </div>
</div>
