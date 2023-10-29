<?php

namespace Allenjd3\Scopify\Commands;

use Illuminate\Console\Command;

class ScopifyCommand extends Command
{
    public $signature = 'scopify';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
