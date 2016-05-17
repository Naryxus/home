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
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
	<?= $this->Html->css('bootstrap.css') ?>
	<?= $this->Html->script('bootstrap.js') ?>
	<?= $this->Html->script('jquery-2.2.3.js') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            	<span class="sr-only">Toggle navigation</span>
            	<!--<span class="icon-bar"></span>
            	<span class="icon-bar"></span>
            	<span class="icon-bar"></span>-->
        	</button>
        	<?= $this->Html->link('Codesammlung', array('controller' => 'Users', 'action' => 'index'), array('class' => 'navbar-brand')) ?>
    	</div>
    	<p class="navbar-text">
        	<?=
        		$this->Html->getCrumbs(' > ', array(
            		'text' => '<span class="fa fa-home"></span>',
            		'url' => array('controller' => 'Users', 'action' => 'index'), //TODO Rewrite to startpage
            		'escape' => false
        		));
        	?>
    	</p>
    	<!-- Top Menu Items -->
    	<ul class="nav navbar-right top-nav">
        	<li class="dropdown">
            	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
            	<ul class="dropdown-menu message-dropdown">
            	    <li class="message-preview">
            	        <a href="#">
            	            <div class="media">
										<span class="pull-left">
											<img class="media-object" src="http://placehold.it/50x50" alt="">
										</span>
            	                <div class="media-body">
            	                    <h5 class="media-heading"><strong>John Smith</strong></h5>
            	                    <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
            	                    <p>Lorem ipsum dolor sit amet, consectetur...</p>
            	                </div>
            	            </div>
            	        </a>
            	    </li>
            	    <li class="message-footer">
                	    <a href="#">Read All New Messages</a>
                	</li>
            	</ul>
        	</li>
        	<li class="dropdown">
            	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
            	<ul class="dropdown-menu alert-dropdown">
            	    <li>
            	        <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
            	    </li>
            	    <li class="divider"></li>
            	    <li>
            	        <a href="#">View All</a>
            	    </li>
            	</ul>
        	</li>
        	<li class="dropdown">
            	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?= $user['username'] ?> <b class="caret"></b></a>
            	<ul class="dropdown-menu">
            	    <li>
            	        <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
            	    </li>
            	    <li class="divider"></li>
            	    <li>
            	        <?= $this->Html->link('<i class="fa fa-fw fa-power-off"></i> Log Out', array('controller' => 'Users', 'action' => 'logout'), array('escape' => false)) ?>
            	    </li>
            	</ul>
        	</li>
    	</ul>
    	<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    	<div class="collapse navbar-collapse navbar-ex1-collapse">
        	<!--<ul class="nav navbar-nav side-nav">
            <?php
            if(isset($menuPermissions) && $menuPermissions['ControlObjects']) {
                if(isset($activeMenu) && $activeMenu['controller'] == 'ControlObjects') {
                    echo '<li class="active">';
                } else {
                    echo '<li>';
                }
                echo $this->Html->link('<i class="fa fa-fw fa-file-code-o"></i> Control Objects', array('controller' => 'ControlObjects', 'action' => 'index'), array('escape' => false));
                echo "</li>";
            }
            if(isset($menuPermissions) && $menuPermissions['Permissions']) {
                if(isset($activeMenu) && $activeMenu['controller'] == 'Permissions') {
                    echo '<li class="active">';
                } else {
                    echo '<li>';
                }
                echo $this->Html->link('<i class="fa fa-fw fa-ban"></i> Permissions', array('controller' => 'Permissions', 'action' => 'index'), array('escape' => false));
                echo "</li>";
            }
            if(isset($menuPermissions) && $menuPermissions['Shifts']) {
                echo '<li>';
                echo '<a href="#" data-toggle="collapse" data-target="#shiftMenu"><span class="fa fa-fw fa-film"></span> Shifts <span class="fa fa-fw fa-caret-down"></span></a>';
                if(isset($activeMenu) && $activeMenu['controller'] == 'Shifts') {
                    $collapseClass = 'collapse in';
                } else {
                    $collapseClass = 'collapse';
                }
                echo '<ul id="shiftMenu" class="'.$collapseClass.'">';
                if($menuPermissions['Shifts/index']) {
                    if(isset($activeMenu) && $activeMenu['controller'] == 'Shifts' && $activeMenu['action'] == 'index') {
                        $style = 'background-color:#080808';
                        echo '<li class="active">';
                    } else {
                        $style = '';
                        echo '<li>';
                    }
                    echo $this->Html->link('<i class="fa fa-fw fa-bars"></i> Overview', array('controller' => 'Shifts', 'action' => 'index'), array('escape' => false,  'style' => $style));
                    echo '</li>';
                }
                if($menuPermissions['Shifts/statistic']) {
                    if(isset($activeMenu) && $activeMenu['controller'] == 'Shifts' && $activeMenu['action'] == 'statistic') {
                        $style = 'background-color:#080808';
                        echo '<li class="active">';
                    } else {
                        $style = '';
                        echo '<li>';
                    }
                    echo $this->Html->link('<i class="fa fa-fw fa-bar-chart"></i> Statistics', array('controller' => 'Shifts', 'action' => 'statistic'), array('escape' => false,  'style' => $style));
                    echo '</li>';
                }
                echo '</ul>';
                echo "</li>";
            }
            ?>
        </ul>-->
		</div>
		<!-- /.navbar-collapse -->
	</nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
