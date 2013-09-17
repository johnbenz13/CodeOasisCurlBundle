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
                ->scalarNode('class')->defaultValue('CodeOasis\CurlBundle\Curl\CurlService')->end()
                ->arrayNode('config')
                    ->prototype('array')
                    ->children()
                        ->scalarNode('getRequestClass')->defaultValue('CodeOasis\CurlBundle\Base\CurlGetRequest')->end()
                        ->scalarNode('postRequestClass')->defaultValue('CodeOasis\CurlBundle\Base\CurlPostRequest')->end()
                        ->scalarNode('putRequestClass')->defaultValue('CodeOasis\CurlBundle\Base\CurlPutRequest')->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
