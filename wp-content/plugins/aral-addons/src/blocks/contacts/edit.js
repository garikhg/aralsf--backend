/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 * @see https://developer.wordpress.org/block-editor/reference-guides/components/
 */
import { __ } from '@wordpress/i18n';

import { InspectorControls, RichText, useBlockProps } from '@wordpress/block-editor';
import { PanelBody, SelectControl, TextControl } from "@wordpress/components";
import { Fragment, useEffect } from "@wordpress/element";
import './editor.scss';
import apiFetch from "@wordpress/api-fetch";

export default function Edit( { attributes, setAttributes } ) {
	const blockProps = useBlockProps();

	// /wp-json/contact-form-7/v1/contact-forms/123/feedback
	useEffect( () => {
		// apiFetch( { path: '/wp-json/contact-form-7/v1/contact-forms/719/feedback' } )
		apiFetch( { path: '/wp/v2/contact-form-7' } )
			.then( response => response.json() )
			.then( data => {
				console.log( data );
			} )
			.catch( error => {
				console.error( error );
			} );
	}, [] );

	return (
		<Fragment>
			<div { ...blockProps }>
				<InspectorControls>
					<PanelBody title={ __( 'Contact Form' ) }>
						<SelectControl
							label={ __( 'Select Contact Form', 'aral-addons' ) }
							value={ attributes.contactFormId }
							options={ [
								{ label: 'Contact Form 1', value: 'contact-form-1' },
								{ label: 'Contact Form 2', value: 'contact-form-2' },
								{ label: 'Contact Form 3', value: 'contact-form-3' },
							] }
						/>
					</PanelBody>
				</InspectorControls>
				<div className="block-aral-addons-contacts__grid">
					<div className="block-aral-addons-contacts__colspan">
						<RichText
							tagName="h3"
							value={ attributes.title }
							onChange={ ( title ) => setAttributes( { title } ) }
							placeholder={ __( 'Enter your title here', 'aral-addons' ) }
						/>
						<RichText
							tagName="p"
							value={ attributes.text }
							onChange={ ( text ) => setAttributes( { text } ) }
							placeholder={ __( 'Enter your text here', 'aral-addons' ) }
						/>
						<TextControl
							tagName="p"
							label={ __( 'Head Office', 'aral-addons' ) }
							value={ attributes.address }
							onChange={ ( address ) => setAttributes( { address } ) }
						/>
						<TextControl
							label={ __( 'Phone', 'aral-addons' ) }
							value={ attributes.phone }
							onChange={ ( value ) => setAttributes( { phone: value } ) }
						/>
						<TextControl
							label={ __( 'Email', 'aral-addons' ) }
							value={ attributes.email }
							onChange={ ( value ) => setAttributes( { email: value } ) }
						/>
						<TextControl
							label={ __( 'Working Hours', 'aral-addons' ) }
							value={ attributes.workingHours }
							onChange={ ( value ) => setAttributes( { workingHours: value } ) }
						/>
						<TextControl
							value={ attributes.workingDays }
							onChange={ ( value ) => setAttributes( { workingDays: value } ) }
						/>
					</div>
					<div className="block-aral-addons-contacts__colspan">

					</div>
				</div>
			</div>
		</Fragment>
	);
}
