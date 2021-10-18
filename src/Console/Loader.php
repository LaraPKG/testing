<?php

declare(strict_types=1);

namespace LaraPKG\Testing\Console;

use Illuminate\Console\Application;
use Illuminate\Console\Command;
use Illuminate\Support\Str;
use ReflectionClass;
use SplFileInfo;
use Symfony\Component\Finder\Finder;

use function getcwd;

class Loader
{
    private static string $namespace = 'LaraPKG\\Testing\\Console\\Commands\\';
    private Str $str;

    public function __construct(Str $str)
    {
        $this->str = $str;
    }

    /**
     * Register all the commands
     */
    public function loadCommands(Application $artisan): void
    {
        /**
         * @var SplFileInfo $command
         */
        foreach ((new Finder())->in(__DIR__ . '/Commands')->files() as $command) {
            /**
             * @phpcs WebimpressCodingStandard.Commenting.TagWithType.InvalidTypeFormat
             * @var class-string $class
             * @noinspection PhpRedundantVariableDocTypeInspection
             */
            $class = self::$namespace . $this->str->replace('.php', '', $command->getFilename());

            $reflect = new ReflectionClass($class);
            if ($reflect->isAbstract() || ! $reflect->isSubclassOf(Command::class)) {
                continue;
            }

            $artisan->resolve($class);
        }
    }

    /**
     * Used to find the active vendor folder.
     */
    public function vendorPath(): string
    {
        return getcwd() . '/vendor';
    }
}
