<?php

declare(strict_types=1);

namespace Drupal\hello_world;

use Drupal\Core\Session\AccountProxyInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\HttpKernelInterface;

/**
 * @todo Add a description for the middleware.
 */
final class HelloWorldMiddleware implements HttpKernelInterface {

  /**
   * Constructs a HelloWorldMiddleware object.
   */
  public function __construct(
    private readonly HttpKernelInterface $httpKernel,
    private readonly AccountProxyInterface $currentUser,
  ) {}

  /**
   * {@inheritdoc}
   */
  public function handle(Request $request, $type = self::MAIN_REQUEST, $catch = TRUE): Response {
    // @todo Modify the request here.
    $response = $this->httpKernel->handle($request, $type, $catch);
    // @todo Modify the response here.
    return $response;
  }

}
