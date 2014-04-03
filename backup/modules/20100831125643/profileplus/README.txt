; $Id: README.txt,v 1.1.4.2 2009/01/15 19:19:21 incrn8 Exp $

README.txt file for ProfilePlus module.

This module allows you to search all public fields in a user's profile. This includes the default
fields created by Drupal e.g. username, and any custom fields you might create with the Profile module.
Multiple keyword searching is also possible with this module. The returned results will link directly to
the user's profile.

INSTALLATION
============

1. Copy all files into their own folder, in the modules folder (preferably in sites/all/modules/profileplus).
2. Activate the module.
3. Add the following code to your theme's template.php file (if you don't have a template.php file, create
   one and add '<?php' to the top of the file - without the quotation marks):

// --------- code start ------------
/**
 * Override or insert PHPTemplate variables into the templates.
 */
function phptemplate_preprocess_page(&$vars) {
  // ProfilePlus module: remove the Users tab from the search page
  if (module_exists('profileplus')) {
    _removetab('Users', $vars);
  }
}


/**
 * Removes a tab from the $tabs array.
 * ProfilePlus uses this function to remove the 'Users' tab 
 * from the search page.
 */
function _removetab($label, &$vars) {
  $tabs = explode("\n", $vars['tabs']);
  $vars['tabs'] = '';

  foreach($tabs as $tab) {
    if(strpos($tab, '>' . $label . '<') === FALSE) {
      $vars['tabs'] .= $tab . "\n";
    }
  }
}

// --------- code end ------------