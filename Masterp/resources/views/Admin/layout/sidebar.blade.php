<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}"><img src="{{asset('backend/assets/img/logo/logo1.png')}}" alt="Ecogreen" style="width: 30%; margin: 10px 40px 50px 0px; height:60px" ></a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.dashboard') }}"><img src="{{asset('backend/assets/img/logo/logo2.png')}}" alt="Ecogreen" style="width: 80%"></a>
        </div>
    
        <ul class="sidebar-menu">
           
            <li class="{{ setActive(['admin.dashboard']) }}">
                <a href="{{ route('admin.dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="{{ setActive(['users.*']) }}"><a class="nav-link" href="{{ route('users.index') }}"><i class="fas fa-users"></i> <span>Users</span></a></li>
            <li class="{{ setActive(['category.*']) }}"><a class="nav-link" href="{{ route('category.index') }}"><i class="fas fa-vector-square"></i> <span>Categories</span></a></li>
            <li class="{{ setActive(['projects.*']) }}"><a class="nav-link" href="{{ route('projects.index') }}"><i class="fas fa-hand-holding"></i> <span>Projects</span></a></li>
            <li class="{{ setActive(['admins.*']) }}"><a class="nav-link" href="{{ route('admins.index') }}"><i class="fas fa-user-tie"></i> <span> Admins</span></a></li>
            <li class="{{ setActive(['messages.*']) }}"><a class="nav-link" href="{{ route('messages.index') }}"><i class="fas fa-envelope"></i> <span> Messages</span></a></li>
            {{-- <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i>
                    <span>Forms</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="forms-advanced-form.html">Advanced Form</a></li>
                    <li><a class="nav-link" href="forms-editor.html">Editor</a></li>
                    <li><a class="nav-link" href="forms-validation.html">Validation</a></li>
                </ul>
            </li> --}}
        </ul>
    </aside>
</div>
