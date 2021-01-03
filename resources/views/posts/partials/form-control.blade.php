<div class="h-72 mb-1 relative">
    <div class="flex justify-center items-center absolute w-full h-full">
        <div class="bg-white flex flex-col items-center py-2 px-3 rounded bg-opacity-80">
            <label class="lg:text-xl text-base font-medium" for="thumbnail">Upload Thumbnail</label>
            <input type="file" name="thumbnail" class="w-1/2" id="thumbnail">
        </div>
    </div>
    @if ($post->takeImage)
    <img src="{{ $post->takeImage }}"id="preview-thumbnail" class="w-full object-cover object-center h-64 ring-8 ring-gray-300 rounded border border-gray-600" />
    @endif
    <img src="#"id="preview-thumbnail" class="w-full object-cover object-center h-64 ring-8 ring-gray-300 rounded border border-gray-600 hidden" />
    @error('thumbnail')
    <p class="text-red-500">{{$message}}</p>
    @enderror
</div>
<div class="flex flex-col w-full xl:w-2/4 mb-5">
    <label class="mb-2 font-medium" for="title">Title</label>
    <input value="{{ old('title') ?? $post->title}}" type="text" name="title" class="py-2 px-3 border-gray-400 border ring-gray-300 rounded focus:ring-4 focus:border-gray-800 transition outline-none" id="title">
    @error('title')
    <p class="text-red-500">{{$message}}</p>
    @enderror
</div>
<div class="flex flex-col min-w-min mb-5">
    <label class="mb-3" for="category">Category</label>
    <select class="py-2 px-3 bg-white max-w-sm border-gray-400 border ring-gray-300 rounded  focus:ring-4 focus:border-gray-800 transition outline-none" name="category_id" id="category_id">
        <option value="" disabled selected>Select One!</option>
        @foreach ($categories as $category)
        <option {{ $post->category_id == $category->id ? 'selected':null }} value="{{ $category->id }}">{{ ucfirst(trans($category->name)) }}</option>
        @endforeach
    </select>
    @error('category_id')
    <p class="text-red-500">Choose One!</p>
    @enderror
</div>
<div class="flex flex-col mb-5">
    <label class="mb-2 font-medium" for="body">Body</label>
    <textarea rows="10" name="body" type="text" class="py-2 px-3 border-gray-400 border ring-gray-300 rounded focus:ring-4 focus:border-gray-800 transition outline-none " id="body">{{ old('body') ?? $post->body}}</textarea>
    @error('body')
    <p class="text-red-500">{{$message}}</p>
    @enderror
</div>
<div class="flex flex-col mb-5">
    <label class="font-emdium mb-3" for="tags">Tag</label>
    <select multiple="multiple" class="select2 w-full lg:w-1/2" name="tags[]" id="tags">
        @foreach ($post->tags as $tag)
        <option selected value="{{ $tag->id }}">{{ ucfirst(trans($tag->name)) }}</option>
        @endforeach
        @foreach ($tags as $tag)
        <option value="{{ $tag->id }}">{{ ucfirst(trans($tag->name)) }}</option>
        @endforeach
    </select>
    @error('tag')
    <p class="text-red-500">{{$message}}</p>
    @enderror
</div>
