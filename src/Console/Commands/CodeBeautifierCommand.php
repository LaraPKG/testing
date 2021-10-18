<?php

declare(strict_types=1);

namespace LaraPKG\Testing\Console\Commands;

use function dirname;

use LaraPKG\Testing\Console\BaseCommand;

class CodeBeautifierCommand extends BaseCommand
{
    /**
     * @var string
     */
    protected $signature = 'fix:code_beautifier';

    /**
     * @var string
     */
    protected $description = 'Runs code beautifier to fix cs issues';

    /**
     * Run code beautifier to fix standards issues automatically.
     */
    public function handle(): int
    {
        $baseRuleset = dirname(__DIR__, 3) . '/ruleset.xml';
        $ruleset = $this->vendorDir . '/webimpress/coding-standard/ruleset.xml,' . $baseRuleset;

        return $this->exec(
            [
                './vendor/bin/phpcbf',
                '--standard=' . $ruleset,
                'src',
            ]
        );
    }
}
