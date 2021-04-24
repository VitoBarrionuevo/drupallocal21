<?php

namespace Drupal\custom_module_jere\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\Core\Entity\EntityPublishedInterface;

/**
 * Provides an interface for defining Custom_module_entity entities.
 *
 * @ingroup custom_module_jere
 */
interface custom_module_entityInterface extends ContentEntityInterface, EntityChangedInterface, EntityPublishedInterface {

  /**
   * Add get/set methods for your configuration properties here.
   */

  /**
   * Gets the Custom_module_entity name.
   *
   * @return string
   *   Name of the Custom_module_entity.
   */
  public function getName();

  /**
   * Sets the Custom_module_entity name.
   *
   * @param string $name
   *   The Custom_module_entity name.
   *
   * @return \Drupal\custom_module_jere\Entity\custom_module_entityInterface
   *   The called Custom_module_entity entity.
   */
  public function setName($name);

  /**
   * Gets the Custom_module_entity creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Custom_module_entity.
   */
  public function getCreatedTime();

  /**
   * Sets the Custom_module_entity creation timestamp.
   *
   * @param int $timestamp
   *   The Custom_module_entity creation timestamp.
   *
   * @return \Drupal\custom_module_jere\Entity\custom_module_entityInterface
   *   The called Custom_module_entity entity.
   */
  public function setCreatedTime($timestamp);

}
