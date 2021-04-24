<?php

namespace Drupal\custom_module_seba;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Custom module entity entity.
 *
 * @see \Drupal\custom_module_seba\Entity\CustomModuleEntity.
 */
class CustomModuleEntityAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\custom_module_seba\Entity\CustomModuleEntityInterface $entity */

    switch ($operation) {

      case 'view':

        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished custom module entity entities');
        }


        return AccessResult::allowedIfHasPermission($account, 'view published custom module entity entities');

      case 'update':

        return AccessResult::allowedIfHasPermission($account, 'edit custom module entity entities');

      case 'delete':

        return AccessResult::allowedIfHasPermission($account, 'delete custom module entity entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add custom module entity entities');
  }


}
