<aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-0 sidebar-no-expand">
    <!-- Brand Logo -->
    <a href="{{ url(session('def_route')) }}" class="brand-link text-center pb-2 text-truncate" wire:navigate>
        <img src="{{ asset('assets/images/favicon.png') }}" alt="{{ config('setting.general.web_name') }}" class="brand-image img-circle elevation-1" style="opacity: .8">
        <span class="brand-text font-weight-bold" title="{{ config('setting.general.web_name') }}">{{ config('setting.general.web_name') }}</span>
    </a>

    <!-- Sidebar user (optional) -->
    <div class="user-panel user-panel-fixed d-flex align-items-center">
        <div class="image pt-0">
            <img src="{{ asset('assets/images/_photo_profile_blank.png') }}" class="img-circle elevation-2" alt="{{ session('name') }}">
        </div>
        <div class="info pt-1">
            <a href="{{ route('settings.profile') }}" class="d-block text-light" wire:navigate>
                {{ session('name') }}
                <span x-text="$store.navigate.loading"></span>
            </a>
        </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="nav-panel-search border border-top-0 border-left-0 border-right-0 border-secondary">
        <div class="form-inline justify-content-center px-2 pt-2">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="text" placeholder="Search"
                       aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="true">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                {{-- {!! $menuHTML !!} --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
        <button type="button" class="btn btn-default hide-on-collapse btn-block" x-on:click="alert('This is a test button from sidebar!')">
            <i class="fas fa-sign-out-alt"></i>
            <span class="ml-2 hide-on-collapse-all">Test</span>
        </button>
    </div>
    <!-- /.sidebar -->

    <div class="sidebar-custom">
        <x-forms.logout>
            <button type="submit" class="btn btn-default hide-on-collapse btn-block" wire:click="$dispatch('loading')">
                <i class="fas fa-sign-out-alt"></i>
                <span class="ml-2 hide-on-collapse-all">Logout</span>
            </button>
        </x-forms.logout>
    </div>
    <!-- /.sidebar-custom -->
</aside>
<!-- ./ Main Sidebar Container -->
