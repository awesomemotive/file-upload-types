<?php

namespace FileUploadTypes;

/**
 * SVG sanitizer data.
 *
 * @since 1.5.0
 */
class SanitizerSvg {

	/**
	 * Get allowed tags for SVG.
	 *
	 * @since 1.5.0
	 *
	 * @return array
	 */
	// phpcs:disable WordPress.Arrays.ArrayDeclarationSpacing.ArrayItemNoNewLine, NormalizedArrays.Arrays.CommaAfterLast.MissingMultiLine, WordPress.Arrays.MultipleStatementAlignment.DoubleArrowNotAligned
	const ALLOWED = [
		'svg' => [
			'width', 'height', 'viewBox', 'xmlns', 'version', 'preserveAspectRatio'
		],
		'rect' => [
			'x', 'y', 'width', 'height', 'rx', 'ry', 'fill', 'stroke', 'stroke-width'
		],
		'circle' => [
			'cx', 'cy', 'r', 'fill', 'stroke', 'stroke-width'
		],
		'ellipse' => [
			'cx', 'cy', 'rx', 'ry', 'fill', 'stroke', 'stroke-width'
		],
		'line' => [
			'x1', 'y1', 'x2', 'y2', 'stroke', 'stroke-width'
		],
		'polyline' => [
			'points', 'fill', 'stroke', 'stroke-width'
		],
		'polygon' => [
			'points', 'fill', 'stroke', 'stroke-width'
		],
		'path' => [
			'd', 'fill', 'stroke', 'stroke-width'
		],
		'text' => [
			'x', 'y', 'font-family', 'font-size', 'fill'
		],
		'tspan' => [
			'x', 'y', 'dx', 'dy'
		],
		'g' => [
			'transform', 'fill', 'stroke', 'stroke-width'
		],
		'defs' => [],
		'use' => [
			'href', 'x', 'y', 'width', 'height'
		],
		'image' => [
			'href', 'x', 'y', 'width', 'height', 'preserveAspectRatio'
		],
		'linearGradient' => [
			'id', 'x1', 'y1', 'x2', 'y2'
		],
		'radialGradient' => [
			'id', 'cx', 'cy', 'r', 'fx', 'fy'
		],
		'stop' => [
			'offset', 'stop-color', 'stop-opacity'
		],
		'clipPath' => [
			'id'
		],
		'mask' => [
			'id'
		],
		'filter' => [
			'id', 'x', 'y', 'width', 'height'
		],
		'feGaussianBlur' => [
			'in', 'stdDeviation'
		],
		'feOffset' => [
			'in', 'dx', 'dy'
		],
		'feBlend' => [
			'in', 'in2', 'mode'
		],
		'animate' => [
			'attributeName', 'from', 'to', 'dur', 'repeatCount'
		],
		'animateTransform' => [
			'attributeName', 'type', 'from', 'to', 'dur', 'repeatCount'
		]
	];
	// phpcs:enable WordPress.Arrays.ArrayDeclarationSpacing.ArrayItemNoNewLine, NormalizedArrays.Arrays.CommaAfterLast.MissingMultiLine, WordPress.Arrays.MultipleStatementAlignment.DoubleArrowNotAligned

	/**
	 * Get type declaration.
	 *
	 * @since 1.5.0
	 *
	 * @param string $content File content.
	 *
	 * @return string
	 */
	public static function get_type_declaration( string $content ): string {

		$type_declaration = '';

		if ( strpos( $content, '<?xml' ) !== false ) {
			$type_declaration = substr( $content, 0, strpos( $content, '?>' ) + 2 );
		}

		return $type_declaration;
	}
}
