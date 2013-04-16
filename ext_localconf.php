<?php



/**
 * Hook log blocked logins
 */
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_userauth.php']['postUserLookUp'][] = 'tx_Loginprotection_Hooks_T3libUserauthPostUserLookUpHook->main';

/**
 * Hook to block access to login if possible
 */
	# Backend for 6.0 hook
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['GLOBAL']['extTablesInclusion-PostProcessing'][]      = 'tx_Loginprotection_Hooks_BootstrapExtTablesInclusionPostProcessing';

	# Frontend for 6.0 hook
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_fe.php']['connectToDB'][]          = 'tx_Loginprotection_Hooks_TslibFeConnectToDBHook->main';