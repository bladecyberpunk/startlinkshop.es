<?php
/**
 * @version		2.6.x
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.net
 * @copyright	Copyright (c) 2006 - 2014 JoomlaWorks Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die;

?>

<!-- K2 user register form -->
<?php if(isset($this->message)) $this->display('message'); ?>
<div class="registration">
<div class="vina-form">
<?php if($this->params->def('show_page_title',1)): ?>
	<div class="page-header">
		<h1>
			<?php echo $this->escape($this->params->get('page_title')); ?>
		</h1>
	</div>
<?php endif; ?>
<form action="<?php echo JURI::root(true); ?>/index.php" enctype="multipart/form-data" method="post" id="josForm" name="josForm" class="form-validate">
	<fieldset class="well">
		<div class="vina-control">
			<div class="control-group">
				<label><?php echo JText::_('K2_NAME'); ?> (*) </label>
				<input placeholder="<?php echo JText::_('K2_NAME'); ?>" type="text" name="<?php echo $this->nameFieldName; ?>" id="name" size="40" value="<?php echo $this->escape($this->user->get( 'name' )); ?>" class="inputbox required" maxlength="50" />
			</div>
			<div class="control-group">
				<label><?php echo JText::_('K2_USER_NAME'); ?> (*) </label>
				<input placeholder="<?php echo JText::_('K2_USER_NAME'); ?>" type="text" id="username" name="<?php echo $this->usernameFieldName; ?>" size="40" value="<?php echo $this->escape($this->user->get( 'username' )); ?>" class="inputbox required validate-username" maxlength="25" />
			</div>
			<div class="control-group">
				<label><?php echo JText::_('K2_USER_NAME'); ?> (*) </label>
				<input placeholder="<?php echo JText::_('K2_EMAIL'); ?>" type="text" id="email" name="<?php echo $this->emailFieldName; ?>" size="40" value="<?php echo $this->escape($this->user->get( 'email' )); ?>" class="inputbox required validate-email" maxlength="100" />
			</div>
			<?php if(version_compare(JVERSION, '1.6', 'ge')): ?>
			<div class="control-group">
				<label><?php echo JText::_('K2_CONFIRM_EMAIL'); ?> (*) </label>
				<input placeholder="<?php echo JText::_('K2_CONFIRM_EMAIL'); ?>" type="text" id="email2" name="jform[email2]" size="40" value="" class="inputbox required validate-email" maxlength="100" />
			</div>
			<?php endif; ?>
			<div class="control-group">
				<label><?php echo JText::_('K2_PASSWORD'); ?> (*) </label>
				<input placeholder="<?php echo JText::_('K2_PASSWORD'); ?>" class="inputbox required validate-password" type="password" id="password" name="<?php echo $this->passwordFieldName; ?>" size="40" value="" />
			</div>
			<div class="control-group">
				<label><?php echo JText::_('K2_VERIFY_PASSWORD'); ?> (*) </label>
				<input placeholder="<?php echo JText::_('K2_VERIFY_PASSWORD'); ?>" class="inputbox required validate-passverify" type="password" id="password2" name="<?php echo $this->passwordVerifyFieldName; ?>" size="40" value="" />
			</div>
			<div class="control-group">
				<?php echo JText::_('K2_PERSONAL_DETAILS'); ?>
			</div>
			<div class="control-group">
				<?php echo $this->lists['gender']; ?>
			</div>
			<div class="control-group">
				<label><?php echo JText::_('K2_DESCRIPTION'); ?></label>
				<?php echo $this->editor; ?>
			</div>
			<div class="control-group">
				<input type="file" id="image" name="image"/>
				<?php if ($this->K2User->image): ?>
				<img class="k2AdminImage" src="<?php echo JURI::root().'media/k2/users/'.$this->K2User->image; ?>" alt="<?php echo $this->user->name; ?>" />
				<input type="checkbox" name="del_image" id="del_image" />
				<label for="del_image"><?php echo JText::_('K2_CHECK_THIS_BOX_TO_DELETE_CURRENT_IMAGE_OR_JUST_UPLOAD_A_NEW_IMAGE_TO_REPLACE_THE_EXISTING_ONE'); ?></label>
				<?php endif; ?>
			</div>
			<div class="control-group">
				<label><?php echo JText::_('K2_URL'); ?></label>
				<input placeholder="<?php echo JText::_('K2_URL'); ?>" type="text" size="50" value="<?php echo $this->K2User->url; ?>" name="url" id="url"/>
			</div>
			<?php if(count(array_filter($this->K2Plugins))): ?>
			<div class="control-group">
					<?php echo JText::_('K2_ADDITIONAL_DETAILS'); ?>
					<?php foreach ($this->K2Plugins as $K2Plugin): ?>
					<?php if(!is_null($K2Plugin)): ?>
					<div class="control-group">
							<?php echo $K2Plugin->fields; ?>
					</div>
					<?php endif; ?>
					<?php endforeach; ?>
			</div>
			<?php endif; ?>
			
			<!-- Joomla! 1.6+ JForm implementation -->
			<?php if(isset($this->form)): ?>
			<?php foreach ($this->form->getFieldsets() as $fieldset): // Iterate through the form fieldsets and display each one.?>
				<?php if($fieldset->name != 'default'): ?>
				<?php $fields = $this->form->getFieldset($fieldset->name);?>
				<?php if (count($fields)):?>
					<?php if (isset($fieldset->label)):// If the fieldset has a label set, display it as the legend.?>
					<div class="control-group">
							<?php echo JText::_($fieldset->label);?>
					</div>
					<?php endif;?>
					<?php foreach($fields as $field):// Iterate through the fields in the set and display them.?>
						<?php if ($field->hidden):// If the field is hidden, just display the input.?>
							<div class="control-group"><?php echo $field->input;?></div>
						<?php else:?>
							<div class="control-group"><?php echo $field->input;?></div>
						<?php endif;?>
					<?php endforeach;?>
				<?php endif;?>
				<?php endif; ?>
			<?php endforeach;?>
			<?php endif; ?>
			</div>
			<div class="control-group">
				<?php if($this->K2Params->get('recaptchaOnRegistration') && $this->K2Params->get('recaptcha_public_key')): ?>
				<label class="formRecaptcha"><?php echo JText::_('K2_ENTER_THE_TWO_WORDS_YOU_SEE_BELOW'); ?></label>
				<div id="recaptcha"></div>
				<?php endif; ?>
			</div>
			<div class="control-group">
				<div class="k2AccountPageNotice"><?php echo JText::_('K2_REGISTER_REQUIRED'); ?></div>
			</div>
			<button class="vina-button" type="submit">
				<?php echo JText::_('K2_REGISTER'); ?>
			</button>
		</div>
	</fieldset>
	<input type="hidden" name="option" value="<?php echo $this->optionValue; ?>" />
	<input type="hidden" name="task" value="<?php echo $this->taskValue; ?>" />
	<input type="hidden" name="id" value="0" />
	<input type="hidden" name="gid" value="0" />
	<input type="hidden" name="K2UserForm" value="1" />
	<?php echo JHTML::_( 'form.token' ); ?>
</form>
</div>
</div>
