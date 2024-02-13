<nav class="sidebar show" id="sidebar">
    <section class="sidebar-header pt-5 mt-4 pb-4">
        <a href="/dashboard" class="d-flex mb-5 pt-4 pb-4">
            <img
                src="/images/mainlogo.png"
                style="width: 52px; height: 52px"
                alt="Logo"/>
            <span class="logo-label text-white">
                            {{ config('app.name')}}
                        </span>
        </a>
    </section>
    <ul class="sidebar-menu">
        <li class="sidebar-menu-item">
            <a href="{{ route('dashboard')}}">
                <i class="material-icons">dashboard</i>
                Dashboard
            </a>
        </li>
        @if(request()->user()->role === "admin")
            <li class="sidebar-menu-item">
                <a href="{{ route('institutions.index')}}">
                    <i class="material-icons">category</i>
                    Institutions
                </a>
            </li>
        @endif
        <li class="sidebar-menu-item">
            <a href="{{ route('users.index')}}">
                <i class="material-icons">group</i>Users
            </a>
        </li>
        @if(request()->user()->role === "instadmin")
            <li class="sidebar-menu-item">
                <a href="{{ route('departments.index')}}">
                    <i class="material-icons">category</i>
                    Departments
                </a>
            </li>
            <li class="sidebar-menu-item">
                <a href="{{ route('categories.index')}}">
                    <i class="material-icons">category</i>
                    Categories
                </a>
            </li>
        @endif
        @if(request()->user()->role === "deptadmin")
            <li class="sidebar-menu-item">
                <a href="{{ route('assets.index')}}">
                    <i class="material-icons">category</i>
                    Assets
                </a>
            </li>
        @endif
        <li class="sidebar-menu-item">
            <a href="#"> <i class="material-icons">equalizer</i>Reports </a>
        </li>
    </ul>
    <div style="padding-top: 40vh">
        <form id="logout-form" action="{{ route('logout') }}"
              method="POST" class="d-none">
            @csrf
        </form>
        <ul class="sidebar-menu">
            <li class="sidebar-menu-item">
                <a href="#logout" onclick="document.getElementById('logout-form').submit()">
                    <i class="material-icons">logout</i>Logout
                </a>
            </li>
        </ul>
    </div>
</nav>
