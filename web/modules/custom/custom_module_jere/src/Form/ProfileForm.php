<?php

namespace Drupal\custom_module_jere\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class ProfileForm.
 */
class ProfileForm extends FormBase
{

  /**
   * {@inheritdoc}
   */
  public function getFormId()
  {
    return 'profile_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state)
  {
    $form['name'] = array(
      '#type' => 'textfield',
      '#title' => $this
        ->t('Name'),
      '#default_value' => '',
      '#size' => 20,
      '#attributes' => array(
        'placeholder' => t('Please insert Name'),
      ),
      '#maxlength' => 20,
    
      '#required' => TRUE,
    );

    $form['lastname'] = array(
      '#type' => 'textfield',
      '#title' => $this
        ->t('Last Name'),
      '#default_value' => '',
      '#size' => 20,
      '#attributes' => array(
        'placeholder' => t('Please insert Last Name'),
      ),
      '#maxlength' => 20,
      '#required' => TRUE,
    );

    $form['dni'] = array(
      '#type' => 'number',
      '#title' => $this
        ->t('DNI'),
      '#attributes' => array(
        'placeholder' => t('Please insert DNI'),
      ),
      '#required' => TRUE,
      '#maxlength' => 10,
    );

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state)
  {
    foreach ($form_state->getValues() as $key => $value) {
      // @TODO: Validate fields.
    }
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    // Display result.
    foreach ($form_state->getValues() as $key => $value) {
      \Drupal::messenger()->addMessage($key . ': ' . ($key === 'text_format' ? $value['value'] : $value));
    }
  }
}
