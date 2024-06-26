@php
    use App\Constants\Constants;
@endphp

<footer class="mt-24 bg-primary" aria-labelledby="footer-heading">
    <h2 id="footer-heading" class="sr-only">Footer</h2>
    <div class="px-6 pt-16 pb-8 mx-auto max-w-7xl sm:pt-24 lg:px-8 lg:pt-32">
        <div class="xl:grid xl:grid-cols-3 xl:gap-8">
            <div class="space-y-8">
                <img src="{{ asset('logo-white.png') }}" width="150" alt="Logo">
                <p class="text-sm leading-6 text-gray-300">Making the world a better place through constructing elegant
                    hierarchies.</p>
                <div class="flex space-x-6">
                    <a href="{{ Constants::FACEBOOK_URL }}" class="text-gray-500 hover:text-gray-400">
                        <span class="sr-only">Facebook</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="{{ Constants::INSTAGRAM_URL }}" class="text-gray-500 hover:text-gray-400">
                        <span class="sr-only">Instagram</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-8 mt-16 xl:col-span-2 xl:mt-0">
                <div class="md:grid md:grid-cols-2 md:gap-8">
                    <div>
                        <h3 class="text-sm font-semibold leading-6 text-white">Informationen</h3>
                        <ul role="list" class="mt-6 space-y-4">
                            <li>
                                <a href="https://www.google.com/maps/place/Gewerbezone+59,+6018+Buttisholz,+Switzerland/@47.1116212,8.0758895,678m/data=!3m2!1e3!4b1!4m6!3m5!1s0x478fde276a6f0f23:0x5f29a9e362137116!8m2!3d47.1116176!4d8.0784698!16s%2Fg%2F11c5mfs8_s?entry=ttu"
                                    class="text-sm leading-6 text-gray-300 hover:text-white">Gewerbezone 59, 6018 Buttisholz</a>
                            </li>
                            <li>
                                <a href="tel:+41419214025" class="text-sm leading-6 text-gray-300 hover:text-white">+41
                                    41 921 40 25</a>
                            </li>
                            <li>
                                <a href="mailto:info@artlinefotografie.ch"
                                    class="text-sm leading-6 text-gray-300 hover:text-white">info@artlinefotografie.ch</a>
                            </li>
                            <li>
                                <span class="text-sm leading-6 text-gray-300">Öffnungszeiten : Termine
                                    nach Vereinbarung</span>
                            </li>
                        </ul>
                    </div>
                    <div class="mt-10 md:mt-0">
                        <h3 class="text-sm font-semibold leading-6 text-white">ARTLINE FOTOGRAFIE AG</h3>
                        <ul role="list" class="mt-6 space-y-4">
                            <li>
                                <a href="{{ route('frequently-asked-questions') }}"
                                    class="text-sm leading-6 text-gray-300 hover:text-white">HÄUFIG GESTELLTE FRAGEN
                                    (FAQ)</a>
                            </li>
                            <li>
                                <a href="{{ route('impressum') }}"
                                    class="text-sm leading-6 text-gray-300 hover:text-white">IMPRESSUM</a>
                            </li>
                            <li>
                                <a href="{{ route('general-terms-and-conditions') }}"
                                    class="text-sm leading-6 text-gray-300 hover:text-white">AGB</a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <div class="pt-8 mt-16 border-t border-white/10 sm:mt-20 lg:mt-24">
            <p class="text-xs leading-5 text-gray-400">&copy; ARTLINE FOTOGRAFIE AG
                2024 | Developed by <a target="_blank" href="https://bluzz.ch" class="text-white">Bluzz</a>
        </div>
    </div>
</footer>
