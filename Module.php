<?php
namespace PgConsole;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface,
    Zend\ModuleManager\Feature\ConfigProviderInterface,
    Zend\ModuleManager\Feature\ConsoleUsageProviderInterface,
    Zend\Console\Adapter\AdapterInterface as Console;

class Module implements
    AutoloaderProviderInterface,
    ConfigProviderInterface,
    ConsoleUsageProviderInterface
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getConsoleUsage(Console $console)
    {
        return array(
            // Describe available commands
            'console do [all|meh] [--verbose|-v]' => 'Return some data',

            // Describe expected parameters
            array( 'all|meh',          'Add option (defaults to \'all\')' ),
            array( '--verbose|-v',     '(optional) turn on verbose mode'),
        );
    }
}
