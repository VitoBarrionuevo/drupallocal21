<?php

namespace Drupal\profile_module\Entity;

use Drupal\views\EntityViewsData;

/**
 * Provides Views data for Profile entity entities.
 */
class ProfileEntityViewsData extends EntityViewsData {

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
