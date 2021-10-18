<?php

declare(strict_types=1);

namespace LaraPKG\Testing\Console\Commands;

use LaraPKG\Testing\Console\BaseCommand;

use function dirname;

class CodeSnifferCommand extends BaseCommand
{
    /**
     * @var string
     */
    protected $signature = 'cs:code_sniffer';

    /**
     * @var string
     */
    protected $description = 'Run code sniffer detection';

    /**
     * Run php code sniffer detection to find code standards issues.
     */
    public function handle(): int
    {
        // Retrieve the path to the ruleset in this repository
        $baseRuleset = dirname(__DIR__, 3) . '/ruleset.xml';
        $ruleset = $this->vendorDir . '/webimpress/coding-standard/ruleset.xml,' . $baseRuleset;

        return $this->exec(
            [
                './vendor/bin/phpcs',
                '--standard=' . $ruleset,
                'src',
                '-s',
            ]
        );
    }
}
