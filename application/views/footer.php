
		<div class="render">
			<div class="row max_width">
				<div class="small-4 footer columns">
					Version <?php echo config_item('version_num'); ?> - Migration <?php echo config_item('mig_num'); ?> | Page rendered in {elapsed_time} seconds.
				</div>
				<div class="small-8 right footer columns">
					 &#9400; 2014 Alex Neises, David Tomlin, Jeff Hipp.
				</div>
			</div>
		</div>
		<script src="<?php print site_url('static/plugins/jquery-dynatable/jquery.dynatable.js?'.time()); ?>"></script>
		<script src="<?php print site_url('static/core.js?'.time()); ?>"></script>
		<script src="<?php print site_url('static/foundation/bower_components/modernizr/modernizr.js?'.time()); ?>"></script>
		<script src="<?php print site_url('static/foundation/bower_components/foundation/js/foundation.min.js?'.time()); ?>"></script>
		<script>
			$(document).foundation();
		</script>
	</body>
</html>