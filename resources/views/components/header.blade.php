<header class="bg-white shadow">
  <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
    <div class="flex h-12 items-center justify-between">
      <div class="flex-shrink-0">
        <!-- Tempat logo atau elemen lain -->
      </div>
      <div class="hidden md:flex md:items-center md:justify-center w-full">
        <div class="flex items-baseline space-x-4">
          <x-nav-link-header-news type="default" href="/politik" :active="request()->is('politik')">Politik</x-nav-link-header-news>
          <x-nav-link-header-news type="default" href="/hukum" :active="request()->is('hukum')">Hukum</x-nav-link-header-news>
          <x-nav-link-header-news type="default" href="/pendidikan" :active="request()->is('pendidikan')">Pendidikan</x-nav-link-header-news>
          <x-nav-link-header-news type="default" href="/olahraga" :active="request()->is('olahraga')">Olahraga</x-nav-link-header-news>
          <x-nav-link-header-news type="default" href="/ekonomi" :active="request()->is('ekonomi')">Ekonomi</x-nav-link-header-news>
        </div>
      </div>
      <div class="md:hidden w-full">
        <div class="px-4 pt-2">
          <div class="flex space-x-4">
            <x-nav-link-header-news type="default" href="/politik" :active="request()->is('politik')" mobile="true">Politik</x-nav-link-header-news>
            <x-nav-link-header-news type="default" href="/hukum" :active="request()->is('hukum')" mobile="true">Hukum</x-nav-link-header-news>
            <x-nav-link-header-news type="default" href="/pendidikan" :active="request()->is('pendidikan')" mobile="true">Pendidikan</x-nav-link-header-news>
            <x-nav-link-header-news type="default" href="/olahraga" :active="request()->is('olahraga')" mobile="true">Olahraga</x-nav-link-header-news>
            <x-nav-link-header-news type="default" href="/ekonomi" :active="request()->is('ekonomi')" mobile="true">Ekonomi</x-nav-link-header-news>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
