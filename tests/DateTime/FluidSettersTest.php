<?php

/*
 * This file is part of the Carbon package.
 *
 * (c) Brian Nesbitt <brian@nesbot.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Cake\Chronos\Test\DateTime;

use Cake\Chronos\Carbon;
use TestFixture;

class FluidSettersTest extends TestFixture
{

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testFluidYearSetter($class)
    {
        $d = $class::now();
        $d = $d->year(1995);
        $this->assertTrue($d instanceof $class);
        $this->assertSame(1995, $d->year);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testFluidMonthSetter($class)
    {
        $d = $class::now();
        $d = $d->month(3);
        $this->assertTrue($d instanceof $class);
        $this->assertSame(3, $d->month);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testFluidMonthSetterWithWrap($class)
    {
        $d = $class::createFromDate(2012, 8, 21);
        $d = $d->month(13);
        $this->assertTrue($d instanceof $class);
        $this->assertSame(1, $d->month);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testFluidDaySetter($class)
    {
        $d = $class::now();
        $d = $d->day(2);
        $this->assertTrue($d instanceof $class);
        $this->assertSame(2, $d->day);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testFluidDaySetterWithWrap($class)
    {
        $d = $class::createFromDate(2000, 1, 1);
        $d = $d->day(32);
        $this->assertTrue($d instanceof $class);
        $this->assertSame(1, $d->day);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testFluidSetDate($class)
    {
        $d = $class::createFromDate(2000, 1, 1);
        $d = $d->setDate(1995, 13, 32);
        $this->assertTrue($d instanceof $class);
        $this->assertCarbon($d, 1996, 2, 1);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testFluidHourSetter($class)
    {
        $d = $class::now();
        $d = $d->hour(2);
        $this->assertTrue($d instanceof $class);
        $this->assertSame(2, $d->hour);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testFluidHourSetterWithWrap($class)
    {
        $d = $class::now();
        $d = $d->hour(25);
        $this->assertTrue($d instanceof $class);
        $this->assertSame(1, $d->hour);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testFluidMinuteSetter($class)
    {
        $d = $class::now();
        $d = $d->minute(2);
        $this->assertTrue($d instanceof $class);
        $this->assertSame(2, $d->minute);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testFluidMinuteSetterWithWrap($class)
    {
        $d = $class::now();
        $d = $d->minute(61);
        $this->assertTrue($d instanceof $class);
        $this->assertSame(1, $d->minute);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testFluidSecondSetter($class)
    {
        $d = $class::now();
        $d = $d->second(2);
        $this->assertTrue($d instanceof $class);
        $this->assertSame(2, $d->second);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testFluidSecondSetterWithWrap($class)
    {
        $d = $class::now();
        $d = $d->second(62);
        $this->assertTrue($d instanceof $class);
        $this->assertSame(2, $d->second);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testFluidSetTime($class)
    {
        $d = $class::createFromDate(2000, 1, 1);
        $d = $d->setTime(25, 61, 61);
        $this->assertTrue($d instanceof $class);
        $this->assertCarbon($d, 2000, 1, 2, 2, 2, 1);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testFluidTimestampSetter($class)
    {
        $d = $class::now();
        $d = $d->timestamp(10);
        $this->assertTrue($d instanceof $class);
        $this->assertSame(10, $d->timestamp);
    }
}