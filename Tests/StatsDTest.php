<?php
namespace SM\StatsDBundle;


require_once '/home/tarjei/Viddi/nywly/vendor/bundles/SM/StatsDBundle/StatsD.php';

/**
 * Test class for StatsD.
 * Generated by PHPUnit on 2011-10-24 at 13:03:19.
 */
class StatsDTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var StatsD
     */
    protected $statsd;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->statsd = new StatsD("localhost", 8125);
    }

    /**
     */
    public function testTiming()
    {
        $t1 = microtime(true);
        $this->statsd->timing("test.timing",microtime(true) - $t1);
        $this->statsd->timing("test.timing", microtime(true) - $t1);
        $this->statsd->timing("test.timing", microtime(true) - $t1);
    }

    /**
     * @todo Implement testIncrement().
     */
    public function testIncrement()
    {
        $this->statsd->updateStats("test.increment", "5", "1");
        $this->statsd->increment("test.increment", 12);
    }

    /**
     * @todo Implement testDecrement().
     */
    public function testDecrement()
    {
        $this->statsd->updateStats("test.decrement", "5", "1");
        $this->statsd->decrement("test.decrement", 2);
    }

    /**
     * @todo Implement testUpdateStats().
     */
    public function testUpdateStats()
    {
        $this->statsd->updateStats("test.updateStat", "5", "1");
    }
    
    /**
     * @todo Implement testGaugeStats().
     */
    public function testGaugeStats()
    {
        $this->statsd->gauge("test.gaugeStat", "5", "1");
    }
}
