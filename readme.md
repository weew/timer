# Simple timer

[![Build Status](https://travis-ci.org/weew/php-timer.svg?branch=master)](https://travis-ci.org/weew/php-timer)
[![Code Climate](https://codeclimate.com/github/weew/php-timer/badges/gpa.svg)](https://codeclimate.com/github/weew/php-timer)
[![License](https://poser.pugx.org/weew/php-timer/license)](https://packagist.org/packages/weew/php-timer)

## Usage

##### Create a timer and get duration

```php
$timer = new Timer();
$timer->start();
sleep(1);
$timer->stop();
echo $timer->getDuration(); // 1.0234
```

##### Accessing checkpoints

```php
$timer = new Timer();
$timer->start();
$timer->createCheckpoint('foo');
$timer->stop();

$timer->getStartTime(); // returns start time in microseconds
$timer->getStopTime(); // returns stop time

$timer->getCheckpoint('start'); // returns start time
$timer->getCheckpoint('stop'); // returns stop time
$timer->getCheckpoint('foo'); // returns time of the checkpoint foo
```

##### Measuring duration between checkpoints

```php
$timer = new Timer();
$timer->createCheckpoint('foo');
sleep(1);
$timer->createCheckpoint('bar');

// returns time elapsed since checkpoint foo till now
$timer->getDuration('foo');
// returns duration between checkpoints foo and bar
$timer->getDuration('foo', 'bar');

$timer->stop();
// returns time between checkpoints foo and stop
$timer->getDuration('foo'); 
```
