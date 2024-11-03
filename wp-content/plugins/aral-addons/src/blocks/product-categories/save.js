import { useBlockProps } from '@wordpress/block-editor';
import { __ } from "@wordpress/i18n";

export default function save( { attributes } ) {
	const blockProps = useBlockProps.save();
	const {
		displayTitle,
		displayDescription,
		categories: categoriesData,
		columns,
		excludeCategories,
		overlayOpacity
	} = attributes;
	const categories = categoriesData.filter( ( cat ) => ! excludeCategories.includes( String( cat.id ) ) );

	return (
		<div { ...blockProps }>
			{ categories.length > 0 ? (
				<ul className={ `product-category__list` }
					style={ { '--product-category-columns': `${ columns }` } }
				>
					{ categories.map( ( category ) => (
						<li key={ category.id } className="product-category-card">
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
			) : ( 'Loading...' ) }
		</div>
	);
}
