<?php

namespace Drupal\custom_module_jere;

use Drupal\Core\Entity\Sql\SqlContentEntityStorage;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Language\LanguageInterface;
use Drupal\custom_module_jere\Entity\CustomFormInterface;

/**
 * Defines the storage handler class for Custom form entities.
 *
 * This extends the base storage class, adding required special handling for
 * Custom form entities.
 *
 * @ingroup custom_module_jere
 */
class CustomFormStorage extends SqlContentEntityStorage implements CustomFormStorageInterface {

  /**
   * {@inheritdoc}
   */
  public function revisionIds(CustomFormInterface $entity) {
    return $this->database->query(
      'SELECT vid FROM {custom_form_revision} WHERE id=:id ORDER BY vid',
      [':id' => $entity->id()]
    )->fetchCol();
  }

  /**
   * {@inheritdoc}
   */
  public function userRevisionIds(AccountInterface $account) {
    return $this->database->query(
      'SELECT vid FROM {custom_form_field_revision} WHERE uid = :uid ORDER BY vid',
      [':uid' => $account->id()]
    )->fetchCol();
  }

  /**
   * {@inheritdoc}
   */
  public function countDefaultLanguageRevisions(CustomFormInterface $entity) {
    return $this->database->query('SELECT COUNT(*) FROM {custom_form_field_revision} WHERE id = :id AND default_langcode = 1', [':id' => $entity->id()])
      ->fetchField();
  }

  /**
   * {@inheritdoc}
   */
  public function clearRevisionsLanguage(LanguageInterface $language) {
    return $this->database->update('custom_form_revision')
      ->fields(['langcode' => LanguageInterface::LANGCODE_NOT_SPECIFIED])
      ->condition('langcode', $language->getId())
      ->execute();
  }

}
