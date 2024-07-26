<nav class="bg-sky-400" x-data="{ isOpen: false }">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center justify-center w-full">
          <div class="flex-shrink-0">
            <!-- Tempat logo atau elemen lain -->
      </div>
          <div class="hidden md:block">
            <div class="flex items-baseline space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              <x-nav-link-header-news type="nav" href="/" :active="request()->is('/')">Home</x-nav-link-header-news>
              <x-nav-link-header-news type="nav" href="/terkini" :active="request()->is('terkini')">Terkini</x-nav-link-header-news>
              <x-nav-link-header-news type="nav" href="/populer" :active="request()->is('populer')">Terpopuler</x-nav-link-header-news>
              <x-nav-link-header-news type="nav" href="/top-news" :active="request()->is('top-news')">Top News</x-nav-link-header-news>
              <x-nav-link-header-news type="nav" href="/pilihan-editor" :active="request()->is('pilihan-editor')">Pilihan Editor</x-nav-link-header-news>
            </div>
          </div>
        </div>
        <div class="hidden md:block">
          <div class="ml-4 flex items-center md:ml-6">

            <!-- Profile dropdown -->
            <div class="relative ml-3">
              <div>
                <button type="button" @click="isOpen = !isOpen" class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                  <span class="absolute -inset-1.5"></span>
                  <span class="sr-only">Open user menu</span>
                  <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                </button>
              </div>

              <div  x-show="isOpen"
                x-transition:enter="transition ease-out duration-100 transform"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75 transform"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                <!-- Active: "bg-gray-100", Not Active: "" -->
                 @role(['admin','editor'])
                <a href="/dashboard" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Dashboard</a>
                @endrole
                <a href="/profile" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                <form method="POST" action="{{ route('logout') }}" x-data>
                  @csrf
                  <a href="{{ route('login') }}" @click.prevent="$root.submit();" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Logout</a>
                </form>
              </div>
            </div>
          </div>
        </div>


        <div class="-mr-2 flex md:hidden">
          <!-- Mobile menu button -->
          <button type="button" @click="isOpen = !isOpen" 
            class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" aria-controls="mobile-menu" aria-expanded="false">
            <span class="absolute -inset-0.5"></span>
            <span class="sr-only">Open main menu</span>
            <!-- Menu open: "hidden", Menu closed: "block" -->
            <svg :class="{'hidden': isOpen, 'block': !isOpen }" 
                class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <!-- Menu open: "block", Menu closed: "hidden" -->
            <svg :class="{'block': isOpen, 'hidden': !isOpen }"
                class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <x-header></x-header>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div x-show="isOpen" class="md:hidden" id="mobile-menu">
      <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
        <div x-data="{ open: false }" class="relative">
          <div class="flex items-center px-5">
            <div class="flex-shrink-0">
              <img @click="open = !open" class="h-10 w-10 rounded-full cursor-pointer" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
            </div>
            <div class="ml-3">
              <div class="text-base font-medium leading-none text-white">Tom Cook</div>
              <div class="text-sm font-medium leading-none text-white">tom@example.com</div>
            </div>
          </div>

          <!-- Kotak kecil yang muncul di samping foto -->
          <div x-show="open" @click.away="open = false" class="absolute top-10 left-2 mt-2 w-48 bg-white text-white rounded-md shadow-lg">
            <div class="px-4 py-3">
              <x-nav-link-header-news type="default" href="/profile" :active="request()->is('profile')" mobile="true">Your profile</x-nav-link-header-news>
              <x-nav-link-header-news type="default" href="/setting" :active="request()->is('setting')" mobile="true">Setting</x-nav-link-header-news>
              <x-nav-link-header-news type="default" href="/signout" :active="request()->is('sign-out')" mobile="true">Sign out</x-nav-link-header-news>
            </div>
          </div>

        </div>
        <!-- Links di bawah -->
        <x-nav-link-header-news type="nav" href="/" :active="request()->is('/')" mobile="true">Home</x-nav-link-header-news>
        <x-nav-link-header-news type="nav" href="/terkini" :active="request()->is('terkini')" mobile="true">Terkini</x-nav-link-header-news>
        <x-nav-link-header-news type="nav" href="/populer" :active="request()->is('populer')" mobile="true">Terpopuler</x-nav-link-header-news>
        <x-nav-link-header-news type="nav" href="/top-news" :active="request()->is('top-news')" mobile="true">Top News</x-nav-link-header-news>
        <x-nav-link-header-news type="nav" href="/pilihan-editor" :active="request()->is('pilihan-editor')" mobile="true">Pilihan Editor</x-nav-link-header-news>
      </div>
  </div>

  </nav>