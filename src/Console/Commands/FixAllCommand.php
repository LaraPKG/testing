<?php

declare(strict_types=1);

namespace LaraPKG\Testing\Console\Commands;

use Symfony\Component\Console\Command\Command;
use LaraPKG\Testing\Console\BaseCommand;

class FixAllCommand extends BaseCommand
{
    /**
     * @var string
     */
    protected $signature = 'fix:all';

    /**
     * @var string
     */
    protected $description = 'Run all fix commands';

    /**
     * Run all of our fixers.
     */
    public function handle() : int
    {
        $commands = [
            CodeBeautifierCommand::class,
            PsalterCommand::class,
        ];

        foreach ($commands as $command) {
            if ($this->call($command)) {
                return Command::FAILURE;
            }
        }

        return Command::SUCCESS;
    }
}
