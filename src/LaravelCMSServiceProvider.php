<?php

namespace LaravelCMS;

use Illuminate\Support\Facades\Blade;
use LaravelCMS\Livewire\Admin\Dashboard;
use LaravelCMS\Livewire\Admin\Pages\PageDetail;
use LaravelCMS\Livewire\Admin\Pages\Pages;
use LaravelCMS\Livewire\Auth\Login;
use LaravelCMS\Livewire\Auth\ResetPassword;
use Livewire\Livewire;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelCMSServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-cms')
            ->hasViews()
            ->hasConfigFile()
            ->hasMigrations('create_cms_tables')
            ->hasRoute('admin')
            ->publishesServiceProvider('LaravelCMSServiceProvider')
            ->hasInstallCommand(function (InstallCommand $command) {
                $command->startWith(function (InstallCommand $command) {
                    $command->info('Welcome to the Laravel CMS installation process');
                })->publishConfigFile()
                    ->publishMigrations()
                    ->askToRunMigrations()
                    ->copyAndRegisterServiceProviderInApp()
                    ->endWith(function (InstallCommand $command) {
                        $command->info('Laravel CMS has been installed successfully !');
                        $command->comment('Thanks for using Laravel CMS');
                    });
            });
    }

    public function bootingPackage(): void
    {
        Blade::componentNamespace('LaravelCMS\\View\\Components\\Form\\', 'form');
        $this->registerLivewireComponent();
    }

    private function registerLivewireComponent(): void
    {
        Livewire::component('login', Login::class);
        Livewire::component('reset-password', ResetPassword::class);
        Livewire::component('dashboard', Dashboard::class);
        Livewire::component('pages', Pages::class);
        Livewire::component('page-detail', PageDetail::class);
    }
}
