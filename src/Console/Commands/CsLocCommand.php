<?php

declare(strict_types=1);

namespace LaraPKG\Testing\Console\Commands;

use LaraPKG\Testing\Console\BaseCommand;

use function dirname;

class CsLocCommand extends BaseCommand
{
    /**
     * @var string
     */
    protected $signature = 'cs:loc';

    /**
     * @var string
     */
    protected $description = 'Runs the phploc tool';

    /**
     * Run the phploc tool.
     */
    public function handle(): int
    {
        $executable = $this->vendorDir . '/bin/phploc';

        return $this->exec(
            [
                $executable,
                './src',
            ]
        );
    }
}
