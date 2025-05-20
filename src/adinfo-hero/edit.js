import { __ } from "@wordpress/i18n";
import {
	useBlockProps,
	InspectorControls,
	RichText,
	MediaUpload,
	MediaUploadCheck,
	URLInputButton,
} from "@wordpress/block-editor";
import { PanelBody, ToggleControl, Button } from "@wordpress/components";

import { Splide, SplideSlide, SplideTrack } from "@splidejs/react-splide";
import "@splidejs/react-splide/css";
import "./editor.scss";
import { useEffect, useRef } from "@wordpress/element";
import { useState } from "react";

export default function Edit({ attributes, setAttributes }) {
	const { slides, autoplay } = attributes;
	const targetIndexRef = useRef(null);
	const splideRef = useRef(null);
	const [showLinkInputs, setShowLinkInputs] = useState({});

	const toggleLinkInput = (index) => {
		setShowLinkInputs((prev) => ({
			...prev,
			[index]: !prev[index],
		}));
	};

	useEffect(() => {
		const splide = splideRef.current?.splide;
		if (!splide) return;

		if (targetIndexRef.current !== null) {
			splide.go(targetIndexRef.current);
			targetIndexRef.current = null;
		}
	}, [slides.length]);

	const addSlide = () => {
		const newSlides = [
			...slides,
			{
				overline: "",
				title: "",
				subtitle: "",
				backgroundImage: "",
				buttonText: "",
				buttonLink: "",
				buttonText: "",
			},
		];
		targetIndexRef.current = newSlides.length - 1;
		setAttributes({ slides: newSlides });
	};

	const removeSlide = (indexToRemove) => {
		if (slides.length <= 1) return;

		const newSlides = [...slides];
		newSlides.splice(indexToRemove, 1);

		// Vai alla slide precedente se possibile
		targetIndexRef.current = Math.min(indexToRemove, newSlides.length - 1);
		setAttributes({ slides: newSlides });
	};

	const updateSlide = (index, field, value) => {
		const newSlides = [...slides];
		newSlides[index][field] = value;
		setAttributes({ slides: newSlides });
	};

	if (!slides.length) {
		addSlide();
	}

	return (
		<div {...useBlockProps()}>
			<InspectorControls>
				<PanelBody title="Impostazioni Hero" initialOpen={true}>
					<ToggleControl
						label="Autoplay"
						checked={autoplay}
						onChange={(val) => setAttributes({ autoplay: val })}
					/>
				</PanelBody>
			</InspectorControls>
			<div className="adinfo-hero-editor adinfo-hero">
				<Splide
					key={slides.length}
					ref={splideRef}
					hasTrack={false}
					options={{
						type: "fade",
						perPage: 1,
						autoplay: false,
						pagination: true,
						arrows: false,
						rewind: false,
						drag: false,
					}}
				>
					<div className="splide__arrows" />
					<SplideTrack>
						{slides.map((slide, index) => (
							<SplideSlide
								key={index}
								className="splide__slide it-hero-wrapper it-dark it-overlay position-relative"
							>
								{/* Immagine di sfondo */}
								<div className="img-responsive-wrapper">
									<div className="img-responsive">
										<div className="img-wrapper">
											{slide.backgroundImage && (
												<img
													src={slide.backgroundImage}
													alt={slide.title || ""}
													title={slide.title || ""}
												/>
											)}
										</div>
									</div>
								</div>

								{/* Contenuto della slide */}
								<div className="container">
									<div className="row">
										<div className="col-12">
											<div className="it-hero-text-wrapper bg-dark text-white  ">
												<RichText
													tagName="span"
													value={slide.overline}
													className="it-category"
													onChange={(value) =>
														updateSlide(index, "overline", value)
													}
													placeholder="Titolo occhiello"
												/>
												<RichText
													tagName="h2"
													value={slide.title}
													onChange={(value) =>
														updateSlide(index, "title", value)
													}
													placeholder="Titolo"
												/>
												<RichText
													tagName="p"
													value={slide.subtitle}
													className="d-none d-lg-block"
													onChange={(value) =>
														updateSlide(index, "subtitle", value)
													}
													placeholder="Sottotitolo"
												/>

												<div className="it-btn-container mb-3">
													<RichText
														onClick={() => toggleLinkInput(index)}
														tagName="span"
														value={slide.buttonText}
														onChange={(value) =>
															updateSlide(index, "buttonText", value)
														}
														placeholder="Testo bottone"
														className="btn btn-sm btn-secondary text-white text-decoration-none"
													/>

													{showLinkInputs[index] && (
														<URLInputButton
															url={slide.buttonLink || ""}
															onChange={(value) =>
																updateSlide(index, "buttonLink", value)
															}
															className="mt-3"
															label="Seleziona una pagina"
														/>
													)}
												</div>
											</div>
										</div>
									</div>
								</div>
								<div
									className="position-absolute top-0 end-0 p-3 pr-5"
									style={{ zIndex: 10 }}
								>
									<div className="d-flex flex-column align-items-end gap-2">
										<MediaUploadCheck>
											<MediaUpload
												onSelect={(media) =>
													updateSlide(index, "backgroundImage", media.url)
												}
												allowedTypes={["image"]}
												render={({ open }) => (
													<Button
														onClick={open}
														className="add-image-button bg-primary text-white"
													>
														{slide.backgroundImage
															? "Cambia immagine"
															: "Carica immagine"}
													</Button>
												)}
											/>
										</MediaUploadCheck>

										<div className="d-flex  gap-2">
											<Button
												className={`remove-slide-button text-white rounded-circle button-edit ${
													slides.length <= 1 ? "disabled" : "bg-danger"
												}`}
												onClick={() => removeSlide(index)}
												disabled={slides.length === 1 || !slides.length}
												title="Rimuovi slide"
											>
												-
											</Button>

											<Button
												className="add-slide-button bg-success text-white rounded-circle button-edit "
												onClick={addSlide}
												title="Aggiungi slide"
											>
												+
											</Button>
										</div>
									</div>
								</div>
							</SplideSlide>
						))}
					</SplideTrack>
				</Splide>
			</div>
		</div>
	);
}
