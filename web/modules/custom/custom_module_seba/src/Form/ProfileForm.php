<?php

namespace Drupal\custom_module_seba\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class ProfileForm.
 */
class ProfileForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'profile_form';
  }

  /**
   * {@inheritdoc}
   */
  
   public function buildForm(array $form, FormStateInterface $form_state) {
    
    $form['first_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('First Name'),
      '#default_value' => '',
      '#description' => $this->t('Enter your First Name.'),
      '#weight' => -3,
      '#required' => TRUE,
    ];

    $form['last_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Last Name'),
      '#default_value' => '',
      '#description' => $this->t('Enter your Last Name.'),
      '#weight' => -2,
      '#required' => TRUE,
    ];
  
    $form['dni'] = [
      '#type' => 'number',
      '#title' => $this->t('D.N.I.'),
      '#default_value' => '',
      '#description' => $this->t('Enter your DNI number.'),
      '#weight' => -1,
      '#required' => TRUE,
    ];
  
    
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
      ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    foreach ($form_state->getValues() as $key => $value) {
      // @TODO: Validate fields.
    }
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Display result.
    foreach ($form_state->getValues() as $key => $value) {
      \Drupal::messenger()->addMessage($key . ': ' . ($key === 'text_format'?$value['value']:$value));
    }
  }

}
