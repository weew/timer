# Simple timer

[![Build Status](https://travis-ci.org/weew/php-timer.svg?branch=master)](https://travis-ci.org/weew/php-timer)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/weew/php-timer/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/weew/php-timer/?branch=master)
[![Coverage Status](https://coveralls.io/repos/weew/php-timer/badge.svg?branch=master&service=github)](https://coveralls.io/github/weew/php-timer?branch=master)
[![License](https://poser.pugx.org/weew/php-timer/license)](https://packagist.org/packages/weew/php-timer)

## Table of contents

- [Installation](#installation)
- [Introduction](#introduction)
- [Basic usage](#basic-usage)
- [Checkpoints](#checkpoints)
- [Duration between checkpoints](#duration-between-checkpoints)

## Installation

`composer require weew/php-timer`

## Introduction

This very simple library can be used to benchmark execution times of your code, or simply whenever you need a stopwatch.

## Basic usage

You can retrieve duration between the timer start and stop.

```php
$timer = new Timer();
$timer->start();
sleep(1);
$timer->stop();
echo $timer->getDuration(); // 1.0234
```

## Checkpoints

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

## Duration between checkpoints

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
