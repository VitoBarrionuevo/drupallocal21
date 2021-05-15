<?php

/**
 * @file
 * Contains profile_entity.page.inc.
 *
 * Page callback for Profile entity entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Profile entity templates.
 *
 * Default template: profile_entity.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_profile_entity(array &$variables) {
  // Fetch ProfileEntity Entity Object.
  $profile_entity = $variables['elements']['#profile_entity'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
