<?php

declare(strict_types=1);

use Paul\Calculators\BaseToBaseConvertor;
use Paul\Calculators\BinaryToDecimalConvertor;
use PHPUnit\Framework\TestCase;



final class TestConverters extends TestCase
{

    /**
     * Teste le convertisseur BinaryToDecimal
     */
    public function testBinaryDoDecimal(): void
    {
        $converter = new BinaryToDecimalConvertor();
        $this->assertSame($converter->convertToDecimalProcedural('101'), $converter->convertToDecimalRecursive('101'));
        $this->assertSame($converter->convertToDecimalProcedural('1010'), '10');
        $this->assertSame($converter->convertToDecimalRecursive('11'), '3');
    }



    /**
     * Test le convertisseur général, d'une base quelconque vers une autre
     */
    public function testBaseToBase(): void
    {
        $converter = new BaseToBaseConvertor();
        $this->assertSame($converter->convert('2', '2', '0'), '0');
        $this->assertSame($converter->convert('2', '2', '1'), '1');
        $this->assertSame($converter->convert('2', '10', '100'), '4');
        $this->assertSame($converter->convert('2', '10', '10'), '2');
        $this->assertSame($converter->convert('10', '2', '4'), '100');
        $this->assertSame($converter->convert('10', '11', '10'), '[10]');
        $this->assertSame($converter->convert('10', '11', '11'), '10');
        $this->assertSame($converter->convert('11', '10', '[10]'), '10');
        $this->assertSame($converter->convert('11', '10', '10'), '11');
        $this->assertSame($converter->convert('100', '2', '2'), '10');
        $this->assertSame($converter->convert('100', '2', '10'), '1100100');
        $this->assertSame($converter->convert('72', '10', '[71]'), '71');
        $this->assertSame($converter->convert('10', '72', '72'), '10');
        $this->assertSame($converter->convert('10', '72', '73'), '11');
        $this->assertSame($converter->convert('1000', '10', '10000'), '1000000000000');
        $this->assertSame($converter->convert('4', '2', '3'), '11');
        $this->assertSame($converter->convert('4', '8', '3'), '3');
        $this->assertSame($converter->convert('20', '10', '19'), '29');
        $this->assertSame($converter->convert('10', '20', '19'), '[19]');
        $this->assertSame($converter->convert('10', '10', '10'), '10');
        $this->assertSame($converter->convert('2', '2', '100'), '100');
    }

    public function testBaseToBaseWrongSymbol(): void
    {
        $converter = new BaseToBaseConvertor();
        $this->expectException(Exception::class);
        $converter->convert('3', '10', '3');
    }

    public function testDigitsOf(): void
    {
        $converter = new BaseToBaseConvertor();
        $this->assertSame($converter->digitsOf('1'), array('1'));
        $this->assertSame($converter->digitsOf('12'), array('1', '2'));
        $this->assertSame($converter->digitsOf('12345'), array('1', '2', '3', '4', '5'));
        $this->assertSame($converter->digitsOf('[10]'), array('10'));
        $this->assertSame($converter->digitsOf('[123456789]'), array('123456789'));
        $this->assertSame($converter->digitsOf('1[3]'), array('3'));
        $this->assertSame($converter->digitsOf('1[33]'), array('33'));
        $this->assertSame($converter->digitsOf('[1]111'), array('1'));
        $this->assertSame($converter->digitsOf('[12345]111'), array('12345'));
    }

    public function testDigitsOfExceptionMissingClosingBracket(): void
    {
        $converter = new BaseToBaseConvertor();
        $this->expectException(Exception::class);
        $converter->digitsOf('[10');
    }

    public function testDigitsOfExceptionMissingOpeningBracket(): void
    {
        $converter = new BaseToBaseConvertor();
        $this->expectException(Exception::class);
        $converter->digitsOf('10]');
    }

    public function testDigitsOfExceptionEmptySymbol(): void
    {
        $converter = new BaseToBaseConvertor();
        $this->expectException(Exception::class);
        $converter->digitsOf('[]');
    }
}
