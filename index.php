<?php
/**
 * @package   Visario Joomla! 3.0 Template
 * @version   1.0
 * @author    7Studio Tomasz Herudzinski http://www.7studio.eu
 * @copyright Copyright (C) 2009 - 2012 7Studio Tomasz Herudzinski
 * @license   Commercial - ThemeForest Regular License - http://themeforest.net/licenses/regular_extended
**/

defined('_JEXEC') or die;
require_once __DIR__ . '/lib/base.php';

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">

<head>
	<?php if ($template_responsive) : ?>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<?php endif; ?>

	<jdoc:include type="head" />
	<?php require_once __DIR__ . '/head.php';?>
</head>

<body class="<?php echo $option. " view-" .$view. " layout-" .$layout. " task-" .$task. " itemid-" .$itemid . $rtl_detection; ?>">
	
	<!-- Body -->
	<div class="body-wrapper">

		<!-- Header -->
		<header id="header">
			<div class="container-fluid">
				
			<?php if (($this->countModules('toolbar-a')) or ($this->countModules('toolbar-b'))) : ?>
			
				<div id="top-toolbar" class="pull-right">

				<?php if ($this->countModules('toolbar-b')): ?>
					<div class="pull-right">
						<jdoc:include type="modules" name="toolbar-b" style="basic" />
					</div>
				<?php endif; ?>	

				<?php if ($this->countModules('toolbar-a')): ?>
					<div class="pull-right">
						<jdoc:include type="modules" name="toolbar-a" style="basic" />
					</div>
				<?php endif; ?>	

				</div>
				
			<?php endif; ?>

				<div class="logo pull-left">
                                    <h1 class="logo"><?php echo $logo; ?></h1>
				</div>

				<button type="button" class="btn-navbar pull-right" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

			</div>
		</header>
		<!-- End Header -->
		
	<?php if (($this->countModules('menu')) or ($login_button) or ($register_button)) : ?>
	
		<nav id="menu" class="clearfix">	
			<div class="container-fluid">
				<div class="nav-collapse collapse">
					<jdoc:include type="modules" name="menu" style="basic" />
				</div>
				
			<?php if (($login_button) or ($register_button)) : ?>
			
				<div id="user-toolbar">
					<ul> 	
					<?php if ($login_button) : ?>
						<li><a href="#" class="login-btn"><?php echo htmlspecialchars($logintext); ?></a></li>
					<?php endif; ?>	
						
					<?php if ($register_button) : ?>
						<li><a href="<?php echo JRoute::_('index.php?option=com_users&view=registration'); ?>"><?php echo htmlspecialchars($registertext); ?></a></li>
					<?php endif; ?>		
					</ul>	
				</div>
				
			<?php endif; ?>	
					
			</div>
		</nav>
		
	<?php endif; ?>
		
	<?php if ($this->countModules('slider')): ?>	
		<div id="slider">	
				<jdoc:include type="modules" name="slider" style="basic" />
		</div>
	<?php endif; ?>	
		
	<?php if ($this->countModules('banner')): ?>	
		<div id="banner" class="clearfix">
			<div class="container-fluid">
				<div id="banner-bg">
					<jdoc:include type="modules" name="banner" style="banner" />
				</div>
			</div>
		</div>
	<?php endif; ?>	
	
	<?php if ($this->countModules('breadcrumbs')): ?>
		<div id="breadcrumbs">
			<div class="container-fluid">
				<jdoc:include type="modules" name="breadcrumbs" style="basic" />
			</div>
		</div>
	<?php endif; ?>

		
	<?php if ($this->countModules('top-a')): ?>	
		<div id="top-a" class="clearfix">	
			<div class="container-fluid">
				<jdoc:include type="modules" name="top-a" style="<?php echo $top_a; ?>" />
			</div>
		</div>
	<?php endif; ?>	
		
	<?php if ($this->countModules('top-b')): ?>
		<div id="top-b" class="clearfix">
			<div class="container-fluid">
				<jdoc:include type="modules" name="top-b" style="<?php echo $top_b; ?>" />
			</div>	
		</div>
	<?php endif; ?>
					
		<!-- Mainbody -->
		<div id="mainbody" class="clearfix">
			<div class="container-fluid">
				<div class="row-fluid">	
				
				<?php if ($this->countModules('sidebar-left')): ?>
					<div class="sidebar-left span<?php echo $sidebar_left_width; ?>">
						<div class="sidebar-nav">
							<jdoc:include type="modules" name="sidebar-left" style="standard" />
						</div>
					</div>
				<?php endif; ?>
						
					<!-- Content Block -->
					<div id="content" class="span<?php echo $span;?>">
				
						<div id="message-component">
							<jdoc:include type="message" />
						</div>
					
					<?php if ($this->countModules('maintop-a')): ?>
						<div id="maintop-a">
							<jdoc:include type="modules" name="maintop-a" style="<?php echo $maintop_a; ?>" />
						</div>
					<?php endif; ?>
						
					<?php if ($this->countModules('maintop-b')): ?>
						<div id="maintop-b">
							<jdoc:include type="modules" name="maintop-b" style="<?php echo $maintop_b; ?>" />
						</div>
					<?php endif; ?>
						
						<div id="content-area">
							<jdoc:include type="component" />
						</div>
						
					<?php if ($this->countModules('mainbottom-a')): ?>
						<div id="mainbottom-a">
							<jdoc:include type="modules" name="mainbottom-a" style="<?php echo $mainbottom_a; ?>" />
						</div>
					<?php endif; ?>	

					<?php if ($this->countModules('mainbottom-b')): ?>
						<div id="mainbottom-b">
							<jdoc:include type="modules" name="mainbottom-b" style="<?php echo $mainbottom_b; ?>" />
						</div>
					<?php endif; ?>	
						
					</div>
					<!-- End Content Block -->
					
					<?php if ($this->countModules('sidebar-right')) : ?>
					<aside class="sidebar-right span<?php echo $sidebar_right_width; ?>">
						<jdoc:include type="modules" name="sidebar-right" style="standard" />
					</aside>
					<?php endif; ?>
				
				</div>
			</div>
		</div>
		<!-- End Mainbody -->
		
	<?php if ($this->countModules('bottom-a')): ?>
		<div id="bottom-a" class="clearfix">
			<div class="container-fluid">
				<jdoc:include type="modules" name="bottom-a" style="<?php echo $bottom_a; ?>" />
			</div>
		</div>
	<?php endif; ?>
	
	<?php if ($this->countModules('bottom-bar')): ?>	
		<div id="bottom-bar" class="clearfix">	
			<div class="container-fluid">
				<jdoc:include type="modules" name="bottom-bar" style="basic" />
			</div>
		</div>
	<?php endif; ?>	

	<?php if ($this->countModules('bottom-b')): ?>
		<div id="bottom-b" class="clearfix">
			<div class="container-fluid">
				<jdoc:include type="modules" name="bottom-b" style="<?php echo $bottom_b; ?>" />
			</div>
		</div>
	<?php endif; ?>
			
	<?php if (($this->countModules('footer')) or ($copyrights) or ($social_icons)): ?>
		<!-- Footer -->
		<footer id="footer" class="clearfix">
			<div class="container-fluid">
					
			<?php if ($social_icons) : ?>
				<ul class="social-icons pull-left">
				
				<?php if( $facebook != '' ) : ?>
					<li class="icon_facebook"><a href="<?php echo $facebook; ?>" target="_blank"></a></li> 
				<?php endif; ?>
				<?php if( $twitter != '' ) : ?>
					<li class="icon_twitter"><a href="<?php echo $twitter; ?>" target="_blank"></a></li> 
				<?php endif; ?>
				<?php if( $dribbble != '' ) : ?>
					<li class="icon_dribbble"><a href="<?php echo $dribbble; ?>" target="_blank"></a></li> 
				<?php endif; ?>
				<?php if( $behance != '' ) : ?>
					<li class="icon_behance"><a href="<?php echo $behance; ?>" target="_blank"></a></li> 
				<?php endif; ?>
				<?php if( $linkedin != '' ) : ?>
					<li class="icon_in"><a href="<?php echo $linkedin; ?>" target="_blank"></a></li> 
				<?php endif; ?>
				<?php if( $flickr != '' ) : ?>
					<li class="icon_flickr"><a href="<?php echo $flickr; ?>" target="_blank"></a></li> 
				<?php endif; ?>
				<?php if( $youtube != '' ) : ?>
					<li class="icon_youtube"><a href="<?php echo $youtube; ?>" target="_blank"></a></li> 
				<?php endif; ?>
				<?php if( $vimeo != '' ) : ?>
					<li class="icon_vimeo"><a href="<?php echo $vimeo; ?>" target="_blank"></a></li> 
				<?php endif; ?>
				<?php if( $google_plus != '' ) : ?>
					<li class="icon_googleplus"><a href="<?php echo $google_plus; ?>" target="_blank"></a></li> 
				<?php endif; ?>
				
				</ul>
			<?php endif; ?>
				
			<?php if ($this->countModules('footer')): ?>
				<div class="footer-menu pull-left">
					<jdoc:include type="modules" name="footer" style="basic" />
				</div>
			<?php endif; ?>
			
				<!-- Copyrights -->
			<?php if ($copyrights) : ?>
				<p class="copyrights pull-right">
				
				<?php if ($copytext) : ?>
					<?php echo $copytext ?>
				<?php  else : ?>
					<a href="<?php echo $this->baseurl ?>"><?php echo $sitename; ?></a> &copy; <?php echo date('Y');?>
				<?php endif; ?>
				
				</p>
			<?php endif; ?>
					
			</div>
		</footer>
		<!-- End Footer -->
	<?php endif; ?>
		
	<?php if ($this->countModules('disclaimer')): ?>
		<div id="disclaimer" class="clearfix">
			<div class="container-fluid">
				<jdoc:include type="modules" name="disclaimer" style="basic" />
			</div>
		</div>
	<?php endif; ?>
		
	</div>
	<!-- End Body -->

	<?php if ($totop) : ?>
	<!-- To Top Scroller -->
		<a href="#" id="totop"></a>
	<?php endif; ?>
	
	<?php if ($this->countModules('login')): ?>
		<!-- Login Modal Box -->
		<div class="login-modal">
			<button type="button" class="close">&#215;</button>
			<div class="login-wrapper">
				<jdoc:include type="modules" name="login" style="standard" />
			</div>
		</div>
		<div class="login-backdrop"></div>
	<?php endif; ?>
		
	<jdoc:include type="modules" name="debug" style="none" />
	
</body>
</html>
