<?php

namespace Drupal\custom_module_jere\Form;

use Drupal\Core\Form\FormBase;
use Drupal\custom_module_jere\Entity\CustomModuleEntity;
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
    $form['dni'] = [
      '#type' => 'number',
      '#title' => $this->t('D.N.I.'),
      '#default_value' => '',
      '#description' => $this->t('Enter your DNI number.'),
      '#weight' => -8,
      '#maxlength' => 8,
    ];

    $form['first_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('First Name'),
      '#description' => $this->t('Enter your first name.'),
      '#description' => $this->t(''),
      '#weight' => -10,
    ];

    $form['last_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Last Name'),
      '#description' => $this->t('Enter your last name.'),
      '#description' => $this->t(''),
      '#weight' => -9,
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

    $form['term_cond'] = array(
      '#type' => 'checkbox',
      '#title' => $this->t('Accept terms and conditions'),
    );

    $form['field_date'] = array(
      '#type' => 'date',
      '#title' => 'Enter Your Date of Birth',
      '#format' => 'm/d/Y',
      '#description' => t('i.e. 09/06/2016'),
      '#default_value' => '',
      '#date_date_format' => 'm/d/Y',
    );

    $form['email'] = array(
      '#type' => 'email',
      '#title' => $this->t('Email'),
    );

    $form['my_file'] = array(
      '#type' => 'managed_file',
      '#name' => 'my_file',
      '#title' => t('File *'),
      '#size' => 20,
      '#description' => t('PDF format only'),
      '#upload_location' => 'public://my_files/',
    );

    $form['profile_image'] = [
      '#type' => 'managed_file',
      '#title' => t('Profile Picture'),
      '#upload_validators' => array(
        'file_validate_extensions' => array('gif png jpg jpeg'),
        'file_validate_size' => array(25600000),
      ),
      '#theme' => 'image_widget',
      '#preview_image_style' => 'medium',
      '#upload_location' => 'public://profile-pictures',
    ];

    $form['examples_link'] = [
      '#title' => $this->t('Serch Link'),
      '#type' => 'url',
      '#url' => Url::fromRoute('custom_module_d21.profile_form'),
    ];

    $form['example_select'] = [
      '#type' => 'select',
      '#title' => $this->t('Select element'),
      '#options' => [
        '1' => $this->t('One'),
        '2' => [
          '2.1' => $this->t('Two point one'),
          '2.2' => $this->t('Two point two'),
        ],
        '3' => $this->t('Three'),
      ],
    ];

    $form['pass'] = array(
      '#type' => 'password',
      '#title' => $this->t('Password'),
      '#size' => 25,
    );

    $form['text'] = array(
      '#type' => 'textarea',
      '#title' => $this->t('Text'),
    );

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
    $values = $form_state->getValues();
    $profile_entity = \Drupal::entityTypeManager()->getStorage('profile_entity')->create(array(
      //traer y que quede todo como esto 'dni' => $values['dni'],
      'title' => '',
      'name' => $values['first_name'],
      'uid' => '1',
      'dni' => $values['dni'],
      'pass' => $values['pass'],
      'textarea_long' => '',
    ));

    foreach ($form_state->getValues() as $key => $value) {
      \Drupal::messenger()->addMessage($key . ': ' . ($key === 'text_format' ? $value['value'] : $value));
    }
  }
}
