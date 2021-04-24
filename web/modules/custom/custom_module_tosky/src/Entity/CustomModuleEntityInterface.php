<?php

namespace Drupal\custom_module_tosky\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\Core\Entity\EntityPublishedInterface;

/**
 * Provides an interface for defining Custom module entity entities.
 *
 * @ingroup custom_module_tosky
 */
interface CustomModuleEntityInterface extends ContentEntityInterface, EntityChangedInterface, EntityPublishedInterface {

  /**
   * Add get/set methods for your configuration properties here.
   */

  /**
   * Gets the Custom module entity name.
   *
   * @return string
   *   Name of the Custom module entity.
   */
  public function getName();

  /**
   * Sets the Custom module entity name.
   *
   * @param string $name
   *   The Custom module entity name.
   *
   * @return \Drupal\custom_module_tosky\Entity\CustomModuleEntityInterface
   *   The called Custom module entity entity.
   */
  public function setName($name);

  /**
   * Gets the Custom module entity creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Custom module entity.
   */
  public function getCreatedTime();

  /**
   * Sets the Custom module entity creation timestamp.
   *
   * @param int $timestamp
   *   The Custom module entity creation timestamp.
   *
   * @return \Drupal\custom_module_tosky\Entity\CustomModuleEntityInterface
   *   The called Custom module entity entity.
   */
  public function setCreatedTime($timestamp);

}
