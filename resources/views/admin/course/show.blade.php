@extends('admin.layouts.app')

@section('title')
    <div>{{ $title ?? '' }}</div>
@endsection

@section('content')
    <div>
        <form action="{{ route('course.destroy', $course->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="rounded py-2 px-3 bg-red-400">Удалить курс</button>
        </form>

    </div>
@endsection
