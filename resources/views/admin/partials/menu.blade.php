<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item nav-dropdown">
             

            <li class="nav-item">
                <a href="{{ route("admin.users.index") }}"
                    class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-user nav-icon">

                    </i>
                    {{ trans('cruds.user.title') }}
                </a>
            </li>
            </li>
            <li class="nav-item">
                <a href="{{ route("admin.categories.index") }}"
                    class="nav-link {{ request()->is('admin/categories') || request()->is('admin/categories/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-tags nav-icon">

                    </i>
                    {{ trans('cruds.category.title') }}
                </a>
            </li>

            {{--  <li class="nav-item">
                <a href="{{ route("admin.subscription.index") }}"
                    class="nav-link {{ request()->is('admin/subscription') || request()->is('admin/subscription/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-tags nav-icon">

                    </i>
                    {{ trans('cruds.subscription.title') }}
                </a>
            </li>  --}}


            <li class="nav-item">
                <a href="{{ route("admin.locations.index") }}"
                    class="nav-link {{ request()->is('admin/locations') || request()->is('admin/locations/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-map-marker-alt nav-icon">

                    </i>
                    {{ trans('cruds.location.title') }}
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route("admin.companies.index") }}"
                    class="nav-link {{ request()->is('admin/companies') || request()->is('admin/companies/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-building nav-icon">

                    </i>
                    {{ trans('cruds.company.title') }}
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route("admin.jobs.index") }}"
                    class="nav-link {{ request()->is('admin/jobs') || request()->is('admin/jobs/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-briefcase nav-icon">

                    </i>
                    {{ trans('cruds.job.title') }}
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route("admin.payment.index") }}" class="nav-link">
                    <i class="fa-fw fas fa-money-check-alt nav-icon">
                    </i>
                    Payment
                </a>
            </li>


            <li class="nav-item">
                <a href="{{ route("admin.banner.index") }}" class="nav-link">
                    <i class="fa-fw fas fa-image  nav-icon">
                    </i>
                    Banner
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route("admin.advertisement.index") }}" class="nav-link">
                    <i class="fa-fw fas fa-images nav-icon">
                    </i>
                    Advertisement
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route("admin.request.index") }}" class="nav-link">
                    <i class="fa-fw fas fa-briefcase nav-icon">
                    </i>
                    Request Forms
                </a>
            </li>
           <li class="nav-item">
                <a href="{{ route("admin.contactus.index") }}" class="nav-link">
                    <i class="fa-fw fas fa-address-book nav-icon">
                    </i>
                    Conatct Us
                </a>
            </li>
          
            <li class="nav-item">
                <a href="{{ route("admin.news.index") }}" class="nav-link">
                    <i class="fa-fw fas fa-newspaper nav-icon">
                    </i>
                    News
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route("admin.hallticket.index") }}" class="nav-link">
                    <i class="fa-fw fas fa-ticket-alt nav-icon">
                    </i>
                    Hall Ticket
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route("admin.result.index") }}" class="nav-link">
                    <i class="fa-fw fas fa-book-reader nav-icon">
                    </i>
                    Result
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route("admin.setting.index") }}" class="nav-link">
                    <i class="fa-fw fas fa-cog nav-icon">
                    </i>
                   
                    Setting
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link"
                    onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="nav-icon fas fa-fw fa-sign-out-alt">
                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>

    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
