<?php
/**
 * @file
 * Contains \Drupal\uber_base\Controller\UberBaseController.
 */

namespace Drupal\uber_base\Controller;

use Drupal\Core\Controller\ControllerBase;

class UberBaseController extends ControllerBase {

  /**
   * {@inheritdoc}
   */
  public function content() {
    $build = array(
      '#type' => 'markup',
      '#markup' => t('Hello World!'),
    );
    return $build;
  }

}
