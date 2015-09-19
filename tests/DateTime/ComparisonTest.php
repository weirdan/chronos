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

class ComparisonTest extends TestFixture
{

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testEqualToTrue($class)
    {
        $this->assertTrue($class::createFromDate(2000, 1, 1)->eq(Carbon::createFromDate(2000, 1, 1)));
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testEqualToFalse($class)
    {
        $this->assertFalse($class::createFromDate(2000, 1, 1)->eq(Carbon::createFromDate(2000, 1, 2)));
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testEqualWithTimezoneTrue($class)
    {
        $this->assertTrue($class::create(2000, 1, 1, 12, 0, 0, 'America/Toronto')->eq(Carbon::create(2000, 1, 1, 9, 0,
            0, 'America/Vancouver')));
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testEqualWithTimezoneFalse($class)
    {
        $this->assertFalse($class::createFromDate(2000, 1, 1, 'America/Toronto')->eq(Carbon::createFromDate(2000, 1, 1,
            'America/Vancouver')));
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testNotEqualToTrue($class)
    {
        $this->assertTrue($class::createFromDate(2000, 1, 1)->ne(Carbon::createFromDate(2000, 1, 2)));
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testNotEqualToFalse($class)
    {
        $this->assertFalse($class::createFromDate(2000, 1, 1)->ne(Carbon::createFromDate(2000, 1, 1)));
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testNotEqualWithTimezone($class)
    {
        $this->assertTrue($class::createFromDate(2000, 1, 1, 'America/Toronto')->ne(Carbon::createFromDate(2000, 1, 1,
            'America/Vancouver')));
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testGreaterThanTrue($class)
    {
        $this->assertTrue($class::createFromDate(2000, 1, 1)->gt(Carbon::createFromDate(1999, 12, 31)));
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testGreaterThanFalse($class)
    {
        $this->assertFalse($class::createFromDate(2000, 1, 1)->gt(Carbon::createFromDate(2000, 1, 2)));
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testGreaterThanWithTimezoneTrue($class)
    {
        $dt1 = $class::create(2000, 1, 1, 12, 0, 0, 'America/Toronto');
        $dt2 = $class::create(2000, 1, 1, 8, 59, 59, 'America/Vancouver');
        $this->assertTrue($dt1->gt($dt2));
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testGreaterThanWithTimezoneFalse($class)
    {
        $dt1 = $class::create(2000, 1, 1, 12, 0, 0, 'America/Toronto');
        $dt2 = $class::create(2000, 1, 1, 9, 0, 1, 'America/Vancouver');
        $this->assertFalse($dt1->gt($dt2));
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testGreaterThanOrEqualTrue($class)
    {
        $this->assertTrue($class::createFromDate(2000, 1, 1)->gte(Carbon::createFromDate(1999, 12, 31)));
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testGreaterThanOrEqualTrueEqual($class)
    {
        $this->assertTrue($class::createFromDate(2000, 1, 1)->gte(Carbon::createFromDate(2000, 1, 1)));
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testGreaterThanOrEqualFalse($class)
    {
        $this->assertFalse($class::createFromDate(2000, 1, 1)->gte(Carbon::createFromDate(2000, 1, 2)));
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testLessThanTrue($class)
    {
        $this->assertTrue($class::createFromDate(2000, 1, 1)->lt(Carbon::createFromDate(2000, 1, 2)));
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testLessThanFalse($class)
    {
        $this->assertFalse($class::createFromDate(2000, 1, 1)->lt(Carbon::createFromDate(1999, 12, 31)));
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testLessThanOrEqualTrue($class)
    {
        $this->assertTrue($class::createFromDate(2000, 1, 1)->lte(Carbon::createFromDate(2000, 1, 2)));
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testLessThanOrEqualTrueEqual($class)
    {
        $this->assertTrue($class::createFromDate(2000, 1, 1)->lte(Carbon::createFromDate(2000, 1, 1)));
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testLessThanOrEqualFalse($class)
    {
        $this->assertFalse($class::createFromDate(2000, 1, 1)->lte(Carbon::createFromDate(1999, 12, 31)));
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testBetweenEqualTrue($class)
    {
        $this->assertTrue($class::createFromDate(2000, 1, 15)->between(Carbon::createFromDate(2000, 1, 1),
            $class::createFromDate(2000, 1, 31), true));
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testBetweenNotEqualTrue($class)
    {
        $this->assertTrue($class::createFromDate(2000, 1, 15)->between(Carbon::createFromDate(2000, 1, 1),
            $class::createFromDate(2000, 1, 31), false));
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testBetweenEqualFalse($class)
    {
        $this->assertFalse($class::createFromDate(1999, 12, 31)->between(Carbon::createFromDate(2000, 1, 1),
            $class::createFromDate(2000, 1, 31), true));
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testBetweenNotEqualFalse($class)
    {
        $this->assertFalse($class::createFromDate(2000, 1, 1)->between(Carbon::createFromDate(2000, 1, 1),
            $class::createFromDate(2000, 1, 31), false));
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testBetweenEqualSwitchTrue($class)
    {
        $this->assertTrue($class::createFromDate(2000, 1, 15)->between(Carbon::createFromDate(2000, 1, 31),
            $class::createFromDate(2000, 1, 1), true));
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testBetweenNotEqualSwitchTrue($class)
    {
        $this->assertTrue($class::createFromDate(2000, 1, 15)->between(Carbon::createFromDate(2000, 1, 31),
            $class::createFromDate(2000, 1, 1), false));
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testBetweenEqualSwitchFalse($class)
    {
        $this->assertFalse($class::createFromDate(1999, 12, 31)->between(Carbon::createFromDate(2000, 1, 31),
            $class::createFromDate(2000, 1, 1), true));
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testBetweenNotEqualSwitchFalse($class)
    {
        $this->assertFalse($class::createFromDate(2000, 1, 1)->between(Carbon::createFromDate(2000, 1, 31),
            $class::createFromDate(2000, 1, 1), false));
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testMinIsFluid($class)
    {
        $dt = $class::now();
        $this->assertTrue($dt->min() instanceof $class);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testMinWithNow($class)
    {
        $dt = $class::create(2012, 1, 1, 0, 0, 0)->min();
        $this->assertCarbon($dt, 2012, 1, 1, 0, 0, 0);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testMinWithInstance($class)
    {
        $dt1 = $class::create(2013, 12, 31, 23, 59, 59);
        $dt2 = $class::create(2012, 1, 1, 0, 0, 0)->min($dt1);
        $this->assertCarbon($dt2, 2012, 1, 1, 0, 0, 0);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testMaxIsFluid($class)
    {
        $dt = $class::now();
        $this->assertTrue($dt->max() instanceof $class);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testMaxWithNow($class)
    {
        $dt = $class::create(2099, 12, 31, 23, 59, 59)->max();
        $this->assertCarbon($dt, 2099, 12, 31, 23, 59, 59);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testMaxWithInstance($class)
    {
        $dt1 = $class::create(2012, 1, 1, 0, 0, 0);
        $dt2 = $class::create(2099, 12, 31, 23, 59, 59)->max($dt1);
        $this->assertCarbon($dt2, 2099, 12, 31, 23, 59, 59);
    }

    /**
     * @dataProvider classNameProvider
     * @return void
     */
    public function testIsBirthday($class)
    {
        $dt1 = $class::createFromDate(1987, 4, 23);
        $dt2 = $class::createFromDate(2014, 9, 26);
        $dt3 = $class::createFromDate(2014, 4, 23);
        $this->assertFalse($dt2->isBirthday($dt1));
        $this->assertTrue($dt3->isBirthday($dt1));
    }
}