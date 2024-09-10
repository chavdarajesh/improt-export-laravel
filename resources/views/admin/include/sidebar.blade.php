@php $current_route_name = Route::currentRouteName();
        use App\Models\SiteSetting;
        $headerLogo = SiteSetting::getSiteSettings('header_logo');
@endphp ?>
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('admin.dashboard') }}" class="app-brand-link">

            <span class="app-brand-text demo menu-text fw-bolder ms-2"><img width="150"
                    src="{{ isset($headerLogo) && isset($headerLogo->value) && $headerLogo != null ? asset($headerLogo->value) : asset('custom-assets/admin/siteimages/logo/header-logo.png') }}"
                    alt="Header Logo"></span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>
    <div class="divider">
        <hr>
    </div>
    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item  {{ $current_route_name == 'admin.dashboard' ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div>Dashboard</div>
            </a>
        </li>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Module</span>
        </li>
        <li
            class="menu-item  {{ $current_route_name == 'admin.homeslider.index' || $current_route_name == 'admin.homeslider.create' || $current_route_name == 'admin.homeslider.edit' || $current_route_name == 'admin.homeslider.view' ? 'active' : '' }}">
            <a href="{{ route('admin.homeslider.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-calendar-star"></i>
                <div>HomeSlider</div>
            </a>
        </li>
        <li
            class="menu-item  {{ $current_route_name == 'admin.sisterscompanylogo.index' || $current_route_name == 'admin.sisterscompanylogo.create' || $current_route_name == 'admin.sisterscompanylogo.edit' || $current_route_name == 'admin.sisterscompanylogo.view' ? 'active' : '' }}">
            <a href="{{ route('admin.sisterscompanylogo.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-wallet-alt"></i>
                <div>Sisters Company Logo</div>
            </a>
        </li>

        <li
            class="menu-item  {{ $current_route_name == 'admin.categorys.index' || $current_route_name == 'admin.categorys.create' || $current_route_name == 'admin.categorys.edit' || $current_route_name == 'admin.categorys.view' ? 'active' : '' }}">
            <a href="{{ route('admin.categorys.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-category-alt"></i>
                <div>Category</div>
            </a>
        </li>
        <li
            class="menu-item  {{ $current_route_name == 'admin.subcategorys.index' || $current_route_name == 'admin.subcategorys.create' || $current_route_name == 'admin.subcategorys.edit' || $current_route_name == 'admin.subcategorys.view' ? 'active' : '' }}">
            <a href="{{ route('admin.subcategorys.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-category-alt"></i>
                <div>Sub Category</div>
            </a>
        </li>
        <li
            class="menu-item  {{ $current_route_name == 'admin.subsubcategorys.index' || $current_route_name == 'admin.subsubcategorys.create' || $current_route_name == 'admin.subsubcategorys.edit' || $current_route_name == 'admin.subsubcategorys.view' ? 'active' : '' }}">
            <a href="{{ route('admin.subsubcategorys.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-category-alt"></i>
                <div>Sub Sub Category</div>
            </a>
        </li>


        <li class="menu-item {{ $current_route_name == 'admin.contact.messages.index' || $current_route_name == 'admin.contact.settings.index' || $current_route_name == 'admin.contact.messages.view' ? 'open active' : '' }}"
            style="">
            <a href="{{ route('admin.contact.messages.index') }}" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons bx bxs-contact'></i>
                <div data-i18n="Layouts">Contacts</div>
            </a>
            <ul class="menu-sub">
                <li
                    class="menu-item {{ $current_route_name == 'admin.contact.messages.index' || $current_route_name == 'admin.contact.messages.view' ? 'active' : '' }}">
                    <a href="{{ route('admin.contact.messages.index') }}" class="menu-link">
                        <i class='menu-icon tf-icons bx bxs-contact'></i>
                        <div data-i18n="Without menu">Contact Enquirys</div>
                    </a>
                </li>
                <li class="menu-item {{ $current_route_name == 'admin.contact.settings.index' ? 'active' : '' }}">
                    <a href="{{ route('admin.contact.settings.index') }}" class="menu-link">
                        <i class='menu-icon tf-icons bx bxs-contact'></i>
                        <div data-i18n="Without menu">Contact Settings</div>
                    </a>
                </li>
            </ul>
        </li>




        <li class="menu-item {{ $current_route_name == 'admin.newsletters.index' || $current_route_name == 'admin.newsletters.create' || $current_route_name == 'admin.newsletters.edit' || $current_route_name == 'admin.newsletters.view' || $current_route_name == 'admin.newslettermails.index' || $current_route_name == 'admin.newslettermails.create' || $current_route_name == 'admin.newslettermails.edit' || $current_route_name == 'admin.newslettermails.view' ? 'open active' : '' }}"
            style="">
            <a href="{{ route('admin.newsletters.index') }}" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons bx bxs-envelope'></i>
                <div data-i18n="Layouts">Newsletter</div>
            </a>

            <ul class="menu-sub">
                <li
                    class="menu-item  {{ $current_route_name == 'admin.newsletters.index' || $current_route_name == 'admin.newsletters.create' || $current_route_name == 'admin.newsletters.edit' || $current_route_name == 'admin.newsletters.view' ? 'active' : '' }}">
                    <a href="{{ route('admin.newsletters.index') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bxs-envelope"></i>
                        <div>Newsletter</div>
                    </a>
                </li>
                <li
                    class="menu-item  {{ $current_route_name == 'admin.newslettermails.index' || $current_route_name == 'admin.newslettermails.create' || $current_route_name == 'admin.newslettermails.edit' || $current_route_name == 'admin.newslettermails.view' ? 'active' : '' }}">
                    <a href="{{ route('admin.newslettermails.index') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-mail-send"></i>
                        <div>Newsletter Mails</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Settings</span>
        </li>
        <li class="menu-item {{ $current_route_name == 'admin.profile.settings.password.index' || $current_route_name == 'admin.profile.setting.index' ? 'open active' : '' }}"
            style="">
            <a href="{{ route('admin.profile.settings.password.index') }}" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons bx bxs-user-account'></i>
                <div data-i18n="Layouts">Admin Profile</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{ $current_route_name == 'admin.profile.setting.index' ? 'active' : '' }}">
                    <a href="{{ route('admin.profile.setting.index') }}" class="menu-link">
                        <div data-i18n="Without menu">Profile Setting</div>
                    </a>
                </li>
                <li
                    class="menu-item {{ $current_route_name == 'admin.profile.settings.password.index' ? 'active' : '' }}">
                    <a href="{{ route('admin.profile.settings.password.index') }}" class="menu-link ">
                        <div data-i18n="Without menu">Password Setting</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item  {{ $current_route_name == 'admin.site.settings.index' ? 'active' : '' }}">
            <a href="{{ route('admin.site.settings.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-cog"></i>
                <div>Site Settings</div>
            </a>
        </li>

    </ul>
</aside>
