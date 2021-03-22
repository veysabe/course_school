<div class="bg-white">
    <div class="container m-auto py-5">
        <div class="flex justify-between">
            <a href="/" class="font-bold">
                Course
            </a>
            <div>
                <div class="flex">
                    @auth
                        <a href="{{ route('dashboard') }}" class="mr-3">Админ. панель</a>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit">Выйти</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="mr-3">Войти</a>
                        <a href="{{ route('register') }}">Зарегистрироваться</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
