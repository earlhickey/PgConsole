<?php
namespace PgConsole;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface,
    Zend\ModuleManager\Feature\ConfigProviderInterface,
    Zend\ModuleManager\Feature\ConsoleUsageProviderInterface,
    Zend\ModuleManager\Feature\ConsoleBannerProviderInterface,
    Zend\Console\Adapter\AdapterInterface as Console;

class Module implements
    AutoloaderProviderInterface,
    ConfigProviderInterface,
    ConsoleUsageProviderInterface,
    ConsoleBannerProviderInterface
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

    /**
     * This method is defined in ConsoleBannerProviderInterface
     */
    public function getConsoleBanner(Console $console){
        return
            "--------------------------------------------------------------\n" .
            "          Welcome to my ZF2 Console-enabled app               \n" .
            "--------------------------------------------------------------\n" .
            "Version 0.0.1\n"
        ;
    }

    public function getConsoleUsage(Console $console)
    {
        return array(
            // Describe available commands
            'console do [all|meh] [--verbose|-v]'         => 'Return some data',

            // Describe expected parameters
            array( 'all|meh',          'Add option (defaults to \'all\')' ),
            array( '--verbose|-v',     '(optional) turn on verbose mode'),
        );
    }
}
