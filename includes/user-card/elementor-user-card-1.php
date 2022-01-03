<!-- Start User Card 1 -->
<div class="elementor-card">
	<div class="elementor-card-inner">
		<div class="front">
			<div class="front__bkg-photo" style="background-image:url(<?php echo $settings['user_background_image']['url']; ?>)"></div>
			<div class="front__face-photo <?php echo $settings['shape']; ?>" style="background-image:url(<?php echo $settings['user_image']['url']; ?>)"></div>
			<div class="front__text">
				<h3 class="front__text-header"><?php echo $settings['name']; ?></h3>
				<?php if($settings['display_description'] == "yes") { ?>
					<p class="front__text-para"><?php echo $settings['description']; ?></p>
				<?php } ?>
				<?php if($settings['email'] != "") { ?>
					<p class="front__text-para"><i class="fas fa-envelope front-icons"></i><?php echo $settings['email']; ?></p>
				<?php } ?>
				<?php if($settings['phone'] != "") { ?>
					<p class="front__text-para"><i class="fas fa-mobile front-icons"></i><?php echo $settings['phone']; ?></p>
				<?php } ?>
				<?php if($settings['address'] != "") { ?>
					<p class="front__text-para"><i class="fas fa-map-marker-alt front-icons"></i><?php echo $settings['address']; ?></p>
				<?php } ?>
				<span class="front__text-hover">Hover For Details</span>
			</div>
		</div>
		<div class="back">
			<div class="social-media-wrapper">
				<?php
				foreach ($settings['social_icon_lists'] as $index => $item) {
					$social = str_replace('fab fa-', '', $item['social']);

					$link_key = 'link_' . $index;

					$this->add_render_attribute($link_key, 'href', $item['link']['url']);

					if ($item['link']['is_external']) {
						$this->add_render_attribute($link_key, 'target', '_blank');
					}

					if ($item['link']['nofollow']) {
						$this->add_render_attribute($link_key, 'rel', 'nofollow');
					}
					?>
					<a href="<?php echo $item['link']['url']; ?>" target="_blank" class="social-icon">
						<i class="<?php echo $item['social']; ?>" aria-hidden="true"></i>
					</a>
				<?php } ?>
				<!-- <a href="https://codepen.io/alexpg96" target="_blank" class="social-icon"><i class="fab fa-codepen" aria-hidden="true"></i></a>
				<a href="https://github.com/AlexPG96" target="_blank" class="social-icon"><i class="fab fa-github" aria-hidden="true"></i></a>
				<a href="https://apgonzalez.com" target="_blank" class="social-icon"><i class="fas fa-globe" aria-hidden="true"></i></a>
				<a href="https://apgonzalez.com" class="social-icon"><i class="fab fa-instagram" aria-hidden="true"></i></a> -->
			</div>
		</div>
	</div>
</div>
<!-- End User Card -->

<?php /* ?>
<!-- Start Profile Card 1 -->
<div class="profile-card-style-1" style="background-image:url(<?php echo $settings['profile_background_image']['url']; ?>);">
	<div class=" column column-block">
		<div class="team-member">
			<div class="team-member-profile">
				<img src="<?php echo $settings['profile_image']['url']; ?>" class="img img-responsive" sizes="(max-width: 700px) 100vw, 700px" width="700" height="700">
			</div>
			<div class="team-member-info elementor-content-background-color-wrapper">
				<!-- Description -->
				<p class="profile-description elementor-profile-description-wrapper"><?php echo $settings['profile_description']; ?></p>
				<h4 class="profile-name elementor-profile-name-wrapper"><?php echo $settings['name']; ?></h4>
				<p class="profile-position elementor-profile-position-wrapper"><?php echo $settings['position']; ?></p>
			</div>
			<div class="elementor-social-icons-wrapper team-member__socialmedia">
				<?php
				foreach ($settings['social_icon_list'] as $index => $item) {
					$social = str_replace('fab fa-', '', $item['social']);

					$link_key = 'link_' . $index;

					$this->add_render_attribute($link_key, 'href', $item['link']['url']);

					if ($item['link']['is_external']) {
						$this->add_render_attribute($link_key, 'target', '_blank');
					}

					if ($item['link']['nofollow']) {
						$this->add_render_attribute($link_key, 'rel', 'nofollow');
					}
					?>
					<a class="elementor-icon elementor-social-icon elementor-social-icon-<?php echo $social . $class_animation; ?>" <?php echo $this->get_render_attribute_string($link_key); ?>>
						<span class="elementor-screen-only"><?php echo ucwords($social); ?></span>
						<i class="<?php echo $item['social']; ?>"></i>
					</a>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<!-- End Profile Card -->
<?php */ ?>