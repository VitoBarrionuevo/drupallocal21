<?php

namespace Drupal\custom_module_d21\Form;

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

    //checkbox
    //radios
    //datetime
    //email
    //file
    //image
    //integer
    //link
    //list_string dropdown select
    //password
    //string
    //text_long




    $form['dni'] = [
      '#type' => 'number',
      '#title' => $this->t('D.N.I.'),
      '#default_value' => '',
      '#description' => $this->t('Enter your DNI number.'),
      '#weight' => -8,
      '#required' => true,
      '#maxlength' => 8,
    ];

    $form['first_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('First Name'),
      '#description' => $this->t('Enter your first name.'),
      '#description' => $this->t(''),
      '#weight' => -10,
      '#required' => true,
    ];

    $form['last_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Last Name'),
      '#description' => $this->t('Enter your last name.'),
      '#description' => $this->t(''),
      '#weight' => -9,
      '#required' => true,
    ];
    $form['#meses'] = 'ENERO';

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
    $values = $form_state->getValues();

    //abrir la entidad
    //asignar valores
    //guardar entidad

    // Display result.
    foreach ($form_state->getValues() as $key => $value) {
      \Drupal::messenger()->addMessage($key . ': ' . ($key === 'text_format' ? $value['value'] : $value));
    }
  }
}
