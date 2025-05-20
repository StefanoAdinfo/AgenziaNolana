import { __ } from "@wordpress/i18n";
import {
	useBlockProps,
	InspectorControls,
	RichText,
	MediaUpload,
	MediaUploadCheck,
} from "@wordpress/block-editor";
import { PanelBody, ToggleControl, Button } from "@wordpress/components";

import { Splide, SplideSlide, SplideTrack } from "@splidejs/react-splide";
import "@splidejs/react-splide/css";
import "./editor.scss";
import { useEffect, useRef } from "@wordpress/element";

export default function Edit({ attributes, setAttributes }) {
	const { titolo_carosello, slides, autoplay } = attributes;
	const targetIndexRef = useRef(null);
	const splideRef = useRef(null);

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
				image: "",
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
			<div class="container overflow-hidden it-carousel-wrapper adinfo-carusel-editor adinfo-carusel">
				<div class="it-header-block">
					<div class="it-header-block-title">
						<RichText
							tagName="h2"
							value={titolo_carosello}
							onChange={(value) => setAttributes({ titolo_carosello: value })}
							placeholder="Titolo del carosello"
						/>
					</div>
				</div>
				<Splide
					key={slides.length}
					ref={splideRef}
					hasTrack={false}
					options={{
						type: "loop",
						padding: "15rem",
						autoplay: false,
						pagination: true,
						arrows: false,
						rewind: false,
						drag: false,
						gap: "1rem",
						focus: "center",
						breakpoints: {
							768: {
								padding: "2rem",
							},
							480: {
								padding: "1rem",
							},
						},
					}}
				>
					<SplideTrack>
						{slides.map((slide, index) => (
							<SplideSlide key={index} className="bg-light">
								<div className="slide-controls">
									<Button
										className="slide-button remove"
										onClick={() => removeSlide(index)}
										disabled={slides.length === 1}
										title="Rimuovi slide"
									>
										−
									</Button>
									<Button
										className="slide-button add"
										onClick={addSlide}
										title="Aggiungi slide"
									>
										＋
									</Button>
								</div>

								<MediaUploadCheck>
									<MediaUpload
										onSelect={(media) => updateSlide(index, "image", media.url)}
										allowedTypes={["image"]}
										value={slide.image}
										render={({ open }) => (
											<div onClick={open} style={{ cursor: "pointer" }}>
												{slide.image ? (
													<img
														src={slide.image}
														alt="Anteprima immagine"
														title="Clicca per cambiare immagine"
													/>
												) : (
													<div className="fallback-image">
														<div className="fallback-icon">＋</div>
													</div>
												)}
											</div>
										)}
									/>
								</MediaUploadCheck>
							</SplideSlide>
						))}
					</SplideTrack>
				</Splide>
			</div>
		</div>
	);
}
