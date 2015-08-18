<?php

namespace Tests\Weew\Timer;

use PHPUnit_Framework_TestCase;
use Weew\Timer\Timer;

class TimerTest extends PHPUnit_Framework_TestCase {
    public function test_get_and_create_checkpoint() {
        $timer = new Timer();

        $this->assertNull($timer->getCheckpoint('foo'));
        $this->assertTrue(
            abs($timer->createCheckpoint('foo') - microtime(true)) < 1
        );
        $this->assertTrue(
            abs($timer->getCheckpoint('foo') - microtime(true)) < 1
        );

        $timer->createCheckpoint('bar');

        $this->assertEquals(
            [
                'foo' => $timer->getCheckpoint('foo'),
                'bar' => $timer->getCheckpoint('bar')
            ],
            $timer->getCheckpoints()
        );
    }

    public function test_start_and_stop() {
        $timer = new Timer();
        $timer->start();
        $timer->stop();

        $this->assertNotNull($timer->getStartTime());
        $this->assertNotNull($timer->getStopTime());
        $this->assertTrue(
            abs($timer->getStartTime() - $timer->getStopTime()) < 1
        );

        $this->assertEquals(
            ['start' => $timer->getStartTime(), 'stop' => $timer->getStopTime()],
            $timer->getCheckpoints()
        );
    }

    public function test_duration() {
        $timer = new Timer();
        $timer->start();
        $timer->createCheckpoint('foo');
        sleep(1);

        $this->assertTrue(
            $timer->getDuration('start', 'foo') < 1
        );
        $this->assertTrue(
            $timer->getDuration() > 1 and $timer->getDuration() < 2
        );
        $this->assertTrue(
            $timer->getDuration('foo') > 1 and
            $timer->getDuration('foo') < 2
        );
        $this->assertTrue(
            $timer->getDuration('foo', 'stop') > 1 and
            $timer->getDuration('foo', 'stop') < 2
        );

        sleep(1);
        $timer->stop();
        $this->assertTrue(
            $timer->getDuration('foo') > 2 and
            $timer->getDuration('foo') < 3
        );

        $timer = new Timer();
        $this->assertEquals(0, $timer->getDuration('foo', 'bar'));
    }
}
