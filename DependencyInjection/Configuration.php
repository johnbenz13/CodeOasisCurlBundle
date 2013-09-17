<?php

namespace CodeOasis\CurlBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('code_oasis_curl');

        $rootNode
            ->children()
                ->scalarNode('class')->defaultValue('cUrl\HttpBundle\Curl\CurlService')->end()
                ->arrayNode('config')
                    ->children()
                        ->scalarNode('getRequestClass')->isRequired()->end()
                        ->scalarNode('postRequestClass')->isRequired()->end()
                        ->scalarNode('putRequestClass')->isRequired()->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
