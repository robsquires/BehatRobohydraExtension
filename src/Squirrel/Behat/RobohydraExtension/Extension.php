<?php

namespace Squirrel\Behat\RobohydraExtension;

use Behat\Behat\Extension\ExtensionInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder,
    Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition,
    Symfony\Component\DependencyInjection\Loader\YamlFileLoader,
    Symfony\Component\Config\FileLocator;

class Extension implements ExtensionInterface
{

    public function load(array $config, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/services'));
        $loader->load('main.yml');

        //potentially move this out into a processPass
        //that understands the robohydra cli api
        //but fine for now
        $container->setParameter(
            'squirrel.behat_robohydra.process.args', 
            array(
                "exec",
                "robohydra",
                $config['conf_file'],
                "-I",
                $config['plugins_path']
            )
            
        );

        $container->setParameter(
            'squirrel.behat_robohydra.process.host',
            $config['host']
        );

        $container->setParameter(
            'squirrel.behat_robohydra.process.dir',
            $config['dir']
        );
    }

    public function getConfig(ArrayNodeDefinition $builder)
    {
        $builder
            ->children()
                ->scalarNode('host')
                    ->defaultValue('localhost:3000')
                ->end()
                ->scalarNode('dir')
                    ->defaultValue('./')
                ->end()
                ->scalarNode('conf_file')
                    ->defaultValue('hydra.conf')
                ->end()
                ->scalarNode('plugins_path')
                    ->defaultValue('plugins')
                ->end()
            ->end();
    }

    public function getCompilerPasses()
    {
        return array();
    }
}
