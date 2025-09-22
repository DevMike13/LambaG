<?php

namespace App\Providers;

use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // FilamentView::registerRenderHook(
        //     PanelsRenderHook::BODY_END,
        //     fn (): string => Blade::render('<livewire:filament.toast-notification />')
        // );
        FilamentView::registerRenderHook(
            PanelsRenderHook::BODY_END,
            fn (): string => auth()->check()
                ? Blade::render('<livewire:filament.toast-notification />')
                : ''
        );
        
        FilamentView::registerRenderHook(
            PanelsRenderHook::BODY_END,
            fn (): string => Blade::render('<livewire:filament.custom-notification />')
        );
        
        FilamentView::registerRenderHook(
            'panels::auth.login.form.after',
            fn (): View => view('filament.login-extra')
        );

        FilamentView::registerRenderHook(
            'panels::auth.register.form.after',
            fn (): View => view('filament.login-extra')
        );

        FilamentView::registerRenderHook(
            PanelsRenderHook::USER_MENU_BEFORE,
            fn (): string => Blade::render('<livewire:components.notification-bell />')
        );
    }
}
