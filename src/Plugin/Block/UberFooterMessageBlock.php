<?php
/**
 * Provides a 'Footer message' Block
 *
 * @Block(
 *   id = "uber_footer_message",
 *   admin_label = @Translation("Footer message"),
 * )
 */

namespace Drupal\uber_base\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\BlockPluginInterface;
use Drupal\Core\Form\FormStateInterface;

class UberFooterMessageBlock extends BlockBase implements BlockPluginInterface {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $config = $this->getConfiguration();

    if (!empty($config['message'])) {
      $message = $config['message'];
    }
    else {
      $message = 'Copyright &copy; ' . date("Y") . ' - Some rights reserved';
    }

    return array(
      '#markup' => $message,
    );
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form = parent::blockForm($form, $form_state);

    $config = $this->getConfiguration();

    $default = 'Copyright &copy; ' . date("Y") . ' - Some rights reserved';

    $form['uber_footermessage_message'] = array (
      '#type'          => 'textarea',
      '#title'         => $this->t('Footer message'),
      '#description'   => $this->t('Define the message you want to display in the footer message block.'),
      '#default_value' => isset($config['message']) ? $config['message'] : $default
    );

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->setConfigurationValue('message', $form_state->getValue('uber_footermessage_message'));
  }

}

?>