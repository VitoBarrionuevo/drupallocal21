<?php

namespace Drupal\custom_module_tosky\Entity;

use Drupal\views\EntityViewsData;

/**
 * Provides Views data for Custom module entity entities.
 */
class CustomModuleEntityViewsData extends EntityViewsData {

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
