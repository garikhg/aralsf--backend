/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { __ } from "@wordpress/i18n";
import { useBlockProps, RichText } from '@wordpress/block-editor';

export default function save( { attributes } ) {
	const { columns, gap, content, columnContents } = attributes;
	const blockProps = useBlockProps.save();
	console.log(content)
	const renderColumn = (columnIndex) => {
		return (
			<div className={`column column-${columnIndex + 1}`} key={columnIndex}>
				{columnContents[columnIndex].map((paragraph, paragraphIndex) => (
					<RichText.Content
						key={paragraphIndex}
						tagName="p"
						value={paragraph.content}
					/>
				))}
			</div>
		);
	};

	return (
		<div { ...blockProps }>
			{columns > 1 ? (
			<div
				className={ `column-container columns-${ columns }` }
				style={ {
					'--column-gap': `${ gap }`,
				} }
			>
				{ Array.from( { length: columnContents } ).map( ( _, index ) => renderColumn( index ) ) }
			</div>

			) : (
				<RichText.Content tagName="p" value={ content.value } />
			)}

		</div>
	);
}
