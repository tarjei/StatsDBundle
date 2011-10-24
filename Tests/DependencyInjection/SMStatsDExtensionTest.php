<?php

/*
 * This file is part of the SMStatsDBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SM\StatsDBundle\Tests\DependencyInjection;

use SM\StatsDBundle\DependencyInjection\SMStatsDExtension;

class SMStatsDExtensionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers SM\StatsDBundle\DependencyInjection\SMStatsDExtension::load
     */
    public function testLoadFailure()
    {
        $container = $this->getMockBuilder('Symfony\\Component\\DependencyInjection\\ContainerBuilder')
            ->disableOriginalConstructor()
            ->getMock();

        $extension = $this->getMockBuilder('SM\\StatsDBundle\\DependencyInjection\\SMStatsDExtension')
            ->getMock();

        $extension->load(array(array()), $container);
    }

    /**
     * @covers SM\StatsDBundle\DependencyInjection\SMStatsDExtension::load
     */
    public function testLoadSetParameters()
    {
        $container = $this->getMockBuilder('Symfony\\Component\\DependencyInjection\\ContainerBuilder')
            ->disableOriginalConstructor()
            ->getMock();

        $parameterBag = $this->getMockBuilder('Symfony\Component\DependencyInjection\ParameterBag\\ParameterBag')
            ->disableOriginalConstructor()
            ->getMock();

        $parameterBag
            ->expects($this->any())
            ->method('add');

        $container
            ->expects($this->any())
            ->method('getParameterBag')
            ->will($this->returnValue($parameterBag));

        $extension = new SMStatsDExtension();
        $configs = array( array('host' => 'other', 'port' => 'some'));
        $extension->load($configs, $container);
    }


}
