<?php

class tx_Loginprotection_Hooks_TslibFeConnectToDBHook {
	function main($params, &$pObj) {
		try {
			$hits = $GLOBALS['TYPO3_DB']->exec_SELECTcountRows(
				'*',
				'tx_loginprotection_failedlogins',
				'ip = ' . $GLOBALS['TYPO3_DB']->fullQuoteStr($_SERVER['REMOTE_ADDR'], 'tx_loginprotection_failedlogins')
			);
			if($hits >= 3) {
				if(TYPO3_MODE === 'BE') {
					throw new Exception('Sry, dude you´re not allowed to login -.-' . TYPO3_MODE);
				} elseif((TYPO3_MODE === 'FE') && (t3lib_div::_GP('logintype') === 'login')) {
					throw new Exception('Sry, dude you´re not allowed to login -.-' . TYPO3_MODE);
				}
			}
		} catch(Exception $e) {
			$view = t3lib_div::makeInstance('Tx_Fluid_View_StandaloneView');
			$view->setTemplatePathAndFilename(t3lib_extMgm::extPath('loginprotection') . 'Resources/Private/Templates/Hooks/TslibFeConnectToDBHook/main.html');
			$view->assign('key', 'value');
			print $view->render();
			die();
		}
	}
}