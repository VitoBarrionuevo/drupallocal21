<?php

namespace Drupal\custom_module_jere\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;

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
    );

    $form['adress'] = array(
      '#type' => 'textfield',
      '#title' => $this
        ->t('Adress'),
      '#default_value' => '',
      '#size' => 20,
      '#attributes' => array(
        'placeholder' => t('Please insert Adress'),
      ),
      '#maxlength' => 20,
    );

    $form['dni'] = array(
      '#type' => 'number',
      '#title' => $this
        ->t('DNI'),
      '#attributes' => array(
        'placeholder' => t('Please insert DNI'),
      ),
      '#maxlength' => 10,
    );

    $form['cuit'] = array(
      '#type' => 'number',
      '#title' => $this
        ->t('CUIT'),
      '#attributes' => array(
        'placeholder' => t('Please insert CUIT'),
      ),
      '#maxlength' => 10,
    );

    $form['country'] = array(
      '#type' => 'select',
      '#title' => t('Country'),
      '#description' => t('Select Country from the list.'),
      '#options' => array(
        0 => t('ARG'),
        1 => t('CHI'),
        2 => t('BRA'),
      ),
    );

    $form['profile_image'] = [
      '#type' => 'managed_file',
      '#title' => t('Profile Picture'),
      '#upload_validators' => array(
        'file_validate_extensions' => array('gif png jpg jpeg'),
        'file_validate_size' => array(25600000),
      ),
    ];

    $form['file_cv'] = [
      '#type' => 'file',
      '#default_value' => '',
      '#title' => t('Upload your CV'),
    ];

    $form['gender'] = array(
      '#type' => 'radios',
      '#title' => $this->t('Gender'),
      '#default_value' => 1,
      '#options' => array(
        0 => $this->t('Male'),
        1 => $this->t('Female'),
      ),
    );

    $form['birthday'] = [
      '#type' => 'date',
      '#title' => $this
        ->t('Birthday'),
      '#default_value' => '2020-02-05',
    ];

    $form['email'] = [
      '#type' => 'email',
      '#title' => $this
        ->t('Email'),
      '#attributes' => array(
        'placeholder' => t('Please insert Email'),
      ),
      '#pattern' => '*@example.com',
    ];

    $form['accept'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('I accept the terms of use of the site'),
      '#description' => $this->t('Please read and accept the terms of use'),
    ];

    $form['password'] = array(
      '#type' => 'password',
      '#title' => t('Password'),
      '#description' => t('Insert a password'),
    );

    $form['comment'] = array(
      '#type' => 'textarea',
      '#title' => $this
        ->t('You want to add a comment?'),
      '#maxlength' => 50,
    );
//dos opciones de link
    $form['test_link'] = array(
      '#type' => 'url',
      '#title' => $this->t('Linked-in Profile'),
      '#size' => 30,
      '#pattern' => '*.example.com',
      '#description' => t('Enter your URL '),
    );

    $form['test_ink'] = [
      '#type' => 'url',
      '#title' => $this->t('Link title'),
      '#url' => Url::fromRoute('entity.com'),
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
