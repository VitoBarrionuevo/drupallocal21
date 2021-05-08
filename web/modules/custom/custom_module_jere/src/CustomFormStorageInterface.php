<?php

namespace Drupal\custom_module_jere;

use Drupal\Core\Entity\ContentEntityStorageInterface;
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
interface CustomFormStorageInterface extends ContentEntityStorageInterface {

  /**
   * Gets a list of Custom form revision IDs for a specific Custom form.
   *
   * @param \Drupal\custom_module_jere\Entity\CustomFormInterface $entity
   *   The Custom form entity.
   *
   * @return int[]
   *   Custom form revision IDs (in ascending order).
   */
  public function revisionIds(CustomFormInterface $entity);

  /**
   * Gets a list of revision IDs having a given user as Custom form author.
   *
   * @param \Drupal\Core\Session\AccountInterface $account
   *   The user entity.
   *
   * @return int[]
   *   Custom form revision IDs (in ascending order).
   */
  public function userRevisionIds(AccountInterface $account);

  /**
   * Counts the number of revisions in the default language.
   *
   * @param \Drupal\custom_module_jere\Entity\CustomFormInterface $entity
   *   The Custom form entity.
   *
   * @return int
   *   The number of revisions in the default language.
   */
  public function countDefaultLanguageRevisions(CustomFormInterface $entity);

  /**
   * Unsets the language for all Custom form with the given language.
   *
   * @param \Drupal\Core\Language\LanguageInterface $language
   *   The language object.
   */
  public function clearRevisionsLanguage(LanguageInterface $language);

}
