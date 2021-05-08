<?php

namespace Drupal\custom_module_jere\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\RevisionLogInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\Core\Entity\EntityPublishedInterface;

/**
 * Provides an interface for defining Custom form entities.
 *
 * @ingroup custom_module_jere
 */
interface CustomFormInterface extends ContentEntityInterface, RevisionLogInterface, EntityChangedInterface, EntityPublishedInterface {

  /**
   * Add get/set methods for your configuration properties here.
   */

  /**
   * Gets the Custom form name.
   *
   * @return string
   *   Name of the Custom form.
   */
  public function getName();

  /**
   * Sets the Custom form name.
   *
   * @param string $name
   *   The Custom form name.
   *
   * @return \Drupal\custom_module_jere\Entity\CustomFormInterface
   *   The called Custom form entity.
   */
  public function setName($name);

  /**
   * Gets the Custom form creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Custom form.
   */
  public function getCreatedTime();

  /**
   * Sets the Custom form creation timestamp.
   *
   * @param int $timestamp
   *   The Custom form creation timestamp.
   *
   * @return \Drupal\custom_module_jere\Entity\CustomFormInterface
   *   The called Custom form entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Gets the Custom form revision creation timestamp.
   *
   * @return int
   *   The UNIX timestamp of when this revision was created.
   */
  public function getRevisionCreationTime();

  /**
   * Sets the Custom form revision creation timestamp.
   *
   * @param int $timestamp
   *   The UNIX timestamp of when this revision was created.
   *
   * @return \Drupal\custom_module_jere\Entity\CustomFormInterface
   *   The called Custom form entity.
   */
  public function setRevisionCreationTime($timestamp);

  /**
   * Gets the Custom form revision author.
   *
   * @return \Drupal\user\UserInterface
   *   The user entity for the revision author.
   */
  public function getRevisionUser();

  /**
   * Sets the Custom form revision author.
   *
   * @param int $uid
   *   The user ID of the revision author.
   *
   * @return \Drupal\custom_module_jere\Entity\CustomFormInterface
   *   The called Custom form entity.
   */
  public function setRevisionUserId($uid);

}
