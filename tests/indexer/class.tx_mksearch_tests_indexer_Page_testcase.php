<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2011 das Medienkombinat GmbH
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

require_once(t3lib_extMgm::extPath('rn_base') . 'class.tx_rnbase.php');
tx_rnbase::load('tx_mksearch_indexer_Page');
tx_rnbase::load('tx_mksearch_model_IndexerDocumentBase');
tx_rnbase::load('tx_mksearch_tests_Util');


require_once(t3lib_extMgm::extPath('mksearch') . 'lib/Apache/Solr/Document.php');

/**
 * Wir müssen in diesem Fall mit der DB testen da wir die pages
 * Tabelle benötigen
 * @author Hannes Bochmann
 */
class tx_mksearch_tests_indexer_Page_testcase extends tx_phpunit_testcase {
	
	public function setUp() {
		//wir brauchen kein tsfe
		$GLOBALS['TSFE'] = null;
	}
	
	public function testPrepareSearchDataSetsDocToDeleted() {
		$indexer = new tx_mksearch_indexer_Page();
		$options = array();
		
		list($extKey, $cType) = $indexer->getContentType();
		$indexDoc = new tx_mksearch_model_IndexerDocumentBase($extKey, $cType);
		
		//is deleted
		$record = array('uid'=> 123, 'pid' => 0, 'deleted' => 1);
		$indexer->prepareSearchData('tt_content', $record, $indexDoc, $options);
		$this->assertEquals(true, $indexDoc->getDeleted(), 'Wrong deleted state for uid '.$record['uid']);

		//is hidden
		$indexDoc = new tx_mksearch_model_IndexerDocumentBase($extKey, $cType);
		$record = array('uid'=> 124, 'pid' => 0, 'deleted' => 0, 'hidden' => 1);
		$indexer->prepareSearchData('tt_content', $record, $indexDoc, $options);
		$this->assertEquals(true, $indexDoc->getDeleted(), 'Wrong deleted state for uid '.$record['uid']);
		
		//everything alright
		$indexDoc = new tx_mksearch_model_IndexerDocumentBase($extKey, $cType);
		$record = array('uid'=> 125, 'pid' => 0, 'deleted' => 0, 'hidden' => 0);
		$indexer->prepareSearchData('tt_content', $record, $indexDoc, $options);
		$this->assertEquals(false, $indexDoc->getDeleted(), 'Wrong deleted state for uid '.$record['uid']);
	}
	
	public function testPrepareSearchDataPreparesTsfe() {
		$this->assertNull($GLOBALS['TSFE'],'TSFE wurde bereits geladen!');
		
		$indexer = new tx_mksearch_indexer_Page();
		$options = array();
		
		list($extKey, $cType) = $indexer->getContentType();
		$indexDoc = new tx_mksearch_model_IndexerDocumentBase($extKey, $cType);
		
		//is deleted
		$record = array('uid'=> 123, 'pid' => 0, 'deleted' => 1);
		$indexer->prepareSearchData('tt_content', $record, $indexDoc, $options);
		
		$this->assertNotNull($GLOBALS['TSFE'],'TSFE wurde nicht geladen!');
	}
}
if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/mksearch/tests/indexer/class.tx_mksearch_tests_indexer_TtContent_testcase.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/mksearch/tests/indexer/class.tx_mksearch_tests_indexer_TtContent_testcase.php']);
}

?>