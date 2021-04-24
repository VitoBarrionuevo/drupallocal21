<?php

namespace Drupal\custom_module_jere\Entity;

use Drupal\views\EntityViewsData;

/**
 * Provides Views data for Custom_module_entity entities.
 */
class custom_module_entityViewsData extends EntityViewsData {

  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    // Additional information for Views integration, such as table joins, can be
    // put here.
    return $data;
  }

}