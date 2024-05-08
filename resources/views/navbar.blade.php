<div class="div_NavBar">
    <div class="navBar_links">

        @if(Auth::check() && Auth::user()->userLevel == 1)
        <a href="addNewCard" class="leftie">Publish your card</a>
        @endif
        @guest
        <a href="login">Log In</a>
        <a href="register">Sign Up</a>
        @endguest
        <a href="cards">Cards</a>
        <a href="welcome">Home</a>
        @auth

        <a class="logoutbtnA">

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logoutbtn">Logout</button>
        </form>
        </a>

        @endauth
    </div>
</div>
