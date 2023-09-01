<?php

namespace Zakariayacine\LaraMediaMover;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Zakariayacine\LaraMediaMover\Commands\LaraMediaMoverCommand;

class LaraMediaMoverServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laramediamover')
            ->hasConfigFile()
            ->hasViews()
            ->hasCommand(LaraMediaMoverCommand::class);
    }
}
