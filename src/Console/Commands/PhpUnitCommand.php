<?php

declare(strict_types=1);

namespace LaraPKG\Testing\Console\Commands;

use LaraPKG\Testing\Console\BaseCommand;
use Symfony\Component\Console\Command\Command;

use function getcwd;
use function file_exists;

class PhpUnitCommand extends BaseCommand
{
    /**
     * @var string
     */
    protected $signature = 'test';

    /**
     * @var string
     */
    protected $description = 'Runs php unit tests';

    /**
     * Runs the php unit tests.
     */
    public function handle(): int
    {
        if (! file_exists(getcwd() . '/phpunit.xml')
            && $this->call(PhpUnitCopyConfigurationCommand::class)
        ) {
            return Command::FAILURE;
        }

        return $this->exec(
            [
                'vendor/bin/phpunit',
            ]
        );
    }
}
