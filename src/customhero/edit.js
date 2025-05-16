/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from "@wordpress/i18n";

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
import "./editor.scss";

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {Element} Element to render.
 */

import { useState } from "react";
import { InspectorControls, useBlockProps } from "@wordpress/block-editor";
import { PanelBody, ToggleControl } from "@wordpress/components";
import {
	MediaUpload,
	MediaUploadCheck,
	RichText,
	URLInputButton,
} from "@wordpress/block-editor";
import { Button } from "@wordpress/components";
import { Swiper, SwiperSlide } from "swiper/react";
import { Navigation, Pagination, Autoplay } from "swiper/modules";
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";

export default function Edit({ attributes, setAttributes }) {
	const { slides, icons, autoplay } = attributes;

	const addSlide = () => {
		const newSlides = [
			...slides,
			{ title: "", subtitle: "", backgroundImage: "" },
		];
		setAttributes({ slides: newSlides });
	};

	const removeSlide = (index) => {
		const newSlides = [...slides];
		newSlides.splice(index, 1);
		setAttributes({ slides: newSlides });
	};

	const updateSlide = (index, key, value) => {
		const newSlides = [...slides];
		newSlides[index] = {
			...newSlides[index],
			[key]: value,
		};
		setAttributes({ slides: newSlides });
	};

	// Funzione aggiornata per cambiare l'icona
	const updateIcon = (index, key, value) => {
		const newIcons = [...icons];
		newIcons[index] = {
			...newIcons[index],
			[key]: value,
		};
		setAttributes({ icons: newIcons });
	};

	// Stato per mostrare/nascondere l'input del link
	const [showLinkInput, setShowLinkInput] = useState(false);
	return (
		<div {...useBlockProps()} className="custom-hero-block">
			<InspectorControls>
				<PanelBody title="Impostazioni Hero" initialOpen={true}>
					<ToggleControl
						label="Autoplay"
						checked={autoplay}
						onChange={(val) => setAttributes({ autoplay: val })}
					/>
				</PanelBody>
			</InspectorControls>

			<Swiper
				modules={[Navigation, Pagination, Autoplay]}
				spaceBetween={20}
				pagination={{ clickable: true }}
				loop={true}
				allowTouchMove={false}
				autoplay={false}
				// autoplay={autoplay ? { delay: 3000 } : false}
			>
				{slides.map((slide, index) => (
					<SwiperSlide
						className={`swiper-slide d-flex align-items-center justify-content-center ${
							slide.backgroundImage ? "" : "bg-light"
						}`}
						key={index}
						style={{ backgroundImage: `url(${slide.backgroundImage})` }}
					>
						<div>
							<div className="d-flex justify-content-between align-items-center mb-3">
								<Button
									className={`remove-slide-button  text-white ${
										slides.length <= 1 ? "disabled" : "bg-danger"
									}`}
									onClick={() => removeSlide(index)}
									disabled={slides.length <= 1}
									isDestructive
								>
									Rimuovi slide -
								</Button>
								<div>
									<MediaUploadCheck>
										<MediaUpload
											onSelect={(media) =>
												updateSlide(index, "backgroundImage", media.url)
											}
											allowedTypes={["image"]}
											render={({ open }) => (
												<Button
													onClick={open}
													className="bg-primary text-white"
												>
													{slide.backgroundImage
														? "Cambia immagine"
														: "Carica immagine"}
												</Button>
											)}
										/>
									</MediaUploadCheck>
								</div>
								<Button
									className="add-slide-button"
									onClick={addSlide}
									isPrimary
								>
									Aggiungi slide +
								</Button>
							</div>
							<div className="slide-content">
								<RichText
									tagName="h2"
									value={slide.title}
									onChange={(value) => updateSlide(index, "title", value)}
									placeholder="Titolo"
								/>
								<RichText
									tagName="p"
									value={slide.subtitle}
									onChange={(value) => updateSlide(index, "subtitle", value)}
									placeholder="Sottotitolo"
								/>
							</div>
							<div className="container w-100">
								<div className="row">
									{icons.map((icon, index) => (
										<div
											key={index}
											className="col-4 d-flex justify-content-center"
										>
											<div className="circle-icon position-relative">
												<RichText
													className="icon-title"
													tagName="p"
													value={icon.title}
													onChange={(value) =>
														updateIcon(index, "title", value)
													}
													placeholder={icon.title}
												/>
												{icon.icon && (
													<img
														src={icon.icon}
														alt={icon.title}
														className="icon-svg gray-svg"
													/>
												)}
												<MediaUploadCheck>
													<MediaUpload
														onSelect={(media) =>
															updateIcon(index, "icon", media.url)
														}
														type="image"
														value={icon.icon}
														render={({ open }) => (
															<Button onClick={open} isPrimary>
																{icon.icon ? "Aggiorna" : "Aggiungi icona"}
															</Button>
														)}
													/>
												</MediaUploadCheck>

												<div className="text-center mt-3">
													<button
														className="link-select-button"
														onClick={() => setShowLinkInput(!showLinkInput)}
													>
														<img
															src="/wp-content/themes/AgenziaNolana/assets/svg/arrow-down-angle-svgrepo-com.svg"
															alt="Arrow Down"
															style={{
																width: "50px",
																height: "50px",
																cursor: "pointer",
															}}
														/>
													</button>
												</div>

												{/* Mostra solo l'input per selezionare il link */}
												{showLinkInput && (
													<div className="text-center mt-3">
														<URLInputButton
															url={icon.url} // Seleziona URL pre-esistente
															onChange={(newUrl) =>
																updateIcon(index, "url", newUrl)
															} // Salva il nuovo URL
															label="Seleziona una pagina"
														/>
													</div>
												)}
											</div>
										</div>
									))}
								</div>
							</div>
						</div>
					</SwiperSlide>
				))}
			</Swiper>
		</div>
	);
}
