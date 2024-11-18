<?php

declare(strict_types=1);

namespace Drupal\hello_world\Plugin\Block;

use Drupal\Core\Block\Attribute\Block;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\StringTranslation\TranslatableMarkup;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a hello world block.
 */
#[Block(
  id: 'hello_world_block',
  admin_label: new TranslatableMarkup('Hello World'),
  category: new TranslatableMarkup('Custom'),
)]
final class HelloWorldBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * Current user service.
   * 
   * @var \Drupal\Core\Session\AccountProxy
   */
  protected $currentUser;

  /** 
   * Text transformations service.
   * 
   * @var \Drupal\hello_world\TextTransformations
   */
  protected $textTransformer;

  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('current_user'),
      $container->get('hello_world.text_transformer')
    );
  }

  public function __construct(array $configuration, $plugin_id, $plugin_definition, $current_user, $text_transformer) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->currentUser = $current_user;
    $this->textTransformer = $text_transformer;
  }

  /**
   * {@inheritdoc}
   */
  public function build(): array {

    // $user = \Drupal::service('current_user');
    ksm($this->currentUser->getDisplayName());

    // $text_transformer = \Drupal::service('hello_world.text_transformer');
    $build['content'] = [
      '#markup' => $this->textTransformer->reverse('It works!'),
    ];
    return $build;
  }

}
