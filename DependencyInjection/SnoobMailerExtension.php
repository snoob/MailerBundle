<?php

namespace Snoob\Bundle\MailerBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

class NuxiaMailerExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ .'/../Resources/config'));
        $container->setParameter('mailer.parameters', $config);
        if (in_array('twig', $container->getParameter('templating.engines'))) {
            $loader->load('services/twig.yml');
        }
    }
}
