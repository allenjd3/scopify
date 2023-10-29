<?php

namespace Allenjd3\Scopify;

use Allenjd3\Scopify\Commands\ScopifyCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

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
