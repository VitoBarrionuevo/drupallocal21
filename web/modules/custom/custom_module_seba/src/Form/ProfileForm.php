<?php

namespace Drupal\custom_module_seba\Form;

use Drupal\Core\Url;
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

    $form['first_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('First Name'),
      '#default_value' => '',
      '#description' => $this->t('Enter your First Name.'),
      '#weight' => -3,
      ];

    $form['last_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Last Name'),
      '#default_value' => '',
      '#description' => $this->t('Enter your Last Name.'),
      '#weight' => -2,
     
    ];    $form['gender'] = array(
      '#type' => 'radios',
      '#title' => $this->t('Gender'),
      '#default_value' => 1,
      '#options' => array(
        0 => $this->t('Male'),
        1 => $this->t('Female'),
      ),
    );


    $form['dni'] = [
      '#type' => 'number',
      '#title' => $this->t('D.N.I.'),
      '#default_value' => '',
      '#description' => $this->t('Enter your DNI number.'),
      '#weight' => -1,
      ];

    $form['adress'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Adress'),
      '#description' => $this->t('Enter your Adress.'),
      '#size' => 60,
      '#maxlength' => 128,
      '#weight' => 4,
    );


    $form['text'] = array(
      '#type' => 'textarea',
      '#title' => $this->t('Intersection'),
    );
    $form["cuntry"]= array(
      "#type" => "select", 
      "#title" => t("Select your Country."), 
      "#options" => array(
      "argentina" => t("Argentina"),
      "uruguay" => t("Uruguay"), 
      "brazil" => t("Brazil"),),
      "#description" => t("Select a Country."),
      );

     
    $form['email'] = array(
      '#type' => 'email',
      '#title' => t('Email'),
      '#default_value' => "",
      '#description' => "Please enter your email.",
      '#size' => 20,
      '#maxlength' => 20,
      '#weight' => -4,
    );

    $form['image'] = array(
      '#type'          => 'file',
      '#title'         => $this->t('Image'),
      '#default_value' => '',
    );

    $form['my_file'] = array(
      '#type' => 'managed_file',
      '#name' => 'my_file',
      '#title' => t('File *'),
      '#size' => 20,
      '#description' => t('PDF format only'),
      '#upload_location' => '',
    );

    $form['link'] = [
      '#title' => $this->t('Link'),
      '#type' => 'url',
      '#url' => Url::fromRoute('examples.description'),
    ];

    $form['birthday'] = array(
      '#type' => 'date',
      '#title' => 'Enter Your Birth Date',
      '#default_value' => array('month' => 9, 'day' => 6, 'year' => 1962),
      '#format' => 'm/d/Y',
      '#description' => t('i.e. 09/06/2016'),
    );

    $form['terms'] = array(
      '#type' => 'checkbox',
      '#title' => $this->t('Terms and Conditions'),
    );


    $form['pass'] = array(
      '#type' => 'password',
      '#title' => $this->t('Password'),
      '#size' => 25,
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
