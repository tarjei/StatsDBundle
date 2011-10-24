StatsDBundle
~~~~~~~~~~~~~~

This is a simple bundle that creates a statsd service that you can use to send counters via statsd to graphite.

It is based on the example statsd client found in the statd package:https://github.com/etsy/statsd


Instalation
-----------

Add to deps::

    [SMStatsDBundle]
        git=git://github.com:tarjei/StatsDBundle.git
        target=/bundles/SM/StatsDBundle

Then register the bundle with your kernel::

    
    // app/AppKernel.php
    // in AppKernel::registerBundles()
    $bundles = array(
        // ...
        new SM\StatsDBundle\SMStatsDBundle(),
        // ...
    );

Make sure that you also register the namespaces with the autoloader::

    // app/autoload.php
    $loader->registerNamespaces(array(
        // ...
        'SM\\StatsDBundle' => __DIR__ . '/../vendor/bundles',
    ));

Configuration
-------------

The plugin expects statsd to be running localy 

In your prod/dev environment::

    # app/config/config.yml
    statsd:
        host:
        port:

Defaults::

    statsd:
        host: localhost
        port: 8125
        noop: false

The noop option is if you want the client to be called but not send a signal or connect to statsd.

Usage
-----

Sample usage::

    // MyController.com
    $stats = $this->get('statsd');
    $stats->increment("users");
    $stats->timing("querytime", $time)



For more info see the StatsD.php file. 

TODO
----
* Add loggingservice into the mix
* Consider how we should handle empty stats
* better example
Contributors
-----------------
In lieu of a list of contributors, check out the commit history for the project.
