<?php

declare(strict_types=1);

namespace LaraPKG\Testing\Console\Commands;

use LaraPKG\Testing\Console\BaseCommand;

class PsalterCommand extends BaseCommand
{
    /**
     * @var string
     */
    protected $signature = 'fix:psalter';

    /**
     * @var string
     */
    protected $description = 'Fixes discovered psalm static analysis issues';

    private string $executable = '/bin/psalter';

    private string $phpVersion = '--php-version=8.0';

    /**
     * Run the psalter static analysis fixes
     */
    public function handle(): int
    {
        return $this->exec(
            [
                $this->vendorDir . $this->executable,
                '--issues=MissingReturnType,MissingClosureReturnType,UnnecessaryVarAnnotation,InvalidReturnType,'
                . 'InvalidNullableReturnType,InvalidFalsableReturnType,MissingParamType,MissingPropertyType,'
                . 'MismatchingDocblockParamType,MismatchingDocblockReturnType,LessSpecificReturnType,'
                . 'PossiblyUndefinedVariable,PossiblyUndefinedGlobalVariable,ParamNameMismatch',
                $this->phpVersion,
            ]
        );
    }
}
