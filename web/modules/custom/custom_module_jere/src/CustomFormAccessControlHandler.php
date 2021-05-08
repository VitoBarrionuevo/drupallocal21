<?php

namespace Drupal\custom_module_jere;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Custom form entity.
 *
 * @see \Drupal\custom_module_jere\Entity\CustomForm.
 */
class CustomFormAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\custom_module_jere\Entity\CustomFormInterface $entity */

    switch ($operation) {

      case 'view':

        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished custom form entities');
        }


        return AccessResult::allowedIfHasPermission($account, 'view published custom form entities');

      case 'update':

        return AccessResult::allowedIfHasPermission($account, 'edit custom form entities');

      case 'delete':

        return AccessResult::allowedIfHasPermission($account, 'delete custom form entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add custom form entities');
  }


}
