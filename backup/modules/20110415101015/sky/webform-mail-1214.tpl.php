<?php
// $Id: webform-mail.tpl.php,v 1.1.2.4 2009/01/19 03:31:10 quicksketch Exp $

/**
 * @file
 * Customize the e-mails sent by Webform after successful submission.
 *
 * This file may be renamed "webform-mail-[nid].tpl.php" to target a
 * specific webform e-mail on your site. Or you can leave it
 * "webform-mail.tpl.php" to affect all webform e-mails on your site.
 *
 * Available variables:
 * - $form_values: The values submitted by the user.
 * - $node: The node object for this webform.
 * - $user: The current user submitting the form.
 * - $ip_address: The IP address of the user submitting the form.
 * - $sid: The unique submission ID of this submission.
 * - $cid: The component for which this e-mail is being sent.
 *
 * The $cid can be used to send different e-mails to different users, such as
 * generating a reciept-type e-mail to send to the user that filled out the
 * form. Each form element in a webform is assigned a CID, by doing special
 * logic on CIDs you can customize various e-mails.
 */
?>
<?php print t('Submitted on @date', array('@date' => format_date(time(), 'small'))) ?>

<?php print t('') ?>

<?php
  // Print out all the Webform fields. This is purposely a theme function call
  // so that you may remove items from the submitted tree if you so choose.
  // unset($form_values['submitted_tree']['element_key']);
print theme('webform_mail_fields', 0, $form_values['submitted_tree'], $node, "\n");
?>


