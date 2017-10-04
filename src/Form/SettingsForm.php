<?php

namespace Drupal\selection_note\Form;

use Drupal\Component\Utility\Xss;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\diff\DiffLayoutManager;
use Drupal\node\Entity\NodeType;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Configure global diff settings.
 */
class SettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'selection_note_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'selection_note.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, $field_type = NULL) {
    $content_types = \Drupal::service('entity.manager')->getStorage('node_type')->loadMultiple();
    $options = [];
    foreach($content_types as $id => $content_type) {
      $options[$content_type->id()] = $content_type->label();
    }
    $form['content_type_node'] = [
      '#title' => t('Content type'),
      '#description' => t('Content type where to save notes.'),
      '#type' => 'select',
      '#options' => $options,
      '#default_value' => $this->config('selection_note.settings')->get('content_type_node') ?: '',
      '#empty_option' => t('None'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $config = $this->config('selection_note.settings')->set('content_type_node', $form_state->getValue('content_type_node'));
    $config->save();
    //$content_type = $type->setThirdPartySetting('note_selection', 'content_type', 'node');
    parent::submitForm($form, $form_state);
  }

}
