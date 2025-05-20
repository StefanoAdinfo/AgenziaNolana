<?php
// This file is generated. Do not modify it manually.
return array(
	'adinfo-carusel' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'myblocks/adinfo-carusel',
		'version' => '0.1.0',
		'title' => 'Adinfo Carusel',
		'category' => 'widgets',
		'icon' => 'smiley',
		'description' => 'Example block scaffolded with Create Block tool.',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false
		),
		'attributes' => array(
			'titolo_carosello' => array(
				'type' => 'string',
				'default' => ''
			),
			'autoplay' => array(
				'type' => 'boolean',
				'default' => true
			),
			'slides' => array(
				'type' => 'array',
				'default' => array(
					array(
						'image' => ''
					)
				)
			)
		),
		'textdomain' => 'adinfo-carusel',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php',
		'viewScript' => 'file:./view.js'
	),
	'adinfo-hero' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'myblocks/adinfo-hero',
		'version' => '0.1.0',
		'title' => 'Adinfo Hero',
		'category' => 'widgets',
		'icon' => 'smiley',
		'description' => 'Example block scaffolded with Create Block tool.',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false
		),
		'attributes' => array(
			'autoplay' => array(
				'type' => 'boolean',
				'default' => true
			),
			'slides' => array(
				'type' => 'array',
				'default' => array(
					array(
						'overline' => '',
						'title' => '',
						'subtitle' => '',
						'backgroundImage' => '',
						'buttonLink' => '',
						'buttonText' => ''
					)
				)
			)
		),
		'textdomain' => 'adinfo-hero',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php',
		'viewScript' => 'file:./view.js'
	),
	'breadcrumbs' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'mytheme/breadcrumbs',
		'version' => '0.1.0',
		'title' => 'Breadcrumbs',
		'category' => 'widgets',
		'icon' => 'smiley',
		'description' => 'Example block scaffolded with Create Block tool.',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false
		),
		'textdomain' => 'breadcrumbs',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php',
		'viewScript' => 'file:./view.js'
	),
	'card' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'myblocks/card',
		'version' => '0.1.0',
		'title' => 'Card',
		'attributes' => array(
			'content' => array(
				'type' => 'string',
				'default' => ''
			),
			'title' => array(
				'type' => 'string',
				'default' => ''
			),
			'image' => array(
				'type' => 'string',
				'default' => 'https://placehold.co/600x450'
			),
			'direction' => array(
				'type' => 'string',
				'default' => 'left'
			),
			'date' => array(
				'type' => 'string',
				'default' => ''
			),
			'badge' => array(
				'type' => 'string',
				'default' => ''
			),
			'linkText' => array(
				'type' => 'string',
				'default' => ''
			)
		),
		'category' => 'widgets',
		'icon' => 'smiley',
		'description' => 'Example block scaffolded with Create Block tool.',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false
		),
		'textdomain' => 'card',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php',
		'viewScript' => 'file:./view.js'
	),
	'customhero' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'myblocks/customhero',
		'version' => '0.1.0',
		'title' => 'Custom Hero',
		'category' => 'widgets',
		'icon' => 'smiley',
		'description' => 'Example block scaffolded with Create Block tool.',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false
		),
		'attributes' => array(
			'autoplay' => array(
				'type' => 'boolean',
				'default' => true
			),
			'slides' => array(
				'type' => 'array',
				'default' => array(
					array(
						'title' => '',
						'subtitle' => '',
						'backgroundImage' => ''
					)
				)
			),
			'icons' => array(
				'type' => 'array',
				'default' => array(
					array(
						'icon' => '',
						'title' => 'Icona 1',
						'url' => ''
					),
					array(
						'icon' => '',
						'title' => 'Icona 2',
						'url' => ''
					),
					array(
						'icon' => '',
						'title' => 'Icona 3',
						'url' => ''
					)
				)
			)
		),
		'textdomain' => 'customhero',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php',
		'viewScript' => 'file:./view.js'
	),
	'indice-pagina' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'myblocks/indice-pagina',
		'version' => '0.1.0',
		'title' => 'Indice Pagina',
		'category' => 'widgets',
		'icon' => 'list-view',
		'description' => 'Mostra un indice delle sezioni con navigazione attiva.',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false
		),
		'textdomain' => 'indice-pagina',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php',
		'viewScript' => 'file:./view.js'
	),
	'modale' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'myblocks/modale',
		'version' => '0.1.0',
		'title' => 'Modale',
		'category' => 'widgets',
		'icon' => 'format-image',
		'description' => 'Example block scaffolded with Create Block tool.',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false,
			'inserter' => true,
			'reusable' => true,
			'anchor' => true,
			'align' => true,
			'alignWide' => true,
			'alignFull' => true,
			'color' => array(
				'background' => true,
				'text' => true,
				'link' => true
			),
			'spacing' => array(
				'padding' => true,
				'margin' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'letterSpacing' => true
			),
			'customClassName' => true,
			'customStyles' => true,
			'customSpacing' => true,
			'customColor' => true,
			'customTypography' => true,
			'customLayout' => true,
			'customDimensions' => true,
			'customPosition' => true,
			'customBorder' => true,
			'customGradient' => true,
			'customUnits' => true,
			'customBackground' => true,
			'customTextColor' => true,
			'customTextShadow' => true,
			'customTextDecoration' => true,
			'customTextTransform' => true
		),
		'textdomain' => 'modale',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php',
		'viewScript' => 'file:./view.js'
	),
	'mycarusel' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'myblocks/mycarusel',
		'version' => '0.1.0',
		'title' => 'Mycarusel',
		'category' => 'widgets',
		'icon' => 'smiley',
		'description' => 'Example block scaffolded with Create Block tool.',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false
		),
		'attributes' => array(
			'postType' => array(
				'type' => 'string',
				'default' => 'post'
			),
			'Maxslides' => array(
				'type' => 'number',
				'default' => 5
			),
			'showTitle' => array(
				'type' => 'boolean',
				'default' => true
			),
			'showExcerpt' => array(
				'type' => 'boolean',
				'default' => false
			),
			'showFeaturedImage' => array(
				'type' => 'boolean',
				'default' => true
			),
			'autoplay' => array(
				'type' => 'boolean',
				'default' => true
			),
			'slidesPerView' => array(
				'type' => 'number',
				'default' => 1
			)
		),
		'textdomain' => 'mycarusel',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php',
		'viewScript' => 'file:./view.js'
	),
	'myhero' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'myblocks/myhero',
		'version' => '0.1.0',
		'title' => 'Myhero',
		'category' => 'widgets',
		'icon' => 'smiley',
		'description' => 'Example block scaffolded with Create Block tool.',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false
		),
		'attributes' => array(
			'autoplay' => array(
				'type' => 'boolean',
				'default' => true
			),
			'slides' => array(
				'type' => 'array',
				'default' => array(
					array(
						'title' => '',
						'subtitle' => '',
						'backgroundImage' => ''
					)
				)
			)
		),
		'textdomain' => 'myhero',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php',
		'viewScript' => 'file:./view.js'
	),
	'search' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'mytheme/search',
		'version' => '0.1.0',
		'title' => 'Search',
		'category' => 'widgets',
		'icon' => 'smiley',
		'description' => 'Example block scaffolded with Create Block tool.',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false
		),
		'textdomain' => 'search',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php',
		'viewScript' => 'file:./view.js'
	)
);
