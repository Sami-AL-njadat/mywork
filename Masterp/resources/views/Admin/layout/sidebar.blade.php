<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
          <img style="width: 80px; border-radius: 50%;  margin: auto;
" src="{{ asset('front_end/img/core-img/LOGOss.PNG') }}" alt="logo">        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">M$tl</a>
        </div>
        {{-- <ul class="sidebar-menu"> --}}
            {{-- <li class="menu-header">Dashboard</li>
            <li class="dropdown active">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>





            </li> --}}


{{-- 
            <li class="menu-header">Pages</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Auth</span></a> --}}
                {{-- <ul class="dropdown-menu">
                    <li> <a href="{{ route('indexxxs') }}" class="nav-link "><i
                                class="fas fa-fire"></i><span>cartigory</span></a>
                    </li>
                    <li> <a href="{{ route('product.index') }}" class="nav-link "><i
                                class="fas fa-fire"></i><span>product</span></a>
                    </li>
                    <li> <a href="{{ route('users.index') }}" class="nav-link "><i
                                class="fas fa-fire"></i><span>users</span></a>
                    </li>
                    <li> <a href="{{ route('admins.index') }}" class="nav-link "><i
                                class="fas fa-fire"></i><span>admins</span></a>
                    </li>

                          <li> <a href="{{ route('message.index') }}" class="nav-link "><i
                                class="fas fa-fire"></i><span>message</span></a>
                    </li>
                </ul>
            </li>
 --}}

        {{-- </ul> --}}



<br>
<br>
<br>



                    
        <ul class="sidebar-menu">
           
            <li class="">
                <a href="{{ route('dash') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class=""><a class="nav-link" href="{{ route('indexxxs') }}"><i class="fas fa-vector-square"></i> <span>Categories</span></a></li>
            <li class=""><a class="nav-link" href="{{ route('product.index') }}"><i class="fas fa-hand-holding"></i> <span>Product</span></a></li>
            <li class=""><a class="nav-link" href="{{ route('admins.index') }}"><i class="fas fa-user-tie"></i> <span> Admins</span></a></li>
            <li class=""><a class="nav-link" href="{{ route('message.index') }}"><i class="fas fa-envelope"></i> <span> Messages</span></a></li>
           <li class=""><a class="nav-link" href="{{ route('users.index') }}"><i class="fas fa-users"></i> <span>Users</span></a></li>

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







        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div>
    </aside>
</div>
