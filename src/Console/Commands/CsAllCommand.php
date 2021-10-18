<?php

declare(strict_types=1);

namespace LaraPKG\Testing\Console\Commands;

use LaraPKG\Testing\Console\BaseCommand;
use Symfony\Component\Console\Command\Command;

class CsAllCommand extends BaseCommand
{
    /**
     * @var string
     */
    protected $signature = 'cs:all';

    /**
     * @var string
     */
    protected $description = 'Run all coding standards checks';

    public function handle(): int
    {
        $commands = [
            CodeSnifferCommand::class,
            CsPsalmCommand::class,
            CsMessDetector::class,
            CsLocCommand::class,
        ];

        foreach ($commands as $command) {
            if ($this->call($command)) {
                return Command::FAILURE;
            }
        }

        return Command::SUCCESS;
    }
}
