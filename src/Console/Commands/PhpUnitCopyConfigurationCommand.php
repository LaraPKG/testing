<?php

declare(strict_types=1);

namespace LaraPKG\Testing\Console\Commands;

use LaraPKG\Testing\Console\BaseCommand;
use Symfony\Component\Console\Command\Command;

use function dirname;
use function getcwd;
use function sprintf;

class PhpUnitCopyConfigurationCommand extends BaseCommand
{
    /**
     * @var string
     */
    protected $signature = 'test:copy';

    /**
     * @var string
     */
    protected $description = 'Copies the global phpunit configuration file';

    /**
     * Runs the php unit tests.
     */
    public function handle(): int
    {
        $base = dirname(__DIR__, 3) . '/phpunit.xml';
        $destination = getcwd() . '/phpunit.xml';

        if ($base === $destination) {
            return 0;
        }

        if ($this->exec(['cp', '-f', $base, $destination])) {
            return Command::FAILURE;
        }

        $this->line(
            sprintf(
                'Created PHPUnit configuration: <fg=green>' . $destination . '</>',
                $destination
            )
        );

        return Command::SUCCESS;
    }
}
