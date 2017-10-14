<?php

use PHPUnit\Framework\TestCase;
use Expression;
class ExpressionTest extends TestCase
{

    /** @test*/

    function it_finds_a_string(){

        $regx= Expression::make()->find('www');

        $this->assertTrue($regx->test('www'));

        $regx= Expression::make()->then('www');

        $this->assertTrue($regx->test('www'));
    }
    
    /** @test*/

    function it_finds_anything(){

        $regx= Expression::make()->anything();

        $this->assertTrue($regx->test('www'));
        
    }
    

    /** @test*/

    function it_maybe_has_a_value(){

        $regx= Expression::make()->maybeHas('http');

        $this->assertTrue($regx->test('http'));
        $this->assertTrue($regx->test(''));
    }

    /** @test*/

    function it_can_chain_method_call(){

        $regx= Expression::make()->find('foo')->maybe('.')->then('biz');

        $this->assertTrue($regx->test('foo.biz'));
        $this->assertFalse($regx->test('foobXbiz'));
        
    }
    
    /** @test*/

    function it_can_exclude_values(){

        $regx= Expression::make()->find('foo')->anythingBut('bar')->then('biz');

        $this->assertTrue($regx->test('foobazzbiz'));
        $this->assertFalse($regx->test('foobarbiz'));
        
    }


}
