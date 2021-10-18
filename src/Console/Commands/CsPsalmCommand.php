<?php

declare(strict_types=1);

namespace LaraPKG\Testing\Console\Commands;

use LaraPKG\Testing\Console\BaseCommand;

use function dirname;

class CsPsalmCommand extends BaseCommand
{
    /**
     * @var string
     */
    protected $signature = 'cs:psalm';

    /**
     * @var string
     */
    protected $description = 'Runs psalm static analysis tool';

    /**
     * Run the psalm static analysis tool.
     */
    public function handle(): int
    {
        $config = dirname(__DIR__, 3) . '/psalm.xml';
        $executable = $this->vendorDir . '/bin/psalm';

        return $this->exec(
            [
                $executable,
                '--config=' . $config,
                '--php-version=8.0',
                '--no-cache',
            ]
        );
    }
}
