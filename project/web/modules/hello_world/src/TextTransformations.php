<?php

namespace Drupal\hello_world;

use Drupal\Core\Logger\LoggerChannelFactory;

class TextTransformations {

  /**
   * Logger factory.
   * 
   * @var Drupal\Core\Logger\LoggerChannelFactory
   */
  protected $logger;

  /**
   * Constructor class for the text_transformations service.
   * 
   * @param Drupal\Core\Logger\LoggerChannelFactory $loggerFactory
   *   This is the logger channel factory used to log messages in Drupal.
   */
  public function __construct(LoggerChannelFactory $loggerFactory) {
    $this->logger = $loggerFactory;
  }

  public function reverse($text) {
    // \Drupal::service('logger.dblog')->log(1, 'The text was reversed');
    // \Drupal::logger('hello world')->log(1, 'The text was reversed');
    $this->logger->get('hello world')->log(1, 'The text was reversed 1234');

    return strrev($text);
  }

  public function uppercase($text) {
    $this->logger->get('hello world')->log(1, 'The text was converted to capital letters');

    return strtoupper($text);
  }
}