@auth
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Ciao, {{ Auth::user()->name }}</a>
        <ul class="dropdown-menu">
            <li>
                <a class="dropdown-item" href="#" onclick="event.preventDefault(); document querySelector('#form-logout').submit();">Logout</a>
            </li>
        </ul>
        <form action="{{ route('logout') }}" method="post" class="d-none" id="form-logout">@csrf</form>
    </li>
@else