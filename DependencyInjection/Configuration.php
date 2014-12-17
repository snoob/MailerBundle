<?php

namespace Snoob\Bundle\MailerBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('snoob_mailer');

        //@formater:off
        $rootNode
            ->children()
                //@TODO implementer le multifrom
                ->arrayNode('from')
                    ->useAttributeAsKey('email')
                    ->children()
                        ->scalarNode('email')->isRequired()->cannotBeEmpty()->end()
                        ->scalarNode('name')->isRequired()->cannotBeEmpty()->end()
                    ->end()
                ->end()
                ->scalarNode('locale')->defaultValue('%locale%')->end()
            ->end()
        ->end();
        //@formater:on

        return $treeBuilder;
    }
}
