<?php

namespace Materialis\Customizer\Controls;

class CssClassBoxesControl extends ColorBoxesControl {

	public function init() {
		$this->type                 = 'radio';
		$this->cpData['bigPreview'] = isset( $this->cpData['bigPreview'] ) && $this->cpData['bigPreview'];
	}


	public function render() {
		$id    = 'customize-control-' . str_replace( array( '[', ']' ), array( '-', '' ), $this->id );
		$class = 'customize-control customize-control-' . $this->type; ?>

		<li id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class ); ?> cp-color-boxes">
			<?php $this->render_content(); ?>
		</li>
		<?php

	}


	public function render_content() {
		if ( empty( $this->choices ) ) {
			return;
		}

		$name = '_customize-radio-' . $this->id;

		if ( ! empty( $this->label ) ) :
			?>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php
		endif;
		if ( ! empty( $this->description ) ) :
			?>
			<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
			<?php
		endif;

		foreach ( $this->choices as $value ) :
			?>
			<label title="<?php echo esc_attr( $value ); ?>">
				<div class="css-class-container <?php echo esc_attr( $value ); ?>">
				<input type="radio" class="<?php echo ( $this->cpData['bigPreview'] ? 'big' : '' ); ?>" value="<?php echo esc_attr( $value ); ?>"
					name="<?php echo esc_attr( $name ); ?>" 
								 <?php
									$this->link();
									checked( $this->value(), $value );
									?>
		 />
				 <span class="check-icon"></span>
				</div>
			</label>
				<?php
		endforeach;
	}
}
