@if ($post->category->name == 'php')
    <a href="{{ route('posts.filterByCategory', $post->category->name) }}" class="py-1 px-2 bg-primary text-white d-inline-block rounded">{{ ucfirst(trans($post->category->name))}} </a>
@endif
@if ($post->category->name == 'laravel')
    <a href="{{ route('posts.filterByCategory', $post->category->name) }}" class="py-1 px-2 bg-warning d-inline-block rounded text-white">{{ ucfirst(trans($post->category->name)) }}</a>
@endif
@if ($post->category->name == 'javascript')
    <a href="{{ route('posts.filterByCategory', $post->category->name) }}" class="py-1 px-2 bg-info d-inline-block rounded text-white">{{ ucfirst(trans($post->category->name)) }}</a>
@endif
@if ($post->category->name == 'python')
    <a href="{{ route('posts.filterByCategory', $post->category->name) }}" class="py-1 px-2 bg-success d-inline-block rounded text-white">{{ ucfirst(trans($post->category->name)) }}</a>
@endif
@if ($post->category->name == 'html')
    <a href="{{ route('posts.filterByCategory', $post->category->name) }}" class="py-1 px-2 bg-success d-inline-block rounded text-white">{{ ucfirst(trans($post->category->name)) }}</a>
@endif
