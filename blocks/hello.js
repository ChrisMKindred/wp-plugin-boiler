import { registerBlockType } from "@wordpress/blocks";
import { __ } from "@wordpress/i18n";

registerBlockType( 'boiler/hello', {
	title: __( 'Hello' ),
	icon: 'heart',
	category: 'common',
	keywords: [ __( 'hello' ), __( 'gutenberg' ) ],
	attributes: {},
	edit: ( { attributes, setAttributes } ) => {
		return(
			<h2>Hello!</h2>
		)
	},
	save: ( { attributes } ) => {
		return(
			<h2>Hello!</h2>
		)
	}
});