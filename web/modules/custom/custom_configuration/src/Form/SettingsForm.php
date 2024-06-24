<?php

declare(strict_types=1);

namespace Drupal\custom_configuration\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure Custom configuration settings for this site.
 */
final class SettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId(): string {
    return 'custom_configuration_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames(): array {
    return ['custom_configuration.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state): array {
    $form['sociallinks'] = [
      '#type' => 'details',
      '#title' => $this->t('Social Links'),
      '#open' => TRUE,
    ];
    $form['sociallinks']['facebook'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Facebook'),
      '#default_value' => $this->config('custom_configuration.settings')->get('facebook'),
    ];
    $form['sociallinks']['twitter'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Twitter'),
      '#default_value' => $this->config('custom_configuration.settings')->get('twitter'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state): void {
    // validate form values
    // they need to be links
    $facebook = $form_state->getValue('facebook');
    $twitter = $form_state->getValue('twitter');
    if (!filter_var($facebook, FILTER_VALIDATE_URL)) {
      $form_state->setErrorByName('facebook', $this->t('Facebook link is not valid.'));
    }
    if (!filter_var($twitter, FILTER_VALIDATE_URL)) {
      $form_state->setErrorByName('twitter', $this->t('Twitter link is not valid.'));
    }
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state): void {
    $this->config('custom_configuration.settings')
      ->set('facebook', $form_state->getValue('facebook'))
      ->set('twitter', $form_state->getValue('twitter'))
      ->save();
    parent::submitForm($form, $form_state);
  }

}
