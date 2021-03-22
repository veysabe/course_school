<div class="bg-indigo-900 text-white h-screen fixed w-1/6">
    <div class="text-xl font-bold border-b">
        <div class="p-3"><a href="/">{{ auth()->user()->school->name }}</a></div>
    </div>
    <div class="mt-4 p-3">
        <ul>
            <li>
                <a href="{{route('course.index')}}">Курсы</a>
            </li>
        </ul>
    </div>
</div>
