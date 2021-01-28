/* global gspes */
import { registerPlugin } from '@wordpress/plugins';
import { PluginDocumentSettingPanel } from '@wordpress/edit-post';
import {
	ClipboardButton,
	TextControl
} from '@wordpress/components';
import { withState } from '@wordpress/compose';

const GutenbergShortlinkPanel = withState( {
	hasCopied: false,
} )( ( { hasCopied, setState } ) => (
    <PluginDocumentSettingPanel
        name="shortlink-panel"
        title="Shortlink"
        className="shortlink-panel"
    >
		<TextControl
			label="Shortlink"
			hideLabelFromVision="true"
			value={ gspes.shortlink }
			disabled
		/>
		<ClipboardButton
			isPrimary
			text={ gspes.shortlink }
			onCopy={ () => setState( { hasCopied: true } ) }
			onFinishCopy={ () => setState( { hasCopied: false } ) }
		>
			{ hasCopied ? 'Copied!' : 'Copy link' }
		</ClipboardButton>
    </PluginDocumentSettingPanel>
) );
 
registerPlugin( 'plugin-document-setting-panel-demo', {
    render: GutenbergShortlinkPanel,
    icon: '',
} );
