<?php

namespace Drupal\custom_module_jere;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Link;

/**
 * Defines a class to build a listing of Custom_module_entity entities.
 *
 * @ingroup custom_module_jere
 */
class custom_module_entityListBuilder extends EntityListBuilder {

  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('Custom_module_entity ID');
    $header['name'] = $this->t('Name');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var \Drupal\custom_module_jere\Entity\custom_module_entity $entity */
    $row['id'] = $entity->id();
    $row['name'] = Link::createFromRoute(
      $entity->label(),
      'entity.custom_module_entity.edit_form',
      ['custom_module_entity' => $entity->id()]
    );
    return $row + parent::buildRow($entity);
  }

}
