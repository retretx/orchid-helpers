<?php

namespace Rrmode\OrchidHelpers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Orchid\Screen\Action;

class HelpersProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->requiresMacro();
    }

    public function requiresMacro(): void
    {
        Action::macro(name: 'requires', macro: function (string $permission) {
            $this->canSee(value: Auth::user()?->hasAccess(permit: $permission) ?? false);
            return $this;
        });
    }

}