<?php

/**
 * Contao CCM19 extension
 *
 * @copyright 2019 ETES GmbH
 * @license LGPLv3
 */

declare(strict_types=1);

use Contao\CoreBundle\DataContainer\PaletteManipulator;

$GLOBALS['TL_DCA']['tl_page']['palettes']['__selector__'][] = 'ccm19_active';
$GLOBALS['TL_DCA']['tl_page']['subpalettes']['ccm19_active'] = 'ccm19_code_snippet';

$GLOBALS['TL_DCA']['tl_page']['fields']['ccm19_active'] = array(
    'label' => &$GLOBALS['TL_LANG']['tl_page']['ccm19_active'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => array('submitOnChange' => true),
    'sql' => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_page']['fields']['ccm19_code_snippet'] = array(
    'label' => &$GLOBALS['TL_LANG']['tl_page']['ccm19_code_snippet'],
    'exclude' => true,
    'search' => true,
    'inputType' => 'textarea',
    'eval' => array('decodeEntities' => true, 'tl_class' => 'w100', 'rte' => 'ace|html'),
    'sql' => "text default ''"
);

if (isset($GLOBALS['TL_DCA']['tl_page']['palettes']['rootfallback'])) {
    PaletteManipulator::create()
        ->addLegend('ccm19_legend', 'publish_legend', PaletteManipulator::POSITION_BEFORE)
        ->addField('ccm19_active', 'ccm19_legend', PaletteManipulator::POSITION_APPEND)
        ->applyToPalette('root', 'tl_page')
        ->applyToPalette('rootfallback', 'tl_page')
    ;
} else {
    PaletteManipulator::create()
        ->addLegend('ccm19_legend', 'publish_legend', PaletteManipulator::POSITION_BEFORE)
        ->addField('ccm19_active', 'ccm19_legend', PaletteManipulator::POSITION_APPEND)
        ->applyToPalette('root', 'tl_page')
    ;
}
