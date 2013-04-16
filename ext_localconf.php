<?php

/**
 * Hook to block access if needed! requires TYPO3 CMS 6.0
 */
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['GLOBAL']['extTablesInclusion-PostProcessing'][]      = 'tx_Loginprotection_Hooks_BootstrapExtTablesInclusionPostProcessing';

/**
 * Hook log blocked logins
 */
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_userauth.php']['postUserLookUp'][] = 'tx_Loginprotection_Hooks_T3libUserauthPostUserLookUpHook->main';