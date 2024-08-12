A new post titled '{{ $post->title }}' has been created by {{ $post->author->name }}.

You can view the post here: {{ url('/api/posts/' . $post->id) }}