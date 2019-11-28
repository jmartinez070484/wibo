<?php 

$footer = $site -> footer_text();
$email = $site -> email_address();

?>
<div class="footer">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-12">
				<div class="footer-content">
					<?php if($footer -> value()){ ?><h3><?php echo $footer; ?></h3><?php } ?>
					<?php if($email -> value()){ ?><p><a href="mail:<?php echo $email; ?>"><i class="fa fa-envelope"></i> <?php echo $email; ?></a></p><?php } ?>
					<ul>
						<?php 

						$facebook = $site -> link_facebook();
						$linkedin = $site -> link_linkedin();
						$twitter = $site -> link_twitter();
						$instagram = $site -> link_instagram();

						if($facebook -> value()){ ?><li><a href="<?php echo $facebook; ?>" target="_BLANK"><i class="fab fa-facebook-f"></i></a></li><?php } ?>
						<?php if($linkedin -> value()){ ?><li><a href="<?php echo $linkedin; ?>" target="_BLANK"><i class="fab fa-linkedin-in"></i></a></li><?php } ?>
						<?php if($twitter -> value()){ ?><li><a href="<?php echo $twitter; ?>" target="_BLANK"><i class="fab fa-twitter"></i></a></li><?php } ?>
						<?php if($instagram -> value()){ ?><li><a href="<?php echo $instagram; ?>" target="_BLANK"><i class="fab fa-instagram"></i></a></li><?php } ?>
					</ul>
					<small><i class="fa fa-angle-right"></i> wibo.ca</small>
				</div>
			</div>
		</div>	
	</div>	
</div>

</main>

<footer>

<div class="container">
	<div class="row">
		<div class="col-12">
			<span>© wibo</span>
			<ul>
				<?php 

				$phone = $site -> phone();
				$map = $site -> map_link();

				if($email -> value()){ ?><li><a href="mail:<?php echo $email ?>"><i class="fa fa-envelope"></i></a></li><?php } ?>
				<?php if($phone -> value()){ ?><li><a href="tel:<?php echo $phone ?>"><i class="fa fa-phone"></i></a></li><?php } ?>
				<?php if($map -> value()){ ?><li><a href="<?php echo $map ?>" target="_BLANK"><i class="fas fa-map-marker-alt"></i></a></li><?php } ?>
			</ul>
		</div>
	</div>
</div>	

</footer>

<!-- scripts -->
<?php 

$scripts = '/js/scripts.js';
$scriptsFile = $site->root().'/..'.$scripts;

if(file_exists($scriptsFile)){ ?>
<script src="<?php echo $scripts; ?>?v=<?php echo filemtime($scriptsFile); ?>"></script>
<?php } ?>

</body>
</html>