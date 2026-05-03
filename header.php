<!doctype html>
<html <?php language_attributes(); ?> class="scroll-smooth">

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php wp_title('|', true, 'right'); ?> L'Îlot Câlins</title>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/output.css" />
    <?php wp_head(); ?>
</head>

<body <?php body_class("mb-12 md:mb-0 font-sans text-gray-800 bg-gray-50"); ?>>
    <header
        class="sticky top-0 z-50 md:bg-white/90 md:backdrop-blur-md md:shadow-sm md:border-b md:border-gray-100">
        <nav
            class="flex flex-col md:flex-row justify-center gap-10 items-center max-w-7xl mx-auto px-4 md:px-8 py-3">
            <img
                class="hidden md:block h-16 md:h-28 w-auto hover:opacity-90 transition-opacity"
                src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/lilotCalinsLogo.png"
                alt="Logo L'îlot Câlins" />

            <!-- Menu Desktop (Masqué sur mobile) -->
            <ul
                class="hidden md:flex flex-row gap-1 justify-center p-1.5 bg-gray-50 border border-gray-100 rounded-full shadow-inner">
                <li
                    class="py-2 px-5 text-sm font-semibold text-gray-600 hover:text-red-500 hover:bg-white hover:shadow-sm rounded-full transition-all cursor-pointer">
                    A propos
                </li>
                <li
                    class="py-2 px-5 text-sm font-semibold text-gray-600 hover:text-red-500 hover:bg-white hover:shadow-sm rounded-full transition-all cursor-pointer">
                    Les enfants
                </li>
                <li
                    class="py-2 px-5 text-sm font-semibold text-gray-600 hover:text-red-500 hover:bg-white hover:shadow-sm rounded-full transition-all cursor-pointer">
                    FAQ
                </li>
                <li
                    class="py-2 px-5 text-sm font-semibold text-gray-600 hover:text-red-500 hover:bg-white hover:shadow-sm rounded-full transition-all cursor-pointer">
                    Contact
                </li>
                <li
                    class="bg-brand-blue py-2 px-5 text-sm font-semibold text-white hover:opacity-80 hover:shadow-sm rounded-full transition-all cursor-pointer">
                    Prise en charge
                </li>
            </ul>
            <button
                class="hidden md:block py-2.5 px-6 text-white font-bold bg-red-500 hover:bg-red-600 rounded-full shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all focus:outline-none">
                Faire un don
            </button>
        </nav>
    </header>

    <!-- =========================================== -->
    <!-- Barre de navigation fixe en bas (Mobile UI) -->
    <!-- =========================================== -->

    <div
        class="fixed bottom-0 left-0 w-full z-40 flex flex-row shadow-[0_-4px_15px_rgba(0,0,0,0.1)] md:hidden">
        <button
            id="open-bottom-menu"
            class="flex-1 py-4 bg-white text-gray-800 font-bold text-lg border-r border-gray-100 hover:bg-gray-50 focus:outline-none">
            Menu
        </button>
        <button
            class="flex-1 py-4 bg-red-400 text-white font-bold text-lg hover:bg-red-500 focus:outline-none">
            Faire un don
        </button>
    </div>

    <!-- Menu Mobile (BottomSheet de bas en haut) -->
    <div id="mobile-bottom-sheet" class="fixed inset-0 z-50 hidden md:hidden">
        <!-- Overlay sombre cliquable pour fermer -->
        <div
            id="mobile-overlay"
            class="absolute inset-0 bg-black/40 opacity-0 transition-opacity duration-300"></div>

        <!-- Conteneur qui monte du bas vers le haut -->
        <div
            id="mobile-menu-content"
            class="absolute bottom-0 left-0 w-full bg-white rounded-t-3xl shadow-2xl transform translate-y-full transition-transform duration-300">
            <div class="flex justify-center items-center p-6 border-b border-gray-100 relative">
                <img
                    class="h-32 w-auto"
                    src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/lilotCalinsLogo.png"
                    alt="Logo L'îlot Câlins" />
                <!-- Croix pour fermer -->
                <button
                    id="close-bottom-menu"
                    class="absolute right-6 p-2 text-gray-500 hover:text-red-400 focus:outline-none bg-gray-100 rounded-full transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <ul class="flex flex-col px-6 py-6 space-y-2 text-xl font-medium">
                <li class="py-3 hover:bg-red-50 rounded-xl px-4 transition cursor-pointer">A propos</li>
                <li class="py-3 hover:bg-red-50 rounded-xl px-4 transition cursor-pointer">
                    Les enfants
                </li>
                <li class="py-3 hover:bg-red-50 rounded-xl px-4 transition cursor-pointer">FAQ</li>
                <li class="py-3 hover:bg-red-50 rounded-xl px-4 transition cursor-pointer">Contact</li>
            </ul>
        </div>
    </div>