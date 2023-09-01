<?php

namespace Zakariayacine\LaraMediaMover\Commands;

use Illuminate\Console\Command;

class LaraMediaMoverCommand extends Command
{
    public $signature = 'laramediamover';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
