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
import { useBlockProps } from "@wordpress/block-editor";

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
import {
	RichText,
	MediaUpload,
	MediaUploadCheck,
	InspectorControls,
} from "@wordpress/block-editor";
import { SelectControl, PanelRow, PanelBody } from "@wordpress/components";
import { useState } from "react";

export default function Edit({ attributes, setAttributes }) {
	const { title, content, image, date, badge, linkText } = attributes;

	const [direction2, setDirection] = useState(attributes.direction || "left");

	return (
		<div
			class="wp-block-myblocks-card"
			{...useBlockProps({
				className: "wp-block-myblocks-card " + direction2,
			})}
		>
			<InspectorControls>
				<PanelBody title="Settings">
					<PanelRow>
						<SelectControl
							label="Direzione"
							value={direction2}
							options={[
								{ label: "Immagine a sinistra", value: "left" },
								{ label: "Immagine a destra", value: "right" },
							]}
							onChange={(value) => {
								setDirection(value);
								setAttributes({ direction: value });
							}}
						/>
					</PanelRow>
				</PanelBody>
			</InspectorControls>
			<MediaUploadCheck>
				<MediaUpload
					onSelect={(media) => setAttributes({ image: media.url })}
					allowedTypes={["image"]}
					value={image}
					render={({ open }) => (
						<div
							onClick={open}
							style={{
								cursor: "pointer",
								display: "inline-block",
							}}
						>
							{image ? (
								<img
									src={image}
									alt="Anteprima immagine"
									title="Clicca per cambiare immagine"
								/>
							) : (
								<div className="fallback-image">
									Clicca per aggiungere immagine
								</div>
							)}
						</div>
					)}
				/>
			</MediaUploadCheck>

			<div className=" d-flex flex-column justify-content-between h-auto">
				{/* Header con badge e data */}
				<div>
					<div className="d-flex justify-content-between align-items-start mb-4">
						<RichText
							tagName="span"
							className="badge bg-secondary fw-bold fs-6"
							value={badge}
							onChange={(value) => setAttributes({ badge: value })}
							placeholder="Tipo (es. New)"
						/>
						<RichText
							tagName="small"
							className="text-muted"
							value={date}
							onChange={(value) => setAttributes({ date: value })}
							placeholder="Data (es. 10/10/2024)"
						/>
					</div>

					{/* Corpo principale (contenuto flessibile) */}
					<div>
						<RichText
							tagName="h4"
							className="text-primary fw-bold"
							value={title}
							onChange={(value) => setAttributes({ title: value })}
							placeholder="Titolo della card"
						/>

						<RichText
							tagName="p"
							className="mb-4"
							value={content}
							onChange={(value) => setAttributes({ content: value })}
							placeholder="Contenuto della card"
						/>
					</div>
				</div>

				{/* Link ancorato in basso */}
				<div className="mb-3">
					<RichText
						tagName="a"
						href="#"
						className="text-primary fw-bold text-uppercase small"
						value={linkText}
						onChange={(value) => setAttributes({ linkText: value })}
						placeholder="Testo del link (es. LEGGI TUTTO →)"
					/>
				</div>
			</div>
		</div>
	);
}
