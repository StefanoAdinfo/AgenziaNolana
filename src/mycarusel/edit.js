/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
// import { __ } from "@wordpress/i18n";

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
// import { useBlockProps } from "@wordpress/block-editor";

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './editor.scss';

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {Element} Element to render.
 */

import { InspectorControls, useBlockProps } from '@wordpress/block-editor';
import {
	PanelBody,
	ToggleControl,
	SelectControl,
	RangeControl,
} from '@wordpress/components';
import { useSelect } from '@wordpress/data';
import { __ } from '@wordpress/i18n';

import { Swiper, SwiperSlide } from 'swiper/react';
import { Navigation, Pagination, Autoplay } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

export default function Edit( { attributes, setAttributes } ) {
	const {
		postType,
		showTitle,
		showExcerpt,
		showFeaturedImage,
		autoplay,
		slidesPerView,
	} = attributes;

	const activeOptionsCount = [
		attributes.showTitle,
		attributes.showExcerpt,
		attributes.showFeaturedImage,
	].filter( Boolean ).length;

	const posts = useSelect(
		( select ) =>
			select( 'core' ).getEntityRecords( 'postType', postType, {
				per_page: 10,
				_embed: true, // Per featured image
			} ),
		[ postType ]
	);

	const blockProps = useBlockProps();

	return (
		<div { ...blockProps }>
			<InspectorControls>
				<PanelBody title="Impostazioni Carousel" initialOpen={ true }>
					<SelectControl
						label="Tipo di post"
						value={ postType }
						options={ [
							{ label: 'Post', value: 'post' },
							{ label: 'Pagine', value: 'page' },
							{ label: 'Foto', value: 'foto' }, // CPT
						] }
						onChange={ ( val ) =>
							setAttributes( { postType: val } )
						}
					/>
					<ToggleControl
						label="Autoplay"
						checked={ autoplay }
						onChange={ ( val ) =>
							setAttributes( { autoplay: val } )
						}
					/>
					<RangeControl
						label="Slide per visualizzazione"
						value={ slidesPerView }
						onChange={ ( val ) =>
							setAttributes( { slidesPerView: val } )
						}
						min={ 1 }
						max={ 5 }
					/>
					<ToggleControl
						label="Mostra titolo"
						checked={ attributes.showTitle }
						onChange={ ( val ) =>
							setAttributes( { showTitle: val } )
						}
						disabled={
							attributes.showTitle && activeOptionsCount === 1
						}
					/>

					<ToggleControl
						label="Mostra excerpt"
						checked={ attributes.showExcerpt }
						onChange={ ( val ) =>
							setAttributes( { showExcerpt: val } )
						}
						disabled={
							attributes.showExcerpt && activeOptionsCount === 1
						}
					/>

					<ToggleControl
						label="Mostra immagine in evidenza"
						checked={ attributes.showFeaturedImage }
						onChange={ ( val ) =>
							setAttributes( { showFeaturedImage: val } )
						}
						disabled={
							attributes.showFeaturedImage &&
							activeOptionsCount === 1
						}
					/>
				</PanelBody>
			</InspectorControls>

			{ posts ? (
				<Swiper
					modules={ [ Navigation, Pagination, Autoplay ] }
					spaceBetween={ 20 }
					slidesPerView={ slidesPerView }
					navigation
					pagination={ { clickable: true } }
					autoplay={ autoplay ? { delay: 3000 } : false }
				>
					{ posts.map( ( post ) => (
						<SwiperSlide key={ post.id }>
							<div className="swiper-card">
								{ showFeaturedImage &&
									post._embedded?.[
										'wp:featuredmedia'
									]?.[ 0 ]?.source_url && (
										<img
											src={
												post._embedded[
													'wp:featuredmedia'
												][ 0 ].source_url
											}
											alt={ post.title?.rendered || '' }
											style={ {
												width: '100%',
												height: 'auto',
											} }
										/>
									) }

								{ showTitle && post.title?.rendered && (
									<h3>{ post.title.rendered }</h3>
								) }

								{ showExcerpt &&
									post.excerpt?.rendered &&
									post.excerpt.rendered.trim() !== '' && (
										<p
											dangerouslySetInnerHTML={ {
												__html: post.excerpt.rendered,
											} }
										/>
									) }
							</div>
						</SwiperSlide>
					) ) }
				</Swiper>
			) : (
				<p>Caricamento o nessun post trovato.</p>
			) }
		</div>
	);
}
