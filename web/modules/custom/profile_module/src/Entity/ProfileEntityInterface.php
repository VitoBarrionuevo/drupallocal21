<?php

namespace Drupal\profile_module\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\Core\Entity\EntityPublishedInterface;

/**
 * Provides an interface for defining Profile entity entities.
 *
 * @ingroup profile_module
 */
interface ProfileEntityInterface extends ContentEntityInterface, EntityChangedInterface, EntityPublishedInterface {

  /**
   * Add get/set methods for your configuration properties here.
   */

  /**
   * Gets the Profile entity name.
   *
   * @return string
   *   Name of the Profile entity.
   */
  public function getName();

  /**
   * Sets the Profile entity name.
   *
   * @param string $name
   *   The Profile entity name.
   *
   * @return \Drupal\profile_module\Entity\ProfileEntityInterface
   *   The called Profile entity entity.
   */
  public function setName($name);

  /**
   * Gets the Profile entity creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Profile entity.
   */
  public function getCreatedTime();

  /**
   * Sets the Profile entity creation timestamp.
   *
   * @param int $timestamp
   *   The Profile entity creation timestamp.
   *
   * @return \Drupal\profile_module\Entity\ProfileEntityInterface
   *   The called Profile entity entity.
   */
  public function setCreatedTime($timestamp);

}
