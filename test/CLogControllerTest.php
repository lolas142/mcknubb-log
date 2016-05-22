<?php
namespace Mcknubb\Log;
/**
 * HTML Form elements.
 *
 */
class CLogControllerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test that the stamp method saves the values correctly
     *
     * @return void
     *
     */
    public function testTimestamp() 
    {
        
        $Clog = new \Mcknubb\Log\CLogController();
       
        $class = 'testClass';
        $method = 'testMethod';
        $comment = 'testComment';
        $Clog->stamp($class, $method, $comment);
        $res = $Clog->getLogAsArray();
        $resClass = $res[0]['domain'];
        $this->assertEquals($resClass, $class, "The registered class doesn't match the result");
        $resMethod = $res[0]['where'];
        $this->assertEquals($resMethod, $method, "The registerde method doesn't match the result");
        $resComment = $res[0]['comment'];
        $this->assertEquals($resComment, $comment, "The registered comment doesn't match the result");
    }
    /**
     * Test that we always get a stirng as return value
     *
     * @return void
     *
     */
    public function testPrintLog() 
    {
        
        $Clog = new \Mcknubb\Log\CLogController();
        $res = $Clog->renderLog();
        $this->assertInternalType('string', $res);
    }
    
}