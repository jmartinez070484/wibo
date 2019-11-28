<?php snippet('header') ?>

<div class="banner">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-12">
				<div class="banner-content">
					<?php echo $page -> hero_content() -> kirbytext() ?>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="link1" class="grid">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="grid-content">
					<?php echo $page -> features_content() -> kirbytext() ?>
				</div>
			</div>
			<?php 

            $features = $pages -> template('feature'); 
            $totalFeatures = count($features);
           
           	switch($totalFeatures) {
           		case 1:
           			$featuresClass = 'col-lg-12 col-md-12 col-12';
           			break;
           		case 2:
           			$featuresClass = 'col-lg-6 col-md-6 col-12';
           			break;
           		default:
           			$featuresClass = 'col-lg-4 col-md-4 col-12';
           			break;
           	}

           	foreach($features as $key => $value){ ?>
			<div class="<?php echo $featuresClass ?>">
				<div class="grid-icon">
					<span></span>
					<h3><?php echo $value -> title(); ?></h3>
					<?php echo $value -> description() -> kirbytext(); ?>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>

<div id="link2" class="callouts">
	<div class="container">
		<div class="row align-items-center">
			<?php 

            $callouts = $pages -> template('callout'); 
            $totalCallouts = count($callouts);
           
           	switch($totalCallouts) {
           		case 1:
           			$calloutsClass = 'col-lg-12 col-md-12 col-12';
           			break;
           		case 2:
           			$calloutsClass = 'col-lg-6 col-md-6 col-12';
           			break;
           		default:
           			$calloutsClass = 'col-lg-4 col-md-4 col-12';
           			break;
           	}

           	foreach($callouts as $key => $value){ ?>
			<div class="<?php echo $calloutsClass ?>">
				<div class="callout-content">
					<h3><?php echo $value -> title(); ?></h3>
					<?php echo $value -> description() -> kirbytext(); ?>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>

<div id="link3" class="projects">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="projects-content">
					<?php echo $page -> projects_content() -> kirbytext() ?>
				</div>
			</div>
			<div class="col-12">
                <div class="project-container">
                    <div class="project-items">
                    	<?php 

                        $projects = $pages -> template('project'); 

                        foreach($projects as $project){ 
                        	$projectImage = $project -> content() -> image() -> toFile();

                        	if($projectImage){
                        ?>
                        <div class="project">
                        	<h3><?php echo $project -> title() ?></h3>
							<?php echo $project -> description() -> kirbytext(); ?>
							<?php echo $projectImage; ?>
                        </div>
                        <?php }

                    	}

                        ?>
                    </div>
                    <div class="projects-btns">
                        <a href="#"><i class="fa fa-angle-left"></i></a>
                        <a href="#"><i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
		</div>
	</div>
</div>

<?php 

$image = $page -> text_split_image();
$class = $image -> value() ? 'col-lg-6 col-md-6 col-12' : 'col-12';

?>
<div id="link4" class="subfooter">
	<div class="container">
		<div class="row align-items-center">
			<div class="<?php echo $class; ?>">
				<div class="subfooter-content">
					<?php echo $page -> text_content() -> kirbytext() ?>
				</div>
			</div>
			<?php if($image -> value()){ ?>
			<div class="<?php echo $class; ?>">
				<?php echo $image -> toFile(); ?>
			</div>
			<?php } ?>
		</div>	
	</div>	
</div>

<?php snippet('footer') ?>