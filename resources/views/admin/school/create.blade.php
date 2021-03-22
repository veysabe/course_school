@extends('layouts.app')

@section('content')
    <div class="container m-auto min-h-screen flex items-center justify-center">
        <div class="w-1/2 flex flex-col">
            <div class="text-4xl font-bold">Создать школу</div>
            <form action="{{ route('school.store') }}" method='post' class="pt-2">
                @csrf
                <input type="text" name="name"
                       class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7  border-gray-300 rounded-md"
                       placeholder="Название" value="Школа {{ auth()->user()->username }}">
                <button
                    class="bg-indigo-500 text-white p-2 rounded mt-3 hover:bg-indigo-700 transition focus:bg-indigo-900 focus:outline-none"
                    type="submit">Подтвердить
                </button>
            </form>
            @if ($errors->any())
                <div class="border-pink-900 border bg-pink-400">
                    <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
@endsection
