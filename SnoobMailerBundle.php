<?php

namespace Snoob\Bundle\MailerBundle;

use Snoob\MailerBundle\DependencyInjection\Compiler\OverrideSwiftMailerCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class SnoobMailerBundle extends Bundle
{
    /**
     * {@inheritDoc}
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(new OverrideSwiftMailerCompilerPass());
    }
}
