/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';
import { InnerBlocks, InspectorControls, useBlockProps } from '@wordpress/block-editor';
import './editor.scss';
import { PanelBody, ToggleControl } from "@wordpress/components";

export default function Edit( { attributes, setAttributes } ) {
	const blockProps = useBlockProps( {
		className: 'wp-block-aral-addons-container block-container',
	} );

	return (
		<div { ...blockProps }>
			<InspectorControls>
				<PanelBody title={ __( 'Container Settings' ) }>
					<ToggleControl
						label={ __( 'Inserter', 'aral-addons' ) }
						checked={ attributes.inserter }
						onChange={ ( inserter ) => setAttributes( { inserter } ) }
						help={ __( 'Enable or disable the inserter.', 'aral-addons' ) }
					/>
				</PanelBody>
			</InspectorControls>
			{ attributes.inserter ? (
				<div className="block-container__inner-container">
					<InnerBlocks/>
				</div>
			) : (
				<InnerBlocks/>
			) }

		</div>
	);
}
