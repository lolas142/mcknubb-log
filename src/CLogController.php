<?php
namespace Mcknubb\Log;
/**
 * 
 * Controller class for CLog.
 *
 */
class CLogController
{
  /**
   * Properties
   *
   */
  private $log;
  private $table;

  /**
   * Constructor
   *
   */
  public function __construct() {
    $this->log = new CLog();
    $this->table = new TLog();
  }

  /**
   * Timestamp, log a event with a time.
   *
   */
  public function Timestamp($domain, $where, $comment=null) {
    $this->log->Timestamp($domain, $where, $comment);
  }

  /**
   * Render log
   * @return string with a html-table to display all timestamps
   *
   */
  public function printLog() {
    $timestamps = $this->log->getTimestamp();
  
    if(empty($timestamps)) {
      return $this->table->nothingLogged();
    }

    $memorypeak = $this->log->getMemoryPeak();
    $pageLoadTime = $this->log->getPageLoadTime();
    return $this->table->renderTimestampAsTable($timestamps, $memorypeak, $pageLoadTime);
  }

  /**
   * Get Timestamps as Array
   */
  public function getTimestampsAsArray() {
    return $this->log->getTimestamp();
  }

  /*
   * Test if class is loaded
   */
  public function saySomething($word) {
    $this->log->saySomething('log:' . $word . "<br>");
    $this->table->saySomething('table:' . $word . "<br>");
    echo ('controller:' . $word);
  }
} 