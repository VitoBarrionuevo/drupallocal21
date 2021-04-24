<?php

namespace Drupal\custom_module_tosky\Entity;

use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\Core\Entity\EntityPublishedTrait;
use Drupal\Core\Entity\EntityTypeInterface;

/**
 * Defines the Custom module entity entity.
 *
 * @ingroup custom_module_tosky
 *
 * @ContentEntityType(
 *   id = "custom_module_entity",
 *   label = @Translation("Custom module entity"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\custom_module_tosky\CustomModuleEntityListBuilder",
 *     "views_data" = "Drupal\custom_module_tosky\Entity\CustomModuleEntityViewsData",
 *     "translation" = "Drupal\custom_module_tosky\CustomModuleEntityTranslationHandler",
 *
 *     "form" = {
 *       "default" = "Drupal\custom_module_tosky\Form\CustomModuleEntityForm",
 *       "add" = "Drupal\custom_module_tosky\Form\CustomModuleEntityForm",
 *       "edit" = "Drupal\custom_module_tosky\Form\CustomModuleEntityForm",
 *       "delete" = "Drupal\custom_module_tosky\Form\CustomModuleEntityDeleteForm",
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\custom_module_tosky\CustomModuleEntityHtmlRouteProvider",
 *     },
 *     "access" = "Drupal\custom_module_tosky\CustomModuleEntityAccessControlHandler",
 *   },
 *   base_table = "custom_module_entity",
 *   data_table = "custom_module_entity_field_data",
 *   translatable = TRUE,
 *   admin_permission = "administer custom module entity entities",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "name",
 *     "uuid" = "uuid",
 *     "langcode" = "langcode",
 *     "published" = "status",
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/custom_module_entity/{custom_module_entity}",
 *     "add-form" = "/admin/structure/custom_module_entity/add",
 *     "edit-form" = "/admin/structure/custom_module_entity/{custom_module_entity}/edit",
 *     "delete-form" = "/admin/structure/custom_module_entity/{custom_module_entity}/delete",
 *     "collection" = "/admin/structure/custom_module_entity",
 *   },
 *   field_ui_base_route = "custom_module_entity.settings"
 * )
 */
class CustomModuleEntity extends ContentEntityBase implements CustomModuleEntityInterface {

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
      ->setDescription(t('The name of the Custom module entity entity.'))
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

    $fields['status']->setDescription(t('A boolean indicating whether the Custom module entity is published.'))
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
