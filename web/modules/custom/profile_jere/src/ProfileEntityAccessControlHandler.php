<?php

namespace Drupal\profile_jere;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Profile entity entity.
 *
 * @see \Drupal\profile_jere\Entity\ProfileEntity.
 */
class ProfileEntityAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\profile_jere\Entity\ProfileEntityInterface $entity */

    switch ($operation) {

      case 'view':

        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished profile entity entities');
        }


        return AccessResult::allowedIfHasPermission($account, 'view published profile entity entities');

      case 'update':

        return AccessResult::allowedIfHasPermission($account, 'edit profile entity entities');

      case 'delete':

        return AccessResult::allowedIfHasPermission($account, 'delete profile entity entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add profile entity entities');
  }


}
