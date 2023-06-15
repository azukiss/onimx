<aside class="side-bar">
    <nav class="space-y-1">
        <a href="{{ route('user.settings.account') }}" class="nav-link @if(Route::is('user.settings.account')) active @else not-active @endif">
            <i class="fa-solid fa-cog fa-fw"></i>
            <span class="truncate">Account Preferences</span>
        </a>
        <a href="{{ route('user.settings.password') }}" class="nav-link @if(Route::is('user.settings.password')) active @else not-active @endif">
            <i class="fa-solid fa-lock fa-fw"></i>
            <span class="truncate">Password</span>
        </a>
        <a href="{{ route('user.settings.2fa') }}" class="nav-link @if(Route::is('user.settings.2fa')) active @else not-active @endif">
            <i class="fa-solid fa-fingerprint fa-fw"></i>
            <span class="truncate">{{ __('Two Factor Authentication') }}</span>
        </a>
    </nav>
</aside>
