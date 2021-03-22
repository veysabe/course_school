@extends('admin.layouts.app')

@section('title')
    <div>{{ $title ?? '' }}</div>
    <a href="{{ route('course.create') }}" class="rounded px-3 py-2 bg-indigo-400 text-white text-xs">Создать курс <span
            class="font-bold">+</span></a>
@endsection

@section('content')
    <div class="mb-4">
        У вас <span class="font-bold">{{ $how_much }}</span>
    </div>
    <div class="grid grid-cols-4 gap-4">
        @foreach($courses as $course)
            <div class="rounded-xl overflow-hidden bg-white relative">
                <a href="{{ route('course.show', $course->code) }}" class="absolute inset-0"></a>
                <div class="bg-contain bg-no-repeat bg-center"
                     style="background-image: url('/storage/{{ $course->image }}'); height: 250px;"></div>
                <div class="p-4 flex flex-col text-sm bg-indigo-200 text-gray-700 h-full">
                    <div class="font-bold mb-0.5">{{ $course->name }}</div>
                    <div>{{ $course->description }}</div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
