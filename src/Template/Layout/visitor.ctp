<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        <?php echo $this->fetch('title'); ?>
    </title>
    <style type="text/css">
        .vertical-center {
            min-height: 100%;  /* Fallback for browsers do NOT support vh unit */
            min-height: 100vh; /* These two lines are counted as one :-)       */

            display: flex;
            align-items: center;
        }
    </style>
    <?php
    echo $this->Html->meta('icon');

    echo $this->Html->css('bootstrap');
    echo $this->Html->css('font-awesome');
    echo $this->Html->script('bootstrap');

    echo $this->fetch('meta');
    //echo $this->fetch('css');
    echo $this->fetch('script');
    ?>
</head>
<body>
<div class="vertical-center">
    <div class="container">
        <?= $this->Form->create() ?>
			<?= $this->Flash->render() ?>
			<div class="row">
				<div class="col-xs-12 col-md-4 col-md-offset-4">
            		<div class="form-group">
                		<div class="input-group">
							<div class="input-group-addon"><span class="fa fa-user"></span></div>
                			<?= $this->Form->input('username', [
                    			'class' => 'form-control',
                    			'id' => 'username',
                    			'label' => false,
                    			'placeholder' => __('Username')
							]) ?>
						</div>
            		</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-md-4 col-md-offset-4">
            		<div class="form-group">
						<div class="input-group">
							<div class="input-group-addon"><span class="fa fa-key"></span></div>
							<?= $this->Form->input('password', [
                    			'class' => 'form-control',
                    			'id' => 'password',
                    			'label' => false,
                    			'placeholder' => __('Password')
							]) ?>
						</div>
            		</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-md-4 col-md-offset-4">
            		<?= $this->Form->button(__('Login'), ['class' => 'btn btn-default']) ?>
				</div>
			</div>
        <?= $this->Form->end() ?>
    </div>
</div>
</body>
</html>