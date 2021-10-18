<?php

declare(strict_types=1);

namespace LaraPKG\Testing\Console;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class BaseCommand extends Command
{
    protected string $vendorDir;

    public function __construct(Loader $loader)
    {
        $this->vendorDir = $loader->vendorPath();

        parent::__construct();
    }

    /**
     * Run a shell command with real time output.
     *
     * @param array<string> $command
     * @param array<string> $env
     * @param null|mixed $input
     */
    public function exec(
        array $command,
        ?string $cwd = null,
        ?array $env = null,
        $input = null,
        ?float $timeout = 60
    ): int {
        $process = new Process(
            command: $command,
            cwd: $cwd = null,
            env: $env = null,
            input: $input = null,
            timeout: $timeout = 60
        );

        $process->run(
            /** @psalm-suppress UnusedClosureParam */
            function (string $type, string $buffer) {
                $this->output->write($buffer);
            }
        );

        return (int) $process->getExitCode();
    }
}
