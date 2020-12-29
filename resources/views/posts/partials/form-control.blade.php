<div class="form-group">
    <label for="thumbnail">Example file input</label>
    <input type="file" name="thumbnail" class="form-control-file" id="thumbnail">
    @error('thumbnail')
    <p class="text-danger">{{$message}}</p>
    @enderror
</div>
<div class="form-group">
    <label for="title">Title</label>
    <input value="{{ old('title') ?? $post->title}}" type="text" name="title" class="form-control" id="title">
    @error('title')
    <p class="text-danger">{{$message}}</p>
    @enderror
</div>
<div class="form-group" style="width: 30%">
    <label for="category">Category</label>
    <select class="custom-select" name="category_id" id="category_id">
        <option value="" disabled selected>Select One!</option>
        @foreach ($categories as $category)
        <option {{ $post->category_id == $category->id ? 'selected':null }} value="{{ $category->id }}">{{ ucfirst(trans($category->name)) }}</option>
        @endforeach
    </select>
    @error('category')
    <p class="text-danger">{{$message}}</p>
    @enderror
</div>
<div class="form-group">
    <label for="body">Body</label>
    <textarea rows="10" name="body" type="text" class="form-control" id="body">{{ old('body') ?? $post->body}}</textarea>
    @error('body')
    <p class="text-danger">{{$message}}</p>
    @enderror
</div>
<div style="width: 40%" class="form-group">
    <label for="tags">Tag</label>
    <select multiple="multiple" class="select2 custom-select" name="tags[]" id="tags">
        @foreach ($post->tags as $tag)
        <option selected value="{{ $tag->id }}">{{ ucfirst(trans($tag->name)) }}</option>
        @endforeach
        @foreach ($tags as $tag)
        <option value="{{ $tag->id }}">{{ ucfirst(trans($tag->name)) }}</option>
        @endforeach
    </select>
    @error('tag')
    <p class="text-danger">{{$message}}</p>
    @enderror
</div>
