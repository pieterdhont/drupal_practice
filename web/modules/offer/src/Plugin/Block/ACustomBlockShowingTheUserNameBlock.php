<?php

declare(strict_types=1);

namespace Drupal\offer\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides an a custom block showing the user name block.
 *
 * @Block(
 *   id = "offer_a_custom_block_showing_the_user_name",
 *   admin_label = @Translation("A custom block showing the user name"),
 *   category = @Translation("Custom"),
 * )
 */
final class ACustomBlockShowingTheUserNameBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build(): array {
    $build['content'] = [
      '#markup' => $this->t('It works!'),
    ];
    return $build;
  }

}
