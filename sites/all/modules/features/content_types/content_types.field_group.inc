<?php
/**
 * @file
 * content_types.field_group.inc
 */

/**
 * Implements hook_field_group_info().
 */
function content_types_field_group_info() {
  $export = array();

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_entourage|node|wedding_ct|form';
  $field_group->group_name = 'group_entourage';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'wedding_ct';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Entourage',
    'weight' => '4',
    'children' => array(
      0 => 'field_maid_of_honor',
      1 => 'field_best_man',
      2 => 'field_bridesmaid',
      3 => 'field_groomsmen',
      4 => 'field_candle',
      5 => 'field_cord',
      6 => 'field_veil',
      7 => 'field_ring_bearer',
      8 => 'field_bible_bearer',
      9 => 'field_coin_bearer',
      10 => 'field_flower_girls',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'formatter' => 'collapsible',
      'instance_settings' => array(
        'description' => '',
        'classes' => '',
        'required_fields' => 1,
      ),
    ),
  );
  $export['group_entourage|node|wedding_ct|form'] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_godfathers|node|wedding_ct|form';
  $field_group->group_name = 'group_godfathers';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'wedding_ct';
  $field_group->mode = 'form';
  $field_group->parent_name = 'group_sponsors';
  $field_group->data = array(
    'label' => 'Godfathers',
    'weight' => '8',
    'children' => array(
      0 => 'field_godfather_name',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'formatter' => 'collapsible',
      'instance_settings' => array(
        'description' => '',
        'classes' => '',
        'required_fields' => 1,
      ),
    ),
  );
  $export['group_godfathers|node|wedding_ct|form'] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_godmothers|node|wedding_ct|form';
  $field_group->group_name = 'group_godmothers';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'wedding_ct';
  $field_group->mode = 'form';
  $field_group->parent_name = 'group_sponsors';
  $field_group->data = array(
    'label' => 'Godmothers',
    'weight' => '9',
    'children' => array(
      0 => 'field_godmother_name',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'formatter' => 'collapsible',
      'instance_settings' => array(
        'description' => '',
        'classes' => '',
        'required_fields' => 1,
      ),
    ),
  );
  $export['group_godmothers|node|wedding_ct|form'] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_locations|node|wedding_ct|form';
  $field_group->group_name = 'group_locations';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'wedding_ct';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Locations',
    'weight' => '2',
    'children' => array(
      0 => 'field_location_ref',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'formatter' => 'collapsible',
      'instance_settings' => array(
        'description' => '',
        'classes' => '',
        'required_fields' => 1,
      ),
    ),
  );
  $export['group_locations|node|wedding_ct|form'] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_sponsors|node|wedding_ct|form';
  $field_group->group_name = 'group_sponsors';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'wedding_ct';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Sponsors',
    'weight' => '3',
    'children' => array(
      0 => 'group_godfathers',
      1 => 'group_godmothers',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'formatter' => 'collapsible',
      'instance_settings' => array(
        'description' => '',
        'classes' => '',
        'required_fields' => 1,
      ),
    ),
  );
  $export['group_sponsors|node|wedding_ct|form'] = $field_group;

  return $export;
}
