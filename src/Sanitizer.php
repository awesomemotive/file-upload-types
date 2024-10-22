<?php

namespace FileUploadTypes;

use DOMDocument;
use DOMXPath;

/**
 * Sanitize SVG and HTML files from JS and PHP tags.
 *
 * @since 1.5.0
 */
class Sanitizer {

	/**
	 * Hooks.
	 *
	 * @since 1.5.0
	 */
	public function hooks() {

		add_action( 'wpforms_pro_forms_fields_file_upload_chunk_finalize_saved', [ $this, 'sanitize' ], 10, 2 );
		add_action( 'wpforms_ajax_submit_before_processing', [ $this, 'before_wpforms_processing' ] );
		add_filter( 'wp_handle_sideload_prefilter', [ $this, 'handle_upload' ] );
		add_filter( 'wp_handle_upload_prefilter', [ $this, 'handle_upload' ] );
	}

	/**
	 * Sanitize files uploaded via WPForms Pro.
	 *
	 * @since 1.5.0
	 */
	public function before_wpforms_processing() {

		// phpcs:disable WordPress.Security.NonceVerification.Missing
		if ( empty( $_FILES ) ) {
			return;
		}

		foreach ( $_FILES as $file ) {
			if ( $file['error'] !== UPLOAD_ERR_OK ) {
				continue;
			}

			$this->handle_upload( $file );
		}
		// phpcs:enable WordPress.Security.NonceVerification.Missing
	}

	/**
	 * Sanitize SVG/HTML files from malicious tags (PHP and JavaScript).
	 *
	 * @since 1.5.0
	 *
	 * @param array|mixed $file File data.
	 *
	 * @return array
	 */
	public function handle_upload( $file ): array {

		$file = (array) $file;

		if ( ! isset( $file['tmp_name'] ) ) {
			return $file;
		}

		if ( ! $this->sanitize( (string) $file['tmp_name'], (string) ( $file['name'] ?? '' ) ) ) {
			$file['error'] = esc_html__( 'The SVG file could not be sanitized.', 'file-upload-types' );
		}

		return $file;
	}

	/**
	 * Sanitize data.
	 *
	 * @since 1.5.0
	 *
	 * @param string $file      File path.
	 * @param string $file_name File name.
	 *
	 * @return bool
	 */
	public function sanitize( string $file, string $file_name ): bool {

		if ( $file_name ) {
			$wp_filetype = wp_check_filetype_and_ext( $file, $file_name );

			if ( ! $this->is_risky( $wp_filetype ) ) {
				return true;
			}
		}

		$type = $wp_filetype['ext'] === 'svg' ? 'svg' : 'html';

		$content = file_get_contents( $file ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents

		$content = $this->sanitize_content( $content, $type );

		if ( ! $content ) {
			return false;
		}

		// phpcs:ignore WordPress.WP.AlternativeFunctions.file_system_operations_file_put_contents
		file_put_contents( $file, $content );

		return true;
	}

	/**
	 * Sanitize content.
	 *
	 * @since 1.5.0
	 *
	 * @param string $content File content.
	 * @param string $type    File type, 'svg' or 'html'.
	 *
	 * @return string|false
	 * @noinspection CallableParameterUseCaseInTypeContextInspection
	 */
	private function sanitize_content( string $content, string $type ) {

		$is_zipped = $this->is_gzipped( $content );

		// Maybe unzip.
		if ( $is_zipped ) {
			// phpcs:ignore WordPress.PHP.NoSilencedErrors.Discouraged
			$content = @gzdecode( $content );

			if ( $content === false ) {
				return false;
			}
		}

		$content = $this->remove_js_tags( $content );

		if ( $type === 'svg' ) {
			$allowed_tags = $this->get_allowed_tags_for_svg();

			$type_declaration = '';

			if ( strpos( $content, '<?xml' ) !== false ) {
				$type_declaration = substr( $content, 0, strpos( $content, '?>' ) + 2 );
			}

			$content = wp_kses( $content, $allowed_tags );
			$content = $type_declaration . $content;
		} else {
			$allowed_tags = $this->get_allowed_tags_for_html();

			$type_declaration = '';

			if ( strpos( $content, '<!DOCTYPE' ) !== false ) {
				$type_declaration = substr( $content, 0, strpos( $content, '>' ) + 1 );
			}

			$content = wp_kses( $content, $allowed_tags );
			$content = $type_declaration . $content;
		}

		if ( ! $content ) { // Error while removing tags.
			return false;
		}

		// Maybe gzip.
		if ( $is_zipped ) {
			// phpcs:ignore WordPress.PHP.NoSilencedErrors.Discouraged
			$content = @gzencode( $content );
		}

		return $content;
	}

	/**
	 * Check if the file is a risky file type.
	 *
	 * @since 1.5.0
	 *
	 * @param array $file File data.
	 */
	private function is_risky( array $file ): bool {

		/**
		 * Filter to allow adding risky file extensions.
		 *
		 * @since 1.5.0
		 *
		 * @param array $risky_extensions Risky file extensions.
		 * @param array $file             File data.
		 */
		$risky_extensions = apply_filters(
			'file_upload_types_sanitizer_is_risky_extensions',
			[ 'svg', 'html', 'htm', 'xhtml', 'phtml' ],
			$file
		);

		return in_array(
			$file['ext'] ?? '',
			$risky_extensions,
			true
		);
	}

	/**
	 * Check if the file is gzipped.
	 *
	 * @since 1.5.0
	 *
	 * @param string $file File data.
	 *
	 * @return bool
	 */
	private function is_gzipped( string $file ): bool {

		return 0 === strpos( $file, "\x1f\x8b" );
	}

	/**
	 * Get allowed tags for SVG.
	 *
	 * @since 1.5.0
	 *
	 * @return array
	 */
	private function get_allowed_tags_for_svg(): array {

		// phpcs:disable WordPress.Arrays.ArrayDeclarationSpacing.ArrayItemNoNewLine
		$elements = [
			'a', 'animate', 'animateMotion', 'animateTransform', 'circle', 'clipPath', 'defs', 'desc', 'ellipse',
			'feBlend', 'feColorMatrix', 'feComponentTransfer', 'feComposite', 'feConvolveMatrix',
			'feDiffuseLighting', 'feDisplacementMap', 'feDistantLight', 'feDropShadow', 'feFlood', 'feFuncA',
			'feFuncB', 'feFuncG', 'feFuncR', 'feGaussianBlur', 'feImage', 'feMerge', 'feMergeNode',
			'feMorphology', 'feOffset', 'fePointLight', 'feSpecularLighting', 'feSpotLight', 'feTile',
			'feTurbulence', 'filter', 'foreignObject', 'g', 'image', 'line', 'linearGradient', 'marker',
			'mask', 'metadata', 'mpath', 'path', 'pattern', 'polygon', 'polyline', 'radialGradient', 'rect',
			'set', 'stop', 'style', 'svg', 'switch', 'symbol', 'text', 'textPath', 'title', 'tspan',
			'use', 'view',
		];

		$attributes = [
			'accent-height', 'accumulate', 'additive', 'alignment-baseline', 'alphabetic', 'amplitude',
			'arabic-form', 'ascent', 'attributeName', 'attributeType', 'azimuth', 'baseFrequency',
			'baseline-shift', 'baseProfile', 'bbox', 'begin', 'bias', 'by', 'calcMode', 'cap-height',
			'class', 'clip', 'clipPathUnits', 'clip-path', 'clip-rule', 'color', 'color-interpolation',
			'color-interpolation-filters', 'color-rendering', 'crossorigin', 'cursor', 'cx', 'cy', 'd',
			'decelerate', 'descent', 'diffuseConstant', 'direction', 'display', 'divisor',
			'dominant-baseline', 'dur', 'dx', 'dy', 'edgeMode', 'elevation', 'end', 'exponent', 'fill',
			'fill-opacity', 'fill-rule', 'filter', 'filterUnits', 'flood-color', 'flood-opacity',
			'font-family', 'font-size', 'font-size-adjust', 'font-stretch', 'font-style', 'font-variant',
			'font-weight', 'format', 'from', 'fr', 'fx', 'fy', 'g1', 'g2', 'glyph-name',
			'glyph-orientation-horizontal', 'glyph-orientation-vertical', 'glyphRef', 'gradientTransform',
			'gradientUnits', 'hanging', 'height', 'href', 'hreflang', 'horiz-adv-x', 'horiz-origin-x',
			'horiz-origin-y', 'id', 'ideographic', 'image-rendering', 'in', 'in2', 'intercept', 'k', 'k1',
			'k2', 'k3', 'k4', 'kernelMatrix', 'kernelUnitLength', 'keyPoints', 'keySplines', 'keyTimes',
			'lang', 'lengthAdjust', 'letter-spacing', 'lighting-color', 'limitingConeAngle', 'local',
			'marker-end', 'marker-mid', 'marker-start', 'markerHeight', 'markerUnits', 'markerWidth',
			'mask', 'maskContentUnits', 'maskUnits', 'mathematical', 'max', 'media', 'method', 'min',
			'mode', 'name', 'numOctaves', 'offset', 'opacity', 'operator', 'order', 'orient', 'orientation',
			'origin', 'overflow', 'overline-position', 'overline-thickness', 'panose-1', 'paint-order',
			'path', 'pathLength', 'patternContentUnits', 'patternTransform', 'patternUnits', 'ping',
			'pointer-events', 'points', 'pointsAtX', 'pointsAtY', 'pointsAtZ', 'preserveAlpha',
			'preserveAspectRatio', 'primitiveUnits', 'r', 'radius', 'referrerPolicy', 'refX', 'refY',
			'rel', 'rendering-intent', 'repeatCount', 'repeatDur', 'requiredExtensions', 'requiredFeatures',
			'restart', 'result', 'rotate', 'rx', 'ry', 'scale', 'seed', 'shape-rendering', 'side',
			'slope', 'spacing', 'specularConstant', 'specularExponent', 'speed', 'spreadMethod',
			'startOffset', 'stdDeviation', 'stemh', 'stemv', 'stitchTiles', 'stop-color', 'stop-opacity',
			'strikethrough-position', 'strikethrough-thickness', 'string', 'stroke', 'stroke-dasharray',
			'stroke-dashoffset', 'stroke-linecap', 'stroke-linejoin', 'stroke-miterlimit', 'stroke-opacity',
			'stroke-width', 'style', 'surfaceScale', 'systemLanguage', 'tabindex', 'tableValues', 'target',
			'targetX', 'targetY', 'text-anchor', 'text-decoration', 'text-rendering', 'textLength', 'to',
			'transform', 'transform-origin', 'type', 'u1', 'u2', 'underline-position', 'underline-thickness',
			'unicode', 'unicode-bidi', 'unicode-range', 'units-per-em', 'v-alphabetic', 'v-hanging',
			'v-ideographic', 'v-mathematical', 'values', 'vector-effect', 'version', 'vert-adv-y',
			'vert-origin-x', 'vert-origin-y', 'viewBox', 'visibility', 'width', 'widths', 'word-spacing',
			'writing-mode', 'x', 'x-height', 'x1', 'x2', 'xChannelSelector', 'xml:lang', 'xml:space', 'xmlns',
			'y', 'y1', 'y2', 'yChannelSelector', 'z', 'zoomAndPan', 'id', 'class',
		];
		// phpcs:enable WordPress.Arrays.ArrayDeclarationSpacing.ArrayItemNoNewLine
		$attributes = array_map( 'strtolower', $attributes );

		$allowed_elements = [];

		foreach ( $elements as $element ) {
			$allowed_elements[ $element ] = array_fill_keys( $attributes, [] );
		}

		return $allowed_elements;
	}

	/**
	 * Remove JS tags.
	 *
	 * @since 1.5.0
	 *
	 * @param string $content File content.
	 *
	 * @return string
	 */
	private function remove_js_tags( string $content ): string {

		return (string) preg_replace( '/<script[^>]*>.*?<\/script>/sm', '', $content );
	}

	/**
	 * Get allowed tags for HTML.
	 *
	 * @since 1.5.0
	 *
	 * @return array
	 */
	private function get_allowed_tags_for_html(): array {

		// phpcs:disable WordPress.Arrays.ArrayDeclarationSpacing.ArrayItemNoNewLine, NormalizedArrays.Arrays.CommaAfterLast.MissingMultiLine, WordPress.Arrays.MultipleStatementAlignment.DoubleArrowNotAligned
		$allowed = [
			'a' => [
				'href', 'target', 'rel', 'download', 'hreflang', 'type', 'referrerpolicy'
			],
			'abbr' => [
				'title'
			],
			'address' => [],
			'area' => [
				'alt', 'coords', 'shape', 'href', 'target', 'download', 'ping', 'rel', 'referrerpolicy'
			],
			'article' => [],
			'aside' => [],
			'audio' => [
				'src', 'crossorigin', 'preload', 'autoplay', 'loop', 'muted', 'controls'
			],
			'b' => [],
			'base' => [
				'href', 'target'
			],
			'bdi' => [
				'dir'
			],
			'bdo' => [
				'dir'
			],
			'blockquote' => [
				'cite'
			],
			'body' => [],
			'br' => [],
			'button' => [
				'autofocus', 'disabled', 'form', 'formaction', 'formenctype', 'formmethod', 'formnovalidate', 'formtarget', 'name', 'type', 'value'
			],
			'canvas' => [
				'width', 'height'
			],
			'caption' => [],
			'cite' => [],
			'code' => [],
			'col' => [
				'span'
			],
			'colgroup' => [
				'span'
			],
			'data' => [
				'value'
			],
			'datalist' => [],
			'dd' => [],
			'del' => [
				'cite', 'datetime'
			],
			'details' => [
				'open'
			],
			'dfn' => [],
			'dialog' => [
				'open'
			],
			'div' => [],
			'dl' => [],
			'dt' => [],
			'em' => [],
			'embed' => [
				'src', 'type', 'width', 'height'
			],
			'fieldset' => [
				'disabled', 'form', 'name'
			],
			'figcaption' => [],
			'figure' => [],
			'footer' => [],
			'form' => [
				'accept-charset', 'action', 'autocomplete', 'enctype', 'method', 'name', 'novalidate', 'target'
			],
			'h1' => [],
			'h2' => [],
			'h3' => [],
			'h4' => [],
			'h5' => [],
			'h6' => [],
			'head' => [],
			'header' => [],
			'hr' => [],
			'html' => [
				'lang', 'dir'
			],
			'i' => [],
			'iframe' => [
				'src', 'srcdoc', 'name', 'sandbox', 'allow', 'allowfullscreen', 'width', 'height', 'referrerpolicy', 'loading'
			],
			'img' => [
				'alt', 'src', 'srcset', 'sizes', 'crossorigin', 'usemap', 'ismap', 'width', 'height', 'referrerpolicy', 'decoding', 'loading'
			],
			'input' => [
				'accept', 'alt', 'autocomplete', 'autofocus', 'checked', 'dirname', 'disabled', 'form', 'formaction', 'formenctype', 'formmethod', 'formnovalidate', 'formtarget', 'height', 'list', 'max', 'maxlength', 'min', 'minlength', 'multiple', 'name', 'pattern', 'placeholder', 'readonly', 'required', 'size', 'src', 'step', 'type', 'value', 'width'
			],
			'ins' => [
				'cite', 'datetime'
			],
			'kbd' => [],
			'label' => [
				'for'
			],
			'legend' => [],
			'li' => [
				'value'
			],
			'link' => [
				'href', 'crossorigin', 'rel', 'as', 'media', 'hreflang', 'type', 'sizes', 'referrerpolicy', 'integrity'
			],
			'main' => [],
			'map' => [
				'name'
			],
			'mark' => [],
			'meta' => [
				'name', 'http-equiv', 'content', 'charset'
			],
			'meter' => [
				'value', 'min', 'max', 'low', 'high', 'optimum'
			],
			'nav' => [],
			'noframes' => [],
			'noscript' => [],
			'object' => [
				'data', 'type', 'typemustmatch', 'name', 'usemap', 'form', 'width', 'height'
			],
			'ol' => [
				'reversed', 'start', 'type'
			],
			'optgroup' => [
				'disabled', 'label'
			],
			'option' => [
				'disabled', 'label', 'selected', 'value'
			],
			'output' => [
				'for', 'form', 'name'
			],
			'p' => [],
			'param' => [
				'name', 'value'
			],
			'picture' => [],
			'pre' => [],
			'progress' => [
				'value', 'max'
			],
			'q' => [
				'cite'
			],
			'rp' => [],
			'rt' => [],
			'rtc' => [],
			'ruby' => [],
			's' => [],
			'samp' => [],
			'section' => [],
			'select' => [
				'autocomplete', 'autofocus', 'disabled', 'form', 'multiple', 'name', 'required', 'size'
			],
			'small' => [],
			'source' => [
				'src', 'type', 'srcset', 'sizes', 'media'
			],
			'span' => [],
			'strong' => [],
			'style' => [
				'media', 'nonce', 'type'
			],
			'sub' => [],
			'summary' => [],
			'sup' => [],
			'table' => [],
			'tbody' => [],
			'td' => [
				'colspan', 'rowspan', 'headers'
			],
			'template' => [],
			'textarea' => [
				'cols', 'rows', 'autocomplete', 'autofocus', 'dirname', 'disabled', 'form', 'maxlength', 'minlength', 'name', 'placeholder', 'readonly', 'required', 'wrap'
			],
			'tfoot' => [],
			'th' => [
				'colspan', 'rowspan', 'headers', 'scope', 'abbr'
			],
			'thead' => [],
			'time' => [
				'datetime'
			],
			'title' => [],
			'tr' => [],
			'track' => [
				'default', 'kind', 'label', 'src', 'srclang'
			],
			'u' => [],
			'ul' => [],
			'var' => [],
			'video' => [
				'src', 'crossorigin', 'poster', 'preload', 'autoplay', 'playsinline', 'loop', 'muted', 'controls', 'width', 'height'
			],
			'wbr' => []
		];
		// phpcs:enable WordPress.Arrays.ArrayDeclarationSpacing.ArrayItemNoNewLine, NormalizedArrays.Arrays.CommaAfterLast.MissingMultiLine, WordPress.Arrays.MultipleStatementAlignment.DoubleArrowNotAligned

		foreach ( $allowed as $element => $attributes ) {
			$attributes          = array_merge( $attributes, [ 'id', 'class' ] );
			$allowed[ $element ] = array_fill_keys( $attributes, [] );
		}

		return $allowed;
	}
}
