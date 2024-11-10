/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { InnerBlocks, useBlockProps } from '@wordpress/block-editor';

export default function save( { attributes } ) {
	return (
		<div { ...useBlockProps.save( {
			className: 'wp-block-aral-addons-container block-container',
		} ) }>
			{ attributes.inserter ? (
				<div className="block-container__inner-container">
					<InnerBlocks.Content/>
				</div>
			) : (
				<InnerBlocks.Content/>
			) }
		</div>
	);
}
