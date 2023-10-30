<?php

namespace Allenjd3\Scopify\Commands;

use Illuminate\Console\Command;
use Illuminate\Contracts\Console\PromptsForMissingInput;

class ScopifyCommand extends Command implements PromptsForMissingInput
{
    public $signature = 'make:scopify {name : Name of the filter class}';

    public $description = 'Create new filter class';

    public function handle(): int
    {
        $stubPath = __DIR__ . '/../stubs/NameFilter.php.stub';
        $destinationPath = app_path('Filters/' . $this->generateFilterName() . '.php');

        if (! file_exists($destinationPath)) {
            $this->makeDirectory($destinationPath);
            file_put_contents($destinationPath, $this->compileStub($stubPath));
            $this->info('Filter created successfully.');
            return 1;
        } else {
            $this->error('Filter already exists.');
            return 0;
        }
    }

    protected function compileStub(string $stubPath): string
    {
        $stub = file_get_contents($stubPath);
        $stub = str_replace('{{ name }}', $this->generateFilterName(), $stub);
        $stub = str_replace('{{ namespace }}', config('scopify.default-namespace'), $stub);
        return $stub;
    }

    protected function makeDirectory(string $path): void
    {
        if (! is_dir(dirname($path))) {
            mkdir(dirname($path), 0755, true);
        }
    }

    protected  function generateFilterName(): string
    {
        return str($this->argument('name'))->endsWith('Filter')
            ? str($this->argument('name'))->title()
            : str($this->argument('name'))->title() . 'Filter';
    }
}
