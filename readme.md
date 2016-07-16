# Simple timer

[![Build Status](https://img.shields.io/travis/weew/timer.svg)](https://travis-ci.org/weew/timer)
[![Code Quality](https://img.shields.io/scrutinizer/g/weew/timer.svg)](https://scrutinizer-ci.com/g/weew/timer)
[![Test Coverage](https://img.shields.io/coveralls/weew/timer.svg)](https://coveralls.io/github/weew/timer)
[![Dependencies](https://img.shields.io/versioneye/d/php/weew:timer.svg)](https://versioneye.com/php/weew:timer)
[![Version](https://img.shields.io/packagist/v/weew/timer.svg)](https://packagist.org/packages/weew/timer)
[![Licence](https://img.shields.io/packagist/l/weew/timer.svg)](https://packagist.org/packages/weew/timer)

## Table of contents

- [Installation](#installation)
- [Introduction](#introduction)
- [Basic usage](#basic-usage)
- [Checkpoints](#checkpoints)
- [Duration between checkpoints](#duration-between-checkpoints)

## Installation

`composer require weew/timer`

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

You can create custom checkpoints whenever and retrieve the elapsed time until the checkpoint was reached.

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

You can measure duration between the checkpoints.

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
