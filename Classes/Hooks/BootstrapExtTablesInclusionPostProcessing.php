<?php

class tx_Loginprotection_Hooks_BootstrapExtTablesInclusionPostProcessing implements TYPO3\CMS\Core\Database\TableConfigurationPostProcessingHookInterface {
	public function processData() {
		$hits = $GLOBALS['TYPO3_DB']->exec_SELECTcountRows(
			'*',
			'tx_loginprotection_failedlogins',
			'ip = ' . $GLOBALS['TYPO3_DB']->fullQuoteStr($_SERVER['REMOTE_ADDR'], 'tx_loginprotection_failedlogins')
		);
		if($hits >= 3) {
			if(TYPO3_MODE === 'BE') {
				throw new Exception('Sry, dude you´re not allowed to login -.-' . TYPO3_MODE);
			}
		}
	}
}