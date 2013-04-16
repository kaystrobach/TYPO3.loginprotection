<?php

class tx_Loginprotection_Hooks_T3libUserauthPostUserLookUpHook {
	function main($params, &$pObj) {

		$mode     = null;
		$failed   = false;
		$userData = $pObj->getLoginFormData();;

		if(array_key_exists('BE_USER', $GLOBALS)) {
			if($GLOBALS['BE_USER']->loginFailure) {
				$mode     = 'BE';
				$failed   = TRUE;
			}
		}
		if(array_key_exists('TSFE', $GLOBALS)) {
			if(($GLOBALS['TSFE']->fe_user->loginFailure) && (strlen($userData['uname']) > 0)) {
				$mode     = 'FE';
				$failed   = TRUE;
			}
		}

		if($failed) {
			$this->logFailedTry($_SERVER['REMOTE_ADDR'], $mode, $userData);
		}
	}

	protected function logFailedTry($ip, $mode, $userData) {
		$GLOBALS['TYPO3_DB']->exec_INSERTquery(
			'tx_loginprotection_failedlogins',
			array(
				'pid'      => 0,
				'ip'       => $ip,
				'mode'     => $mode,
				'tstamp'   => time(),
				'username' => $userData['uname']
			)
		);
	}
}