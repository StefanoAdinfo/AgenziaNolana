/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */

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

import { useState } from 'react';
import { InspectorControls, useBlockProps } from '@wordpress/block-editor';
import { PanelBody, ToggleControl } from '@wordpress/components';
import {
	MediaUpload,
	MediaUploadCheck,
	RichText,
	URLInputButton,
} from '@wordpress/block-editor';
import { Button } from '@wordpress/components';
import { Swiper, SwiperSlide } from 'swiper/react';
import { Navigation, Pagination, Autoplay } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

export default function Edit( { attributes, setAttributes } ) {
	const { slides, autoplay } = attributes;

	const addSlide = () => {
		const newSlides = [
			...slides,
			{ title: '', subtitle: '', backgroundImage: '' },
		];
		setAttributes( { slides: newSlides } );
	};

	const removeSlide = ( index ) => {
		const newSlides = [ ...slides ];
		newSlides.splice( index, 1 );
		setAttributes( { slides: newSlides } );
	};

	const updateSlide = ( index, key, value ) => {
		const newSlides = [ ...slides ];
		newSlides[ index ] = {
			...newSlides[ index ],
			[ key ]: value,
		};
		setAttributes( { slides: newSlides } );
	};

	// Stato per mostrare/nascondere l'input del link

	return (
		<div { ...useBlockProps() } className="my-hero-block">
			<InspectorControls>
				<PanelBody title="Impostazioni Hero" initialOpen={ true }>
					<ToggleControl
						label="Autoplay"
						checked={ autoplay }
						onChange={ ( val ) =>
							setAttributes( { autoplay: val } )
						}
					/>
				</PanelBody>
			</InspectorControls>

			<Swiper
				modules={ [ Navigation, Pagination, Autoplay ] }
				spaceBetween={ 20 }
				pagination={ { clickable: true } }
				loop={ true }
				allowTouchMove={ false }
				autoplay={ false }
				// autoplay={autoplay ? { delay: 3000 } : false}
			>
				{ slides.map( ( slide, index ) => (
					<SwiperSlide
						className={ `swiper-slide d-flex align-items-center justify-content-center ${
							slide.backgroundImage ? '' : 'bg-light'
						}` }
						key={ index }
						style={ {
							backgroundImage: `url(${ slide.backgroundImage })`,
						} }
					>
						<div className="slide-content-wrapper container  ">
							<div className="d-flex justify-content-between align-items-center mb-5 ">
								<Button
									className={ `remove-slide-button  text-white ${
										slides.length <= 1
											? 'disabled'
											: 'bg-danger'
									}` }
									onClick={ () => removeSlide( index ) }
									disabled={ slides.length <= 1 }
									isDestructive
								>
									Rimuovi slide -
								</Button>
								<div>
									<MediaUploadCheck>
										<MediaUpload
											onSelect={ ( media ) =>
												updateSlide(
													index,
													'backgroundImage',
													media.url
												)
											}
											allowedTypes={ [ 'image' ] }
											render={ ( { open } ) => (
												<Button
													onClick={ open }
													className="bg-primary text-white"
												>
													{ slide.backgroundImage
														? 'Cambia immagine'
														: 'Carica immagine' }
												</Button>
											) }
										/>
									</MediaUploadCheck>
								</div>
								<Button
									className="add-slide-button"
									onClick={ addSlide }
									isPrimary
								>
									Aggiungi slide +
								</Button>
							</div>
							<div className="slide-content">
								<RichText
									tagName="h2"
									value={ slide.title }
									onChange={ ( value ) =>
										updateSlide( index, 'title', value )
									}
									placeholder="Titolo"
								/>
								<RichText
									tagName="p"
									value={ slide.subtitle }
									onChange={ ( value ) =>
										updateSlide( index, 'subtitle', value )
									}
									placeholder="Sottotitolo"
								/>
							</div>
						</div>
					</SwiperSlide>
				) ) }
			</Swiper>
		</div>
	);
}
