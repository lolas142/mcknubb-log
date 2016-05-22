<?php
namespace Mcknubb\Log;
include "../src/TLog.php";
include "../src/CLog.php";
/**
 * HTML Form elements.
 *
 */
class TableLogTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Test for method renderTimestampAsTable
     */
    public function testRenderTimestampAsTable() 
    {
        $table = new \Mcknubb\Log\TLog();
        // Create log for test
        $log = new \Mcknubb\Log\Clog();
        $class = 'testClass';
        $method = 'testMethod';
        $comment = 'testComment';
        $log->Timestamp($class, $method, $comment);
        // Get log and render it
        $timestamps = $log->getTimestamp();
        $testMemoryPeak = 1;
        $testPageLoadTime = 2;
        $res = $table->renderTimestampAsTable( $timestamps, $testMemoryPeak, $testPageLoadTime );
        
        $this->assertInternalType('string', $res);
    }
    /**
     * Test for method nothingLogged
     */
    public function testNothingLogged() 
    {
        $table = new \Mcknubb\Log\TLog();
        $res = $table->noLog();
        $this->assertInternalType('string', $res);
    }
    
}