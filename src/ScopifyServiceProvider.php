<?php

namespace Allenjd3\Scopify;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Allenjd3\Scopify\Commands\ScopifyCommand;

class ScopifyServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('scopify')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_scopify_table')
            ->hasCommand(ScopifyCommand::class);
    }
}
