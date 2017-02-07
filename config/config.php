<?php
use Zend\ConfigAggregator\ArrayProvider;
use Zend\ConfigAggregator\ConfigAggregator;
use Zend\ConfigAggregator\PhpFileProvider;

$cacheConfig = [
    'config_cache_path' => 'data/config-cache.php',
];

$aggregator = new ConfigAggregator([
    \Zend\I18n\ConfigProvider::class,
    Zend\Form\ConfigProvider::class,
    Zend\InputFilter\ConfigProvider::class,
    Zend\Filter\ConfigProvider::class,
    Zend\Hydrator\ConfigProvider::class,
    Zend\Router\ConfigProvider::class,
    Zend\Validator\ConfigProvider::class,

    UserAuth\ConfigProvider::class,
    Application\ConfigProvider::class,

    new ArrayProvider($cacheConfig),
    new PhpFileProvider('config/autoload/{{,*.}global,{,*.}local}.php'),
], $cacheConfig['config_cache_path']);

return $aggregator->getMergedConfig();
