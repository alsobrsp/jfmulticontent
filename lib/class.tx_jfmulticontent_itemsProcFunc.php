<?php/*************************************************************** *  Copyright notice * *  (c) 2009 Juergen Furrer <juergen.furrer@gmail.com> *  All rights reserved * *  This script is part of the TYPO3 project. The TYPO3 project is *  free software; you can redistribute it and/or modify *  it under the terms of the GNU General Public License as published by *  the Free Software Foundation; either version 2 of the License, or *  (at your option) any later version. * *  The GNU General Public License can be found at *  http://www.gnu.org/copyleft/gpl.html. * *  This script is distributed in the hope that it will be useful, *  but WITHOUT ANY WARRANTY; without even the implied warranty of *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the *  GNU General Public License for more details. * *  This copyright notice MUST APPEAR in all copies of the script! ***************************************************************/require_once (PATH_t3lib . 'class.t3lib_page.php');/** * 'itemsProcFunc' for the 'jfmulticontent' extension. * * @author     Juergen Furrer <juergen.furrer@gmail.com> * @package    TYPO3 * @subpackage tx_jfmulticontent */class tx_jfmulticontent_itemsProcFunc{	/**	 * Get defined Class inner for dropdown	 * @return array	 */	function getClassInner($config, $item)	{		$confArr = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['jfmulticontent']);		$items = t3lib_div::trimExplode(",", $confArr['classInner']);		if (count($items) < 1) {			$items = array('','16','20','25','33','38','40','50','60','62','66','75','80');		}		$optionList = array();		foreach ($items as $item) {			$optionList[] = array(				trim($item),				trim($item)			);		}		$config['items'] = array_merge($config['items'], $optionList);		return $config;	}	/**	 * Get all themes for anythingSlider	 * @return array	 */	function getAnythingSliderThemes($config, $item)	{		$confArr = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['jfmulticontent']);		if (! is_dir(t3lib_div::getFileAbsFileName($confArr['anythingSliderThemeFolder']))) {			// if the defined folder does not exist, define the default folder			$confArr['anythingSliderThemeFolder'] = "EXT:jfmulticontent/res/anythingslider/themes/";		}		$items = t3lib_div::get_dirs(t3lib_div::getFileAbsFileName($confArr['anythingSliderThemeFolder']));		if (count($items) > 0) {			$optionList = array();			foreach ($items as $key => $item) {				$item = trim($item);				if (! preg_match('/^\./', $item)) {					$optionList[] = array(						$item,						$item					);				}			}			$config['items'] = array_merge($config['items'], $optionList);		}		return $config;	}	/**	 * Get all skins for easyAccordion	 * @return array	 */	function getEasyaccordionSkin($config, $item)	{		$confArr = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['jfmulticontent']);		if (! is_dir(t3lib_div::getFileAbsFileName($confArr['easyAccordionSkinFolder']))) {			// if the defined folder does not exist, define the default folder			$confArr['easyAccordionSkinFolder'] = "EXT:jfmulticontent/res/easyaccordion/skins/";		}		$items = t3lib_div::get_dirs(t3lib_div::getFileAbsFileName($confArr['easyAccordionSkinFolder']));		if (count($items) > 0) {			$optionList = array();			foreach ($items as $key => $item) {				$item = trim($item);				if (! preg_match('/^\./', $item)) {					$optionList[] = array(						ucfirst($item),						$item					);				}			}			$config['items'] = array_merge($config['items'], $optionList);		}		return $config;	}}if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/jfmulticontent/lib/class.tx_jfmulticontent_itemsProcFunc.php']) {	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/jfmulticontent/lib/class.tx_jfmulticontent_itemsProcFunc.php']);}?>