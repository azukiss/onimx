<footer class="footer">
    <div class="footer-body">
        <nav class="links">
            <div class="link">
                <a href="#">About</a>
            </div>

            <div class="link">
                <a href="#">Rules</a>
            </div>

            <div class="link">
                <a href="#">Knowledges</a>
            </div>

            <div class="link">
                <a href="{{ route('page.upgrade.index') }}">Upgrade</a>
            </div>

            <div class="link">
                <a href="#">Partners</a>
            </div>
        </nav>
        <div class="socials">
            <a href="#" target="_blank" class="media discord" x-tooltip.raw="Discord">
                <i class="fa-brands fa-discord fa-fw"></i>
            </a>

            <a href="#" target="_blank" class="media telegram" x-tooltip.raw="Telegram">
                <i class="fa-brands fa-telegram fa-fw"></i>
            </a>

            <a href="#" target="_blank" class="media twitter" x-tooltip.raw="Twitter">
                <i class="fa-brands fa-twitter fa-fw"></i>
            </a>

            <a href="#" target="_blank" class="media instagram" x-tooltip.raw="Instagram">
                <i class="fa-brands fa-instagram fa-fw"></i>
            </a>
            </a>

            <a href="#" target="_blank" class="media facebook" x-tooltip.raw="Facebook">
                <i class="fa-brands fa-facebook fa-fw"></i>
            </a>
        </div>
    </div>
</footer>


@hasSection('navbarJS')
    @yield('navbarJS')
@endif
@hasSection('footerJS')
    @yield('footerJS')
@endif

@include('sweetalert::alert')
@livewireScripts
