<?php

/**
 * @file
 * Contains custom_module_entity.page.inc.
 *
 * Page callback for Custom module entity entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Custom module entity templates.
 *
 * Default template: custom_module_entity.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_custom_module_entity(array &$variables) {
  // Fetch CustomModuleEntity Entity Object.
  $custom_module_entity = $variables['elements']['#custom_module_entity'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
