<?php

namespace Drupal\profile_jere\Entity;

use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\Core\Entity\EntityPublishedTrait;
use Drupal\Core\Entity\EntityTypeInterface;

/**
 * Defines the Profile entity entity.
 *
 * @ingroup profile_jere
 *
 * @ContentEntityType(
 *   id = "profile_entity",
 *   label = @Translation("Profile entity"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\profile_jere\ProfileEntityListBuilder",
 *     "views_data" = "Drupal\profile_jere\Entity\ProfileEntityViewsData",
 *     "translation" = "Drupal\profile_jere\ProfileEntityTranslationHandler",
 *
 *     "form" = {
 *       "default" = "Drupal\profile_jere\Form\ProfileEntityForm",
 *       "add" = "Drupal\profile_jere\Form\ProfileEntityForm",
 *       "edit" = "Drupal\profile_jere\Form\ProfileEntityForm",
 *       "delete" = "Drupal\profile_jere\Form\ProfileEntityDeleteForm",
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\profile_jere\ProfileEntityHtmlRouteProvider",
 *     },
 *     "access" = "Drupal\profile_jere\ProfileEntityAccessControlHandler",
 *   },
 *   base_table = "profile_entity",
 *   data_table = "profile_entity_field_data",
 *   translatable = TRUE,
 *   admin_permission = "administer profile entity entities",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "name",
 *     "uuid" = "uuid",
 *     "langcode" = "langcode",
 *     "published" = "status",
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/profile_entity/{profile_entity}",
 *     "add-form" = "/admin/structure/profile_entity/add",
 *     "edit-form" = "/admin/structure/profile_entity/{profile_entity}/edit",
 *     "delete-form" = "/admin/structure/profile_entity/{profile_entity}/delete",
 *     "collection" = "/admin/structure/profile_entity",
 *   },
 *   field_ui_base_route = "profile_entity.settings"
 * )
 */
class ProfileEntity extends ContentEntityBase implements ProfileEntityInterface {

  use EntityChangedTrait;
  use EntityPublishedTrait;

  /**
   * {@inheritdoc}
   */
  public function getName() {
    return $this->get('name')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setName($name) {
    $this->set('name', $name);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getCreatedTime() {
    return $this->get('created')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setCreatedTime($timestamp) {
    $this->set('created', $timestamp);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    $fields = parent::baseFieldDefinitions($entity_type);

    // Add the published field.
    $fields += static::publishedBaseFieldDefinitions($entity_type);

    $fields['name'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Name'))
      ->setDescription(t('The name of the Profile entity entity.'))
      ->setSettings([
        'max_length' => 50,
        'text_processing' => 0,
      ])
      ->setDefaultValue('')
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'string',
        'weight' => -4,
      ])
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'weight' => -4,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE)
      ->setRequired(TRUE);

    $fields['status']->setDescription(t('A boolean indicating whether the Profile entity is published.'))
      ->setDisplayOptions('form', [
        'type' => 'boolean_checkbox',
        'weight' => -3,
      ]);

    $fields['created'] = BaseFieldDefinition::create('created')
      ->setLabel(t('Created'))
      ->setDescription(t('The time that the entity was created.'));

    $fields['changed'] = BaseFieldDefinition::create('changed')
      ->setLabel(t('Changed'))
      ->setDescription(t('The time that the entity was last edited.'));

    return $fields;
  }

}
