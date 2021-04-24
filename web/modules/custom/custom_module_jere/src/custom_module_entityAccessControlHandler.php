<?php

namespace Drupal\custom_module_jere;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Custom_module_entity entity.
 *
 * @see \Drupal\custom_module_jere\Entity\custom_module_entity.
 */
class custom_module_entityAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\custom_module_jere\Entity\custom_module_entityInterface $entity */

    switch ($operation) {

      case 'view':

        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished custom_module_entity entities');
        }


        return AccessResult::allowedIfHasPermission($account, 'view published custom_module_entity entities');

      case 'update':

        return AccessResult::allowedIfHasPermission($account, 'edit custom_module_entity entities');

      case 'delete':

        return AccessResult::allowedIfHasPermission($account, 'delete custom_module_entity entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add custom_module_entity entities');
  }


}
