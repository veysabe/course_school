@extends('layouts.app')

@section('content')

    <div class="container m-auto">
        <div class="w-1/2 m-auto flex items-center justify-center h-screen">
            <form action="{{ route('login') }}" method="post" class="p-4 border flex flex-col">
                @csrf
                @if ($errors->any())
                    <div class="border-pink-900 border bg-pink-400 bg-opacity-10 p-2 rounded mb-3 font-medium">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li> - {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="mb-4">
                    <label for="username">Логин</label>
                    <input type="text" name="username" id="username"
                           value="{{ old('username') }}"
                           class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7  border-gray-300 rounded-md"
                           placeholder="Логин">
                </div>

                <div class="mb-2">
                    <label for="password">Пароль</label>
                    <input type="password" name="password" id="password"
                           class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7  border-gray-300 rounded-md"
                           placeholder="Пароль">
                </div>

                <button class="bg-indigo-900 text-white p-2 rounded mt-3" type="submit">Войти</button>
                <a href="{{ route('register') }}" class="text-xs mt-3 text-right underline">Зарегистрироваться</a>
            </form>
        </div>
    </div>

@endsection
