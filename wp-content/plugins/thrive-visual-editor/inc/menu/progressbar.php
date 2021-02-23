<?php
/**
 * Thrive Themes - https://thrivethemes.com
 *
 * @package thrive-visual-editor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Silence is golden
} ?>

<div id="tve-progressbar-component" class="tve-component" data-view="ProgressBar">
	<div class="action-group">
		<div class="dropdown-header" data-prop="docked">
			<div class="group-description">
				<?php echo __( 'Main Options', 'thrive-cb' ); ?>
			</div>
			<i></i>
		</div>
		<div class="dropdown-content">
			<div class="tve-control simple nodes" data-view="Type"></div>
			<div class="tve-control simple nodes" data-view="ProgressPalette"></div>
			<hr>
			<div class="tve-control simple nodes" data-view="HasLabels"></div>
			<div class="tve-progress-labels">
				<div class="tve-control simple nodes" data-view="LabelPosition"></div>
				<div class="tve-control nodes mb-5" data-view="DisplayLabels"></div>
			</div>
			<hr>
			<div class="tve-control simple nodes" data-view="BarHeight"></div>
			<div class="tve-progress-complete mb-5"></div>

			<div class="tve-control-grid control-grid nodes">
				<div class="label"><?php echo __( 'Nodes', 'thrive-cb' ); ?></div>
				<div class="full">
					<a class="tcb-right click tve-lg-add-field" data-fn="addNode">
						<i class="mr-5">
							<?php tcb_icon( 'plus-regular' ); ?>
						</i>
						<?php echo __( 'Add', 'thrive-cb' ); ?>
					</a>
				</div>
			</div>
			<div class="tve-control nodes" data-key="NodesControl" data-initializer="getNodesControl"></div>
			<div class="tve-advanced-controls extend-grey">
				<div class="dropdown-header" data-prop="advanced">
					<span>
						<?php echo __( 'Advanced', 'thrive-cb' ); ?>
					</span>
				</div>
				<div class="dropdown-content pt-0">
					<div class="tve-control simple" data-view="WithAnimation"></div>
					<div class="tve-progress-animation">
						<div class="tve-control simple" data-view="AnimSpeed"></div>
						<div class="tve-control simple" data-view="AnimStart"></div>
					</div>
					<div class="tve-control simple nodes" data-view="WithDualProgress"></div>
					<div class="tve-progress-dual">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

