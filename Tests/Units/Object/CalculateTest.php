<?php
namespace TestsCourses\Tests\Units;

use Exception;
use PHPUnit\Framework\TestCase;
use TestsCourses\Object\Calculate;


final class CalculateTest extends TestCase
{
    /**
     * ADD
     */
    public function testAdditionalInt(): void
    {
        $calculate = new Calculate();

        $result = $calculate->additional(7, 4);

        $this->assertIsInt($result, 'This value is not a integer');
        $this->assertEquals(11, $result);
    }

    public function testAdditionalFloat(): void
    {
        $calculate = new Calculate();

        $result = $calculate->additional(7.2, 4.6);

        $this->assertIsFloat($result, 'This value is not a float');
        $this->assertEquals(11.8, $result);
    }

    public function testAdditionalMix(): void
    {
        $calculate = new Calculate();

        $result = $calculate->additional(7.2, 4);

        $this->assertIsFloat($result, 'This value is not a float');
        $this->assertEquals(11.2, $result);
    }

    public function testAdditionalAFailed(): void
    {
        $calculate = new Calculate();

        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Parameters is a string type, integer or float required.");

        $calculate->additional("ContactTest", 4.8);
    }

    public function testAdditionalBFailed(): void
    {
        $calculate = new Calculate();

        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Parameters is a string type, integer or float required.");

        $calculate->additional(7.2, "ContactTest");
    }

    /**
     * SUBTRACT
     */
    public function testSubtractInt(): void
    {
        $calculate = new Calculate();

        $result = $calculate->subtract(7, 4);

        $this->assertIsInt($result, 'This value is not a integer');
        $this->assertEquals(3, $result);
    }

    public function testSubtractFloat(): void
    {
        $calculate = new Calculate();

        $result = $calculate->subtract(7.2, 4.8);

        $this->assertIsFloat($result, 'This value is not a float');
        $this->assertEquals(2.4, $result);
    }

    public function testSubtractMix(): void
    {
        $calculate = new Calculate();

        $result = $calculate->subtract(7.2, 4);

        $this->assertIsFloat($result, 'This value is not a float');
        $this->assertEquals(3.2, $result);
    }

    public function testSubtractAFailed(): void
    {
        $calculate = new Calculate();

        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Parameters is a string type, integer or float required.");

        $calculate->subtract("ContactTest", 4.8);
    }

    public function testSubtractBFailed(): void
    {
        $calculate = new Calculate();

        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Parameters is a string type, integer or float required.");

        $calculate->subtract(7.2, "ContactTest");
    }

    /**
     * MULTIPLY
     */
    public function testMultiplyInt(): void
    {
        $calculate = new Calculate();

        $result = $calculate->multiply(7,4);

        $this->assertIsInt($result, 'This value is not a integer');
        $this->assertEquals(28, $result);
    }

    public function testMultiplyFloat(): void
    {
        $calculate = new Calculate();

        $result = $calculate->multiply(7.2,4.8);

        $this->assertIsFloat($result, 'This value is not a float');
        $this->assertEquals(34.56, $result);
    }

    public function testMultiplyMix(): void
    {
        $calculate = new Calculate();

        $result = $calculate->multiply(7.2,4);

        $this->assertIsFloat($result, 'This value is not a float');
        $this->assertEquals(28.8, $result);
    }

    public function testMultiplyAFailed(): void
    {
        $calculate = new Calculate();

        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Parameters is a string type, integer or float required.");

        $calculate->multiply("ContactTest",4.8);
    }

    public function testMultiplyBFailed(): void
    {
        $calculate = new Calculate();

        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Parameters is a string type, integer or float required.");

        $calculate->multiply(7.2,"ContactTest");
    }

    /**
     * DIVIDE
     */
    public function testDivideInt(): void
    {
        $calculate = new Calculate();

        $result = $calculate->divise(7, 4);

        $this->assertIsNumeric($result, 'This value is not a integer.');
        $this->assertEquals(1.75, $result);
    }

    public function testDivideFloat(): void
    {
        $calculate = new Calculate();

        $result = $calculate->divise(7.2, 4.8);

        $this->assertIsNumeric($result, 'This value is not a float.');
        $this->assertEquals(1.5, $result);
    }

    public function testDivideMix(): void
    {
        $calculate = new Calculate();

        $result = $calculate->divise(7.2, 4);

        $this->assertIsNumeric($result, 'This value is not a integer or float');
        $this->assertEquals(1.8, $result);
    }

    public function testDivideAFailed(): void
    {
        $calculate = new Calculate();

        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Parameters is a string type, integer or float required.");

        $calculate->divise("ContactTest", 4.8);
    }

    public function testDivideBFailed(): void
    {
        $calculate = new Calculate();

        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Parameters is a string type, integer or float required.");

        $calculate->divise(7.2, "ContactTest");
    }

    public function testDivideAByZero(): void
    {
        $calculate = new Calculate();

        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Divide by zero : Parameters A or B equals zero.");

        $calculate->divise(0, 4.8);
    }

    public function testDivideBByZero(): void
    {
        $calculate = new Calculate();

        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Divide by zero : Parameters A or B equals zero.");

        $calculate->divise(7.2, 0);
    }

    /**
     * MODULO
     */
    public function testModulo(): void
    {
        $calculate = new Calculate();

        $result = $calculate->modulo(7, 4);

        $this->assertIsInt($result, 'This value is not a integer');
        $this->assertEquals(3, $result);
    }

    public function testModuloFloatFailed(): void
    {
        $calculate = new Calculate();

        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Modulo cannot accept float type for parameters.");

        $calculate->modulo(7.2, 4.8);
    }

    public function testModuloAFailed(): void
    {
        $calculate = new Calculate();

        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Parameters is a string type, integer or float required.");

        $calculate->modulo("ContactTest", 4);
    }

    public function testModuloBFailed(): void
    {
        $calculate = new Calculate();

        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Parameters is a string type, integer or float required.");

        $calculate->modulo(7, "ContactTest");
    }

    public function testModuloAByZero(): void
    {
        $calculate = new Calculate();

        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Divide by zero : Parameters A or B equals zero.");

        $calculate->modulo(0, 4);
    }

    public function testModuloBByZero(): void
    {
        $calculate = new Calculate();

        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Divide by zero : Parameters A or B equals zero.");

        $calculate->modulo(7, 0);
    }
}
