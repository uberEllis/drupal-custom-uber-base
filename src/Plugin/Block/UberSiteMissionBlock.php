<?php
/**
 * Provides a 'Site mission' Block
 *
 * @Block(
 *   id = "uber_site_mission",
 *   admin_label = @Translation("Site mission"),
 * )
 */

namespace Drupal\uber_base\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\BlockPluginInterface;
use Drupal\Core\Form\FormStateInterface;

class UberSiteMissionBlock extends BlockBase implements BlockPluginInterface {
  /**
   * {@inheritdoc}
   */
  public function build() {
    $config = $this->getConfiguration();

    if (!empty($config['mission'])) {
      $mission = $config['mission'];
    }
    else {
      $mission = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';
    }

    return array(
      '#markup' => $mission,
    );
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form = parent::blockForm($form, $form_state);

    $config = $this->getConfiguration();

    // @TODO: Create defaults in the install files and manage via the Drupal Default config manager
    //        https://www.drupal.org/node/2468651
    $default = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';

    $form['uber_mission_mission'] = array (
      '#type'          => 'textarea',
      '#title'         => $this->t('Site mission'),
      '#description'   => $this->t('Define the site mission you want to display in the front page.'),
      '#default_value' => isset($config['mission']) ? $config['mission'] : $default
    );

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->setConfigurationValue('mission', $form_state->getValue('uber_mission_mission'));
  }

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    $default_config = \Drupal::config('uber_base.settings');
    return array(
      'mission' => $default_config->get('uber_base.mission')
    );
  }

}
  
?>