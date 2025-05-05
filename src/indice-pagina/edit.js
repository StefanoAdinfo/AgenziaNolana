/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the className name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps } from '@wordpress/block-editor';

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
export default function Edit() {
	return (
		<p { ...useBlockProps() }>
			<div className="accordion border-0" id="accordionExample">
				<div className="accordion-item border-0">
					<h2 className="accordion-header">
						<button
							className="accordion-button indice-title bg-transparent border-0"
							type="button"
							data-bs-toggle="collapse"
							data-bs-target="#collapseOne"
							aria-expanded="true"
							aria-controls="collapseOne"
						>
							<span style={ { color: '#0066cc' } }>
								INDICE DELLA PAGINA
							</span>
						</button>
					</h2>
					<div className="indice-bar"></div>
					<div
						id="collapseOne"
						className="accordion-collapse collapse show"
						data-bs-parent="#accordionExample"
					>
						<div className="accordion-body">
							<ul className="indice-list">
								<li className="indice-item active">
									<a href="#descrizione">Descrizione</a>
								</li>
								<li className="indice-item">
									<a href="#a-cura-di">A cura di</a>
								</li>
								<li className="indice-item">
									<a href="#esplora-novita">Esplora novità</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</p>
	);
}
