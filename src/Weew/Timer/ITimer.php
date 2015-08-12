<?php
namespace Weew\Timer;

interface ITimer {
    /**
     * Start timer.
     */
    function start();

    /**
     * Stop timer.
     */
    function stop();

    /**
     * @return float|null
     */
    function getStartTime();

    /**
     * @return float|null
     */
    function getStopTime();

    /**
     * @param string $from
     * @param string $to
     *
     * @return float
     */
    function getDuration($from = 'start', $to = 'stop');

    /**
     * @param $name
     *
     * @return float|null
     */
    function getCheckpoint($name);

    /**
     * @param $name
     *
     * @return float
     */
    function createCheckpoint($name);

    /**
     * @return array
     */
    function getCheckpoints();
}
