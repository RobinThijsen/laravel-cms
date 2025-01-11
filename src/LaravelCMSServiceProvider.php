<?php

namespace LaravelCMS;

use Illuminate\Support\Facades\Blade;
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
            ->hasConfigFile()
            ->hasMigrations()
            ->hasRoute('admin')
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
    }
}
