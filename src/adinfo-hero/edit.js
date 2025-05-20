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
				buttonLink: {
					url: "",
				},
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
		<div {...useBlockProps()} className="carusel-hero">
			<InspectorControls>
				<PanelBody title="Impostazioni Hero" initialOpen={true}>
					<ToggleControl
						label="Autoplay"
						checked={autoplay}
						onChange={(val) => setAttributes({ autoplay: val })}
					/>
				</PanelBody>
			</InspectorControls>

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
							style={{
								backgroundImage:
									slide.backgroundImage !== ""
										? `url(${slide.backgroundImage})`
										: "none",
								backgroundSize: "cover",
								backgroundPosition: "center",
								minHeight: "400px",
							}}
							className="d-flex align-items-center justify-content-center bg-light"
						>
							<div className="slide-content-wrapper container">
								<div className="d-flex justify-content-between align-items-center mb-5">
									<Button
										className={`remove-slide-button text-white ${
											slides.length <= 1 ? "disabled" : "bg-danger"
										}`}
										onClick={() => removeSlide(index)}
										disabled={slides.length == 1 || !slides.length}
										isDestructive
									>
										Rimuovi slide -
									</Button>

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

									<Button
										className="add-slide-button"
										onClick={addSlide}
										isPrimary
									>
										Aggiungi slide +
									</Button>
								</div>

								<div className="it-hero-text-wrapper slide-content">
									<RichText
										tagName="h5"
										value={slide.overline}
										className="it-category"
										onChange={(value) => updateSlide(index, "overline", value)}
										placeholder="Titolo occhiello"
									/>
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

									<div className="it-btn-container mb-3 ">
										<RichText
											onClick={() => toggleLinkInput(index)}
											tagName="span"
											value={slide.buttonText}
											onChange={(value) =>
												updateSlide(index, "buttonText", value)
											}
											placeholder="Testo bottone"
											className="btn btn-sm btn-secondary d-inline-block text-white text-decoration-none"
										/>
										{/*
										{showLinkInputs[index] && (
											<URLInputButton
												url={slide.buttonLink?.url || ""}
												onChange={(newUrl) =>
													updateSlide(index, "buttonLink", { url: newUrl })
												}
												className="mt-3"
												label="Seleziona una pagina"
											/>
										)} */}
										{/* <RichText
											tagName="a"
											placeholder="Testo a"
											onChange={(value) => {
												console.log("value", value);
												updateSlide(index, "buttonText", value);
											}}
											className="btn btn-sm btn-secondary d-inline-block text-white text-decoration-none"
										/> */}
									</div>
								</div>
							</div>
						</SplideSlide>
					))}
				</SplideTrack>
			</Splide>
		</div>
	);
}
