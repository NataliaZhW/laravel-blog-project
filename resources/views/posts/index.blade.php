@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold">Все посты</h1>
    <a href="{{ route('posts.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
        Создать пост
    </a>
</div>

<div class="space-y-6">
    @foreach($posts as $post)
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex justify-between items-start mb-4">
            <div>
                <h2 class="text-xl font-semibold">{{ $post->user->username }}</h2>
                <p class="text-gray-500 text-sm">{{ $post->created_at->format('d.m.Y H:i') }}</p>
            </div>
            @if(Auth::id() === $post->user_id || Auth::user()->isAdmin())
            <div class="flex space-x-2">
                <a href="{{ route('posts.edit', $post) }}" class="text-blue-600 hover:text-blue-800">Редактировать</a>
                <form method="POST" action="{{ route('posts.destroy', $post) }}" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:text-red-800" onclick="return confirm('Удалить пост?')">Удалить</button>
                </form>
            </div>
            @endif
        </div>
        <p class="text-gray-700 whitespace-pre-line">{{ $post->content }}</p>
    </div>
    @endforeach
</div>
@endsection