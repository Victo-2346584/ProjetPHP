<?php

namespace Materialis\Customizer\Controls;

class RowsListControl extends \Materialis\Customizer\BaseControl {


	public function init() {
		$this->cpData['insertText'] = isset( $this->cpData['insertText'] ) ? $this->cpData['insertText'] : 'Click to insert';
		$this->cpData['insertText'] = __( $this->cpData['insertText'], 'cloudpress-companion' );
		$this->cpData['type']       = isset( $this->cpData['type'] ) ? $this->cpData['type'] : 'mod_changer';
	}

	public function enqueue() {
		 $jsUrl = $this->companion()->assetsRootURL() . '/js/customizer';
		wp_enqueue_script( 'companion-row-list-control', $jsUrl . '/row-list-control.js' );
	}

	public function getSettingAttr( $setting_key = 'default' ) {
		if ( ! isset( $this->settings[ $setting_key ] ) ) {
			return '';
		}

		echo 'data-setting-link="' . esc_attr( $this->settings[ $setting_key ]->id ) . '"';
	}

	public function dataAttrs() {
		$data = 'data-name="' . $this->id . '"';

		echo $data;
	}

	public function dateSelection() {
		$data = 'data-selection="radio"';

		if ( isset( $this->cpData['selection'] ) ) {
			$data = 'data-selection="' . esc_attr( $this->cpData['selection'] ) . '"';
		}

		echo $data;
	}


	public function render_content() {      ?>
		<div <?php $this->dateSelection(); ?> data-type="row-list-control" data-apply="<?php echo esc_attr( $this->cpData['type'] ); ?>" class="list-holder">
			<?php ( $this->cpData['type'] === 'mod_changer' ) ? $this->renderModChanger() : $this->renderPresetsChanger(); ?>
		</div>
		<?php
	}

	public function renderModChanger() {
		$items   = $this->getSourceData();
		$version = $this->companion()->version;
		?>

		<ul <?php $this->dataAttrs(); ?> class="list rows-list">
			<?php foreach ( $items as $item ) : ?>

				<?php $used = ( $item['id'] === $this->value() ) ? 'already-in-page' : ''; ?>

				<li class="item available-item <?php echo esc_attr( $used ); ?>" data-id="<?php echo esc_attr( $item['id'] ); ?>">
					<div class="image-holder" style="background-position:center center;">
						<img data-src="<?php echo esc_attr( $item['thumb'] ); ?>?v=<?php echo esc_attr( $version ); ?>" src=""/>
					</div>

					<span data-id="<?php echo esc_attr( $item['id'] ); ?>" class="available-item-hover-button" <?php $this->getSettingAttr(); ?> ><?php echo esc_html( $this->cpData['insertText'] ); ?></span>
					<div title="Section is already in page" class="checked-icon"></div>
					<div title="Pro Only" class="pro-icon"></div>
					<span class="item-preview" data-preview="<?php echo esc_attr( $item['preview'] ); ?>">
						<i class="icon"></i>
					</span>

					<?php if ( isset( $item['description'] ) ) : ?>
						<span class="description"> <?php echo esc_attr( $item['description'] ); ?> </span>
					<?php endif; ?>
				</li>
			<?php endforeach; ?>
		</ul>
		<input type="hidden" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> />

		<?php
	}


	public function renderPresetsChanger() {
		$items       = $this->getSourceData();
		$options_var = uniqid( 'cp_preset_changer_' );
		?>
		<script>
			var <?php echo $options_var; ?> ={};
		</script>
		<ul <?php $this->dataAttrs(); ?> class="list rows-list">
			<?php foreach ( $items as $item ) : ?>
				<script>
					<?php $settingsData = \Materialis\Customizer\BaseSetting::filterArrayDefaults( $item['settings'] ); ?>
					<?php echo $options_var; ?>[<?php echo wp_json_encode( $item['id'] ); ?>] = <?php echo json_encode( $settingsData ); ?>;
				</script>

				<li class="item available-item" data-varname="<?php echo esc_attr( $options_var ); ?>" data-id="<?php echo esc_attr( $item['id'] ); ?>">
					<div class="image-holder"
						 style="background-position:center center;">
						<img src="<?php echo esc_attr( $item['thumb'] ); ?>"/>
					</div>

					<span data-id="<?php echo esc_attr( $item['id'] ); ?>" class="available-item-hover-button" <?php $this->getSettingAttr(); ?> ><?php echo esc_html( $this->cpData['insertText'] ); ?></span>
					<div title="Section is already in page" class="checked-icon"></div>
					<span class="item-preview" data-preview="<?php echo esc_attr( $item['preview'] ); ?>">
							<i class="icon"></i>
						</span>
					<?php if ( isset( $item['description'] ) ) : ?>
						<span class="description"> <?php echo esc_html( $item['description'] ); ?> </span>
					<?php endif; ?>
				</li>
			<?php endforeach; ?>
		</ul>
		<input type="hidden" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> />

		<?php
	}
}
