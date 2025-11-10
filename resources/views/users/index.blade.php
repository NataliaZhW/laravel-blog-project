@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <h1 class="text-3xl font-bold mb-6">Пользователи</h1>
    
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="divide-y divide-gray-200">
            @foreach($users as $user)
            <div class="p-6 hover:bg-gray-50">
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="text-lg font-semibold">{{ $user->username }}</h3>
                        <p class="text-gray-600">{{ $user->email }}</p>
                        <span class="inline-block bg-{{ $user->status === 'admin' ? 'red' : 'blue' }}-100 text-{{ $user->status === 'admin' ? 'red' : 'blue' }}-800 text-xs px-2 py-1 rounded mt-2">
                            {{ $user->status === 'admin' ? 'Администратор' : 'Пользователь' }}
                        </span>
                    </div>
                    <a href="{{ route('users.show', $user) }}" 
                       class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                        Посты
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection