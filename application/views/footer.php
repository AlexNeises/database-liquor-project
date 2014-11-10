
		<div class="render">
			<div class="row max_width">
				<div class="small-4 footer columns">
					<?php $this->benchmark->mark('code_end'); ?>
					Version 1.08 - Page rendered in <?php echo $this->benchmark->elapsed_time('code_start', 'code_end'); ?> seconds.
				</div>
			</div>
		</div>
		<script src="<?php print site_url('static/core.js?'.time()); ?>"></script>
		<script src="<?php print site_url('static/foundation/bower_components/modernizr/modernizr.js?'.time()); ?>"></script>
		<script src="<?php print site_url('static/foundation/bower_components/foundation/js/foundation.min.js?'.time()); ?>"></script>
		<script>
			$(document).foundation();
		</script>
	</body>
</html>