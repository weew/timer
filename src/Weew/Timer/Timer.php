<?php

namespace Weew\Timer;

class Timer implements ITimer {
    const START = 'start';
    const STOP = 'stop';

    /**
     * @var array
     */
    protected $checkpoints = [];

    /**
     * Start timer.
     */
    public function start() {
        $this->createCheckpoint(Timer::START);
    }

    /**
     * Stop timer.
     */
    public function stop() {
        $this->createCheckpoint(Timer::STOP);
    }

    /**
     * @return float|null
     */
    public function getStartTime() {
        return $this->getCheckpoint(Timer::START);
    }

    /**
     * @return float|null
     */
    public function getStopTime() {
        return $this->getCheckpoint(Timer::STOP);
    }

    /**
     * @param string $from
     * @param string $to
     *
     * @return float
     */
    public function getDuration($from = Timer::START, $to = Timer::STOP) {
        $from = $this->getCheckpoint($from);
        $to = $this->getCheckpoint($to);

        if ($from === null) {
            return 0;
        }

        if ($to === null) {
            $to = microtime(true);
        }

        return abs($to - $from);
    }

    /**
     * @param $name
     *
     * @return float|null
     */
    public function getCheckpoint($name) {
        return array_get($this->checkpoints, $name);
    }

    /**
     * @param $name
     *
     * @return float
     */
    public function createCheckpoint($name) {
        $checkpoint = microtime(true);
        array_set($this->checkpoints, $name, $checkpoint);

        return $checkpoint;
    }

    /**
     * @return array
     */
    public function getCheckpoints() {
        return $this->checkpoints;
    }
}
