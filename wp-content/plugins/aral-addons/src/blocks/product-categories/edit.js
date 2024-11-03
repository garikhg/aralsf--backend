/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';
import { InspectorControls, useBlockProps } from '@wordpress/block-editor';
import './editor.scss';
import { useEffect, useState } from "@wordpress/element";
import { CheckboxControl, PanelBody, PanelRow, RangeControl, TextControl, ToggleControl } from "@wordpress/components";

export default function Edit( { attributes, setAttributes } ) {
	const blockProps = useBlockProps();
	const { displayTitle, displayDescription, excludeCategories, columns, overlayOpacity } = attributes;
	const [ categories, setCategories ] = useState( [] );
	const [ allCategories, setAllCategories ] = useState( [] );
	const [ searchQuery, setSearchQuery ] = useState( '' )

	useEffect( () => {
		const fetchCats = async () => {
			try {
				const response = await fetch( '/wp-json/wp/v2/product_cat?acf_format=standard&_embed' );
				const data = await response.json();
				const filteredCategories = data.filter( cat => ! excludeCategories.includes( String( cat.id ) ) );
				setAttributes( { categories: filteredCategories } );
				setAllCategories( data );
				setCategories( filteredCategories );
			} catch ( error ) {
				console.error( 'Error fetching categories:', error );
			}
		};

		fetchCats();
	}, [ excludeCategories ] );

	const handleSearchChange = ( value ) => {
		setSearchQuery( value );
	}

	const handleCheckboxChange = ( categoryId ) => {
		const newExcludeCategories = excludeCategories.includes( categoryId )
			? excludeCategories.filter( ( id ) => id !== categoryId )
			: [ ...excludeCategories, categoryId ];

		setAttributes( { excludeCategories: newExcludeCategories } );
	}

	const filteredCategories = allCategories.filter(
		( category ) => category.name.toLowerCase().includes( searchQuery.toLowerCase() )
	);

	return (
		<div { ...blockProps }>
			<InspectorControls>
				<PanelBody title={ __( 'Settings', 'aral-addons' ) }>
					<ToggleControl
						label={ __( 'Display Title', 'aral-addons' ) }
						checked={ displayTitle }
						onChange={ ( value ) => setAttributes( { displayTitle: value } ) }
					/>
					<ToggleControl
						label={ __( 'Display Description', 'aral-addons' ) }
						checked={ displayDescription }
						onChange={ ( value ) => setAttributes( { displayDescription: value } ) }
					/>
					<PanelRow>
						<strong>{ __( 'Exclude Categories', 'aral-addons' ) }</strong>
					</PanelRow>
					<TextControl
						value={ searchQuery }
						onChange={ handleSearchChange }
						placeholder={ __( 'Search categories...', 'aral-addons' ) }
					/>
					<div className="aral-addons-components-checkbox-control__list">
						{ filteredCategories.length > 0 && filteredCategories.map( ( category ) => (
							<CheckboxControl
								key={ category.id }
								label={ category.name }
								checked={ excludeCategories.includes( String( category.id ) ) }
								onChange={ () => handleCheckboxChange( String( category.id ) ) }
							/>
						) ) }
					</div>
				</PanelBody>
				<PanelBody title={ __( 'Styles', 'aral-addons' ) } initialOpen={ false }>
					<RangeControl
						label={ __( 'Columns', 'aral-addons' ) }
						value={ columns }
						onChange={ ( value ) => setAttributes( { columns: value } ) }
						step={ 1 }
						min={ 1 }
						max={ 6 }
					/>
					<RangeControl
						label={ __( 'Overlay Opacity', 'aral-addons' ) }
						value={ overlayOpacity }
						onChange={ ( value ) => setAttributes( { overlayOpacity: value } ) }
						step={ 10 }
						min={ 0 }
						max={ 100 }
					/>
				</PanelBody>
			</InspectorControls>

			{ categories.length > 0 ? (
				<ul className={ `product-category__list grid grid-cols-${ columns }` }
					style={ { '--product-category-columns': `${ columns }` } }
				>
					{ categories.map( ( category ) => (
						<li key={ category.id } className="product-category-card">
							{/*{ console.log(category.acf.thumbnail.url) }*/ }
							{ category?.acf?.thumbnail.url && (
								<div className="product-category-card__heading">
									<span
										className={ `product-category-card__background has-background-dim-${ overlayOpacity } has-background-dim` }
									></span>
									<img
										src={ category?.acf?.thumbnail.url } alt={ category.name }
										className="product-category-card__image"
									/>
								</div>
							) }
							<div className="product-category-card__body">
								{ displayTitle && (
									<h3 className="product-category-card__title">{ category.name }</h3>
								) }
								{ displayDescription && (
									<div className="product-category-card__description">
										<p>{ category.description }</p>
									</div>
								) }

								<div className="product-category-card__link-wrap">
									<a href={ category.link } className="product-category-card__link">
										{ __( 'View Category', 'aral-addons' ) }
									</a>
								</div>
							</div>
						</li>
					) ) }
				</ul>
			) : ( <p>{ __( 'Not found categories', 'aral-addons' ) }</p> ) }
		</div>
	);
}
