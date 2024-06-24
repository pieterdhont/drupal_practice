<?php

declare(strict_types=1);

namespace Drupal\offer\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for Offer routes.
 */
final class OfferController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function __invoke(): array {

    $build['content'] = [
      '#type' => 'item',
      '#markup' => $this->t('It works with no cache!'),
    ];

    return $build;
  }

}
