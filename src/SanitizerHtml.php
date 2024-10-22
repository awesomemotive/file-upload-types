<?php

namespace FileUploadTypes;

/**
 * HTML sanitizer data.
 *
 * @since 1.5.0
 */
class SanitizerHtml {

	/**
	 * Get allowed tags for HTML.
	 *
	 * @since 1.5.0
	 *
	 * @return array
	 */
	// phpcs:disable WordPress.Arrays.ArrayDeclarationSpacing.ArrayItemNoNewLine, NormalizedArrays.Arrays.CommaAfterLast.MissingMultiLine, WordPress.Arrays.MultipleStatementAlignment.DoubleArrowNotAligned
	const ALLOWED = [
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

		if ( strpos( $content, '<!DOCTYPE' ) !== false ) {
			$type_declaration = substr( $content, 0, strpos( $content, '>' ) + 1 );
		}

		return $type_declaration;
	}
}
