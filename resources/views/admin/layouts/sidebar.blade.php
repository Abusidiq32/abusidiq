<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <div class="form-inline mr-auto"></div>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{$about->image}}" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">{{ auth()->user()->name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                {{-- <div class="dropdown-title">Logged in 5 min ago</div> --}}
                <div class="dropdown-title">
                    Logged in {{ str_replace(['minutes', 'minute', ' ago'], ['min', 'min', ' ago'], auth()->user()->last_login_at->diffForHumans()) }}
                </div>
                
                <a href="{{ route('profile.edit') }}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a>
                <a href="{{route('admin.general-settings')}}" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> Settings
                </a>
                <div class="dropdown-divider"></div>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="#"
                        onclick="event.preventDefault();
                                      this.closest('form').submit();"
                        class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </form>


            </div>
        </li>
    </ul>
</nav>
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ url('/') }}" target="_blank">Frontend Page</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard') }}">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item {{setSidebarActive(['dashboard'])}}">
                <a href="{{ route('dashboard') }}" class="nav-link"><i
                        class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>

            <li class="menu-header">Sections</li>
            <li class="nav-item dropdown {{setSidebarActive(['admin.typer-title.*', 'admin.hero.*'])}}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Hero</span></a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{setSidebarActive(['admin.typer-title.index'])}}"><a class="nav-link" href="{{ route('admin.typer-title.index') }}">Typer Title </a></li>
                    <li class="{{setSidebarActive(['admin.hero.index'])}}"><a class="nav-link" href="{{ route('admin.hero.index') }}">Hero section</a></li>

                </ul>
            </li>

            <li class="{{setSidebarActive(['admin.service.index'])}}"><a class="nav-link" href="{{ route('admin.service.index') }}"><i class="fas fa-satellite-dish"></i>
                    <span>Service</span></a></li>

            <li class="{{setSidebarActive(['admin.about.index'])}}"><a class="nav-link" href="{{ route('admin.about.index') }}"><i class="far fa-address-card"></i>
                    <span>About</span></a></li>

            <li class="nav-item dropdown {{setSidebarActive(['admin.portfolio-category.*', 'admin.portfolio-item.*', 'admin.portfolio-settings.*'])}}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-laptop-code"></i>
                    <span>Portfolio</span></a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{setSidebarActive(['admin.portfolio-category.index'])}}"><a class="nav-link" href="{{ route('admin.portfolio-category.index') }}">Portfolio Category</a></li>
                    <li class="{{setSidebarActive(['admin.portfolio-item.index'])}}"><a class="nav-link" href="{{ route('admin.portfolio-item.index') }}">Portfolio Items</a></li>
                    <li class="{{setSidebarActive(['admin.portfolio-settings.index'])}}"><a class="nav-link" href="{{ route('admin.portfolio-settings.index') }}">Portfolio Settings</a>
                    </li>

                </ul>
            </li>

            <li class="nav-item dropdown {{ setSidebarActive(['admin.skills-item.*', 'admin.skills-settings.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-bolt"></i>
                    <span>Skills</span></a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{ setSidebarActive(['admin.skills-item.index']) }}"><a class="nav-link"
                            href="{{ route('admin.skills-item.index') }}">Skills Items</a></li>
                    <li class="{{ setSidebarActive(['admin.skills-settings.index']) }}"><a class="nav-link"
                            href="{{ route('admin.skills-settings.index') }}">Skills Settings</a></li>

                </ul>
            </li>

            <li class="nav-item dropdown {{ setSidebarActive(['admin.experience.*', 'admin.experience-settings.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-star"></i>
                    <span>Experience</span></a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{ setSidebarActive(['admin.experience.index']) }}"><a class="nav-link"
                        href="{{ route('admin.experience.index') }}">Experience Item</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown {{ setSidebarActive(['admin.education.*', 'admin.education-settings.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-star"></i>
                    <span>Education</span></a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{ setSidebarActive(['admin.education.index']) }}"><a class="nav-link"
                            href="{{ route('admin.education.index') }}">Education Item</a></li>

                </ul>
            </li>

            <li class="nav-item dropdown {{ setSidebarActive(['admin.feedback.*', 'admin.feedback-settings.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-star"></i>
                    <span>Feedback</span></a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{ setSidebarActive(['admin.feedback.index']) }}"><a class="nav-link"
                            href="{{ route('admin.feedback.index') }}">Feedback Item</a></li>
                    <li class="{{ setSidebarActive(['admin.feedback-settings.index']) }}"><a class="nav-link"
                            href="{{ route('admin.feedback-settings.index') }}">Feedback Settings</a>
                    </li>

                </ul>
            </li>

            <li
                class="nav-item dropdown {{ setSidebarActive(['admin.blog.*', 'admin.blog-category.*', 'admin.blog-settings.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-th-large"></i>
                    <span>Blog</span></a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{ setSidebarActive(['admin.blog.index']) }}"><a class="nav-link"
                            href="{{ route('admin.blog.index') }}">Blog Lists</a></li>
                    <li class="{{ setSidebarActive(['admin.blog-category.index']) }}"><a class="nav-link"
                            href="{{ route('admin.blog-category.index') }}">Blog Category</a></li>
                    <li class="{{ setSidebarActive(['admin.blog-settings.index']) }}"><a class="nav-link"
                            href="{{ route('admin.blog-settings.index') }}">Blog Settings</a></li>

                </ul>
            </li>

            <li class="{{ setSidebarActive(['admin.contact-settings.index']) }}"><a class="nav-link" href="{{ route('admin.contact-settings.index') }}"><i class="fas fa-envelope"></i>
                    <span>Contact Settings</span></a></li>

            <li
                class="nav-item dropdown {{ setSidebarActive([
                    'admin.footer-social.*',
                    'admin.footer-info.*',
                    'admin.footer-contact.*',
                    'admin.footer-useful.*',
                    'admin.footer-help.*',
                ]) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-object-group"></i>
                    <span>Footer</span></a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{ setSidebarActive(['admin.footer-info.index']) }}"><a class="nav-link"
                            href="{{ route('admin.footer-info.index') }}">Footer Info</a></li>
                    <li class="{{ setSidebarActive(['admin.footer-social.index']) }}"><a class="nav-link"
                            href="{{ route('admin.footer-social.index') }}">Footer Social Links</a></li>
                    <li class="{{ setSidebarActive(['admin.footer-contact.index']) }}"><a class="nav-link"
                            href="{{ route('admin.footer-contact.index') }}">Footer Contact Info</a></li>
                    <li class="{{ setSidebarActive(['admin.footer-useful.index']) }}"><a class="nav-link"
                            href="{{ route('admin.footer-useful.index') }}">Footer Useful Links</a></li>
                    <li class="{{ setSidebarActive(['admin.footer-help.index']) }}"><a class="nav-link"
                            href="{{ route('admin.footer-help.index') }}">Footer Help</a></li>
                </ul>
            </li>

            <li class="menu-header">Settings</li>

            <li><a class="nav-link" href="{{ route('admin.general-settings') }}"><i class="fas fa-cogs"></i>
                <span>Settings</span>
                </a>
            </li>


            {{-- <li><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a></li> --}}


        </ul>
    </aside>
</div>
