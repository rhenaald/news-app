<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @include('layouts.partial.link')
</head>
<body>
<body class="m-0 font-sans text-base antialiased font-normal leading-default bg-zinc-50 text-slate-500">
  </body>
  <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    @if (Laravel\Fortify\Features::canUpdateProfileInformation())
        <div class="mb-10">
            @livewire('profile.update-profile-information-form')
        </div>
        
        <x-section-border />
    @endif

    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
        <div class="mb-10">
            @livewire('profile.update-password-form')
        </div>

        <x-section-border />
    @endif

    @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
        <div class="mb-10">
            @livewire('profile.two-factor-authentication-form')
        </div>

        <x-section-border />
    @endif

    <div class="mb-10">
        @livewire('profile.logout-other-browser-sessions-form')
    </div>

    @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
        <x-section-border />
        
        <div class="mb-10">
            @livewire('profile.delete-user-form')
        </div>
    @endif
</div>
  @include('layouts.partial.script')
</body>
</html>