<?php
echo $this->Form->create(false, array(
	'url' => array(
		'plugin' => 'install',
		'controller' => 'install',
		'action' => 'database'
	),
	'inputDefaults' => array(
		'label' => false,
		'div' => $this->Theme->getCssClass('addonClass').' input text',
	),
), array(
	'class' => 'inline',
));

$iconPrefix=trim($this->Theme->getIconDefault('classDefault').' '.$this->Theme->getIconDefault('classPrefix'));
?>
<div class="install">
	<h2><?php echo $title_for_layout; ?></h2>

	<?php if ($currentConfiguration['exists']):  ?>
		<div class="alert alert-warning">
			<strong><?php echo __d('croogo', 'Warning'); ?>:</strong>
			<?php echo __d('croogo', 'A `database.php` file already exists.'); ?>
			<?php
			if ($currentConfiguration['valid']):
				$valid = __d('croogo', 'Valid');
				$class = 'text-success';
			else:
				$valid = __d('croogo', 'Invalid');
				$class = 'text-error';
			endif;
			echo __d('croogo', 'This file is %s.', $this->Html->tag('span', $valid, compact('class')));
			?>
			<?php if ($currentConfiguration['valid']): ?>
			<?php
				echo $this->Html->link(
					__d('croogo', 'Reuse this file and proceed.'),
					array('action' => 'data')
				);
			?>
			<?php else: ?>
				<?php echo __d('croogo', 'This file will be replaced.'); ?>
			<?php endif; ?>
		</div>
	<?php endif; ?>

	<?php
		echo $this->Form->input('datasource', array(
			'label' => __d('croogo', 'Database'),
			'default' => 'Database/Mysql',
			'empty' => false,
			'options' => array(
				'Database/Mysql' => 'mysql',
				'Database/Sqlite' => 'sqlite',
				'Database/Postgres' => 'postgres',
				'Database/Sqlserver' => 'mssql',
			),
			'div'=>'input select',
		));
		echo $this->Form->input('host', array(
			'placeholder' => __d('croogo', 'Host'),
			'default' => 'localhost',
			'tooltip' => __d('croogo', 'Database hostname or IP Address'),
			'before' => '<span class="input-group-addon">'.$this->Html->icon('home').'</span>',
		));
		echo $this->Form->input('login', array(
			'placeholder' => __d('croogo', 'Login'),
			'default' => 'root',
			'tooltip' => __d('croogo', 'Database login/username'),
			'before' => '<span class="input-group-addon">'.$this->Html->icon('user').'</span>',
		));
		echo $this->Form->input('password', array(
			'placeholder' => __d('croogo', 'Password'),
			'tooltip' => __d('croogo', 'Database password'),
			'before' => '<span class="input-group-addon">'.$this->Html->icon('key').'</span>',
		));
		echo $this->Form->input('database', array(
			'placeholder' => __d('croogo', 'Name'),
			'default' => 'croogo',
			'tooltip' => __d('croogo', 'Database name'),
			'before' => '<span class="input-group-addon">'.$this->Html->icon('briefcase').'</span>',
		));
		echo $this->Form->input('prefix', array(
			'placeholder' => __d('croogo', 'Prefix'),
			'tooltip' => __d('croogo', 'Table prefix (leave blank if unknown)'),
			'before' => '<span class="input-group-addon">'.$this->Html->icon('minus').'</span>',
		));
		echo $this->Form->input('port', array(
			'placeholder' => __d('croogo', 'Port'),
			'tooltip' => __d('croogo', 'Database port (leave blank if unknown)'),
			'before' => '<span class="input-group-addon">'.$this->Html->icon('asterisk').'</span>',
		));
	?>
</div>
<div class="form-actions">
	<?php echo $this->Form->submit('Submit', array('button' => 'success', 'div' => 'input submit')); ?>
</div>
<?php echo $this->Form->end(); ?>