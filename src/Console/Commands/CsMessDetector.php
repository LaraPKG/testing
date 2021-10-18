<?php

declare(strict_types=1);

namespace LaraPKG\Testing\Console\Commands;

use LaraPKG\Testing\Console\BaseCommand;

use function dirname;

class CsMessDetector extends BaseCommand
{
    /**
     * @var string
     */
    protected $signature = 'cs:mess_detector';

    /**
     * @var string
     */
    protected $description = 'Runs php mess detector tool';

    /**
     * Run the mess detector tool.
     */
    public function handle(): int
    {
        $executable = $this->vendorDir . '/bin/phpmd';

        return $this->exec(
            [
                $executable,
                './src',
                'ansi',
                'codesize,controversial,design,cleancode',
            ]
        );
    }
}
