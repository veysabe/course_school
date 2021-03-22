@extends('layouts.app')

@section('content')

    <div class="container m-auto">
        <div class="w-1/2 m-auto flex items-center justify-center h-screen">
            <form action="{{ route('register') }}" method="post" class="p-4 border flex flex-col">
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
                    <label for="name">Имя</label>
                    <input type="text" name="name" id="name"
                           value="{{ old('name') }}"
                           class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7  border-gray-300 rounded-md"
                           placeholder="Имя">
                </div>

                <div class="mb-4">
                    <label for="username">Логин</label>
                    <input type="text" name="username" id="username"
                           value="{{ old('username') }}"
                           class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7  border-gray-300 rounded-md"
                           placeholder="Логин">
                </div>

                <div class="mb-4">
                    <label for="email">Электронная почта</label>
                    <input type="text" name="email" id="email"
                           value="{{ old('email') }}"
                           class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7  border-gray-300 rounded-md"
                           placeholder="example@test.ru">
                </div>

                <div class="mb-2">
                    <label for="password">Пароль</label>
                    <input type="password" name="password" id="password"
                           class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7  border-gray-300 rounded-md"
                           placeholder="Пароль">
                </div>

                <div class="mb-2">
                    <label for="password_confirmation">Подтверждения пароля</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                           class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7  border-gray-300 rounded-md"
                           placeholder="Подтверждения пароля">
                </div>

                <button class="bg-indigo-900 text-white p-2 rounded mt-3" type="submit">Зарегистрироваться</button>
                <a href="{{ route('register') }}" class="text-xs mt-3 text-right underline">Уже зарегистрированы?</a>
            </form>
        </div>
    </div>

@endsection
