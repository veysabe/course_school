@extends('admin.layouts.app')

@section('title', $title ?? '')

@section('content')
    <div>
        <a href="{{ route('course.create') }}" class="rounded px-3 py-2 bg-indigo-400 text-white">Создать курс <span class="font-bold">+</span></a>
    </div>
@endsection
