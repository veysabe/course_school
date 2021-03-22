@extends('admin.layouts.app')

@section('title', $title ?? '')

@section('content')
    @if ($errors->any())
        <div class="border-pink-900 border bg-pink-400 bg-opacity-10 p-2 rounded mb-3 font-medium">
            <ul>
                @foreach($errors->all() as $error)
                    <li> - {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('course.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label for="name">Название</label>
            <input type="text" name="name" id="name"
                   value="{{ old('name') }}"
                   class="mb-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 border-gray-300 rounded-md"
                   placeholder="Название">

            <label for="description">Описание</label>
            <input type="text" name="description" id="description"
                   value="{{ old('description') }}"
                   class="mb-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 border-gray-300 rounded-md"
                   placeholder="Описание">
            @if ($categories->count())
                <label for="parent_category">Категория</label>
                <select name="parent_category" id="parent_category"
                        class="mb-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full border-gray-300 rounded-md">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>

                <select name="category" id="category"
                        class="mb-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full border-gray-300 rounded-md">
                    @foreach($categories as $category)
                        @foreach($category->children as $child)
                            <option value="{{ $child->id }}">{{ $child->name }}</option>
                        @endforeach
                    @endforeach
                </select>
            @endif

            <label for="image">Картинка</label>
            <input type="file" name="image" id="image"
                   class="mb-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full border-gray-300 rounded-md">
        </div>

        <button class="py-2 px-3 bg-green-400 rounded text-white" type="submit">Сохранить</button>
    </form>
@endsection
