<li><a class="nav-link" href="{{ route('users.index') }}">Manage Users</a></li>
<li><a class="nav-link" href="{{ route('roles.index') }}">Manage Role</a></li>
<li><a class="nav-link" href="{{ route('leads.index') }}">Manage Lead</a></li>
<li><a class="nav-link" href="{{ route('products.index') }}">Manage Products</a></li>
<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
       data-toggle="dropdown"
       aria-haspopup="true" aria-expanded="false" v-pre>
        {{Auth::user()->name}} <span class="caret"></span>
    </a>


    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</li>

