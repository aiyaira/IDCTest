<?php

namespace App\tests\appbundle\entity;

use PHPUnit\Framework\TestCase;
use App\Entity\Quote;

/**
 * Description of QuoteTest
 *
 * @author Home PC
 */
class QuoteTest extends TestCase {

    //put your code here
    public function testReference() {
        $quote = New Quote();
        $this->assertSame(NULL, $quote->getReference());
        $quote->setReference('test');
        $this->assertSame('test', $quote->getReference());
    }

    public function testAmount() {
        $quote = New Quote();
        $this->assertSame(NULL, $quote->getAmount());
        $quote->setAmount(5.0);
        $this->assertSame(5.0, $quote->getAmount());
    }

    public function testPercentage() {
        $quote = New Quote();
        $this->assertSame(NULL, $quote->getPercentage());
        $quote->setPercentage(6.0);
        $this->assertSame(6.0, $quote->getPercentage());
    }

    public function testTask() {
        $quote = New Quote();
        $this->assertSame(NULL, $quote->getTask());
        $quote->setTask('Test');
        $this->assertSame('Test', $quote->getTask());
    }

    public function testTotalCost() {
        $quote = New Quote();
        $this->assertSame(null, $quote->getTotalCost());
        $quote->setTotalCost(50.0);
        $this->assertSame(50.0, $quote->getTotalCost());
    }

}
