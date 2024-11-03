/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';
import { InspectorControls, RichText, useBlockProps } from '@wordpress/block-editor';
import { PanelBody, RangeControl, SelectControl } from "@wordpress/components";
import './editor.scss';

export default function Edit( { attributes, setAttributes } ) {
	const { columns, gap, content, columnContents } = attributes;
	console.log( columns );

	const updateColumnContents = ( columnIndex, paragraphIndex, content ) => {
		const newColumnContents = columns[ columnIndex ];
		newColumnContents[ columnIndex ][ paragraphIndex ].content = content;
		setAttributes( { columnContents: newColumnContents } );
	}

	const renderColumn = ( columnIndex ) => {
		return (
			<>
				{ columnContents[ columnIndex ].map( ( paragraph, paragraphIndex ) => (
					<RichText
						key={ paragraphIndex }
						tagName="p"
						value={ paragraph.value }
						onChange={ ( content ) => updateColumnContents( columnIndex, paragraphIndex, content ) }
						placeholder={ __( `Enter column ${ columnIndex + 1 } paragraph ${ paragraphIndex + 1 }...`, 'aral-addons' ) }
					/>
				) ) }
			</>
		)
	}

	return (
		<>
			<InspectorControls>
				<PanelBody title={ __( 'Columns', 'aral-addons' ) }>
					<SelectControl
						label={ __( 'Number of Columns', 'aral-addons' ) }
						value={ columns }
						options={ [
							{ label: '1', value: 1 },
							{ label: '2', value: 2 },
							{ label: '3', value: 3 },
							{ label: '4', value: 4 },
							{ label: '5', value: 5 },
							{ label: '6', value: 6 },
							{ label: '7', value: 7 },
							{ label: '8', value: 8 },
							{ label: '9', value: 9 },
							{ label: '10', value: 10 },
						] }
						onChange={ ( value ) => setAttributes( { columns: value } ) }
					/>
					{ columns > 1 && (
						<RangeControl
							label={ __( 'Columns Gap', 'aral-addons' ) }
							value={ gap }
							onChange={ ( value ) => setAttributes( { gap: value } ) }
							min={ 1 }
							max={ 100 }
						/>
					) }
				</PanelBody>
			</InspectorControls>
			<div { ...useBlockProps() }>
				{ columns > 1 ? (
					<div className={ `column-container columns-${ columns }` }>
						{ Array.from( { length: columns } ).map( ( _, index ) => renderColumn( index ) ) }
					</div>
				) : (
					<RichText
						tagName="p"
						value={ content.value }
						placeholder={ __( 'Enter right column content...', 'two-column-text' ) }
					/>
				) }
			</div>
		</>
	);
}
