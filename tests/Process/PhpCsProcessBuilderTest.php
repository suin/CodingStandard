<?php

namespace Symplify\CodingStandard\Tests\Process;

use PHPUnit_Framework_TestCase;
use Symplify\CodingStandard\Process\PhpCsProcessBuilder;

final class PhpCsProcessBuilderTest extends PHPUnit_Framework_TestCase
{
    public function test()
    {
        $builder = new PhpCsProcessBuilder('directory');
        $this->assertSame(
            "'./vendor/bin/phpcs' 'directory' '--colors' '-p' '-s'",
            $builder->getProcess()->getCommandLine()
        );

        $builder->setExtensions('php5');
        $this->assertSame(
            "'./vendor/bin/phpcs' 'directory' '--colors' '-p' '-s' '--extensions=php5'",
            $builder->getProcess()->getCommandLine()
        );

        $builder->setStandard('standard');
        $this->assertSame(
            "'./vendor/bin/phpcs' 'directory' '--colors' '-p' '-s' '--extensions=php5' '--standard=standard'",
            $builder->getProcess()->getCommandLine()
        );
    }
}