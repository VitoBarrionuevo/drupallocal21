<?php

namespace Drupal\custom_module_jere;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Link;

/**
 * Defines a class to build a listing of Custom form entities.
 *
 * @ingroup custom_module_jere
 */
class CustomFormListBuilder extends EntityListBuilder {

  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('Custom form ID');
    $header['name'] = $this->t('Name');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var \Drupal\custom_module_jere\Entity\CustomForm $entity */
    $row['id'] = $entity->id();
    $row['name'] = Link::createFromRoute(
      $entity->label(),
      'entity.custom_form.edit_form',
      ['custom_form' => $entity->id()]
    );
    return $row + parent::buildRow($entity);
  }

}
