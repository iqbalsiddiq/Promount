<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

    <!-- START @HEAD  -->
    <head>
        <!-- START @META  SECTION -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="Blankon is a theme fullpack admin template powered by Twitter bootstrap 3 front-end framework. Included are multiple example pages, elements styles, and javascript widgets to get your project started.">
        <meta name="keywords" content="admin, admin template, bootstrap3, clean, fontawesome4, good documentation, lightweight admin, responsive dashboard, webapp">
        <meta name="author" content="Djava UI">
        <title><?php echo e($title); ?></title>
        <!--/ END META SECTION -->


        <!-- START @GLOBAL  MANDATORY STYLES -->
	<?php if(!empty($css['globals'])): ?>
		<?php $__currentLoopData = $css['globals']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $global): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
			<link href="<?php echo e($assetUrl.$global); ?>" rel="stylesheet">
		<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	<?php endif; ?>
        <!--/ END GLOBAL MANDATORY STYLES -->

        <!-- START @PAGE  LEVEL STYLES -->
        <?php if(!empty($css['pages'])): ?>
		<?php $__currentLoopData = $css['pages']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
			<link href="<?php echo e($assetUrl.$page); ?>" rel="stylesheet">
		<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	<?php endif; ?>
        <!--/ END PAGE LEVEL STYLES -->

        <!-- START @THEME  STYLES -->
	<?php if(!empty($css['themes'])): ?>
		<?php $__currentLoopData = $css['themes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$theme): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
			<?php if(is_array($theme)): ?>
				<link href="<?php echo e($assetUrl.$key); ?>" rel="stylesheet" id="<?php echo e($theme['id']); ?>">
			<?php else: ?>
				<link href="<?php echo e($assetUrl.$theme); ?>" rel="stylesheet">
			<?php endif; ?>
			
		<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	<?php endif; ?>
        <!--/ END THEME STYLES -->

    </head>
    <!--/ END HEAD -->

   
    <body <?php echo !empty($bodyClass) ? 'class="'.$bodyClass.'"' : null; ?>>

       
        <section id="wrapper">

            <!-- START @HEADER  -->
            	<?php echo $__env->make('layouts.header-home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!--/ END HEADER -->
            <!-- START @PAGE  CONTENT -->
            	<?php echo $__env->yieldContent('content'); ?>
            <!--/ END PAGE CONTENT -->

	    <!-- START @ALL  MODALS --> 	
	    <?php if((Request::is('component','component/modals'))): ?>	
	    	<?php echo $__env->make('component._all-modals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	    <?php endif; ?>
	    <!--/ END ALL MODALS -->
	
        </section><!-- /#wrapper -->
        <!--/ END WRAPPER -->

	

        <!-- START @BACK  TOP -->
        <div id="back-top" class="animated pulse circle">
            <i class="fa fa-angle-up"></i>
        </div><!-- /#back-top -->
        <!--/ END BACK TOP -->

        <!-- START JAVASCRIPT SECTION (Load javascripts at bottom to reduce load time) -->
        <!-- START @CORE  PLUGINS -->
	<?php if(!empty($js['cores'])): ?>
		<?php $__currentLoopData = $js['cores']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $core): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
			<script src="<?php echo e($assetUrl.$core); ?>"></script>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	<?php endif; ?>
        <!--/ END CORE PLUGINS -->

        <!-- START @PAGE  LEVEL PLUGINS -->

        <?php if(!empty($js['additionalScripts'])): ?>
            		<?php $__currentLoopData = $js['additionalScripts']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $script): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            			<script src="<?php echo e($script); ?>"></script>
            		<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            	<?php endif; ?>

        <?php if(!empty($js['plugins'])): ?>
		<?php $__currentLoopData = $js['plugins']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plugin): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
			<script src="<?php echo e($assetUrl.$plugin); ?>"></script>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	<?php endif; ?>
        <!--/ END PAGE LEVEL PLUGINS -->

        <!-- START @PAGE  LEVEL SCRIPTS -->
        <?php if(!empty($js['scripts'])): ?>
		<?php $__currentLoopData = $js['scripts']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $script): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
			<script src="<?php echo e($assetUrl.$script); ?>"></script>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	<?php endif; ?>

        <!--/ END PAGE LEVEL SCRIPTS -->
        <!--/ END JAVASCRIPT SECTION -->


    </body>
    <!--/ END BODY -->

</html>
