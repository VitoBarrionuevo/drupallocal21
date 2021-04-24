<?php

namespace Drupal\custom_module_seba;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Link;

/**
 * Defines a class to build a listing of Custom module entity entities.
 *
 * @ingroup custom_module_seba
 */
class CustomModuleEntityListBuilder extends EntityListBuilder {

  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('Custom module entity ID');
    $header['name'] = $this->t('Name');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var \Drupal\custom_module_seba\Entity\CustomModuleEntity $entity */
    $row['id'] = $entity->id();
    $row['name'] = Link::createFromRoute(
      $entity->label(),
      'entity.custom_module_entity.edit_form',
      ['custom_module_entity' => $entity->id()]
    );
    return $row + parent::buildRow($entity);
  }

}
