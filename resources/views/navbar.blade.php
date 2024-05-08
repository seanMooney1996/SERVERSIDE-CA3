<div class="div_NavBar">
    <div class="navBar_links">

        @if(Auth::check() && Auth::user()->userLevel == 1)
        <a href="addNewCard" class="leftie">Publish your card</a>
        @endif
        @guest
        <a href="login">Log In</a>
        <a href="register">Sign Up</a>
        @endguest
        <a class="active" href="cards">Cards</a>
        <a href="welcome">Home</a>
        @auth
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <a><button type="submit">Logout</button></a>
        </form>
        @endauth
    </div>
</div>
