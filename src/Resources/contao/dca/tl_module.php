<?php

/**
 * Contao CCM19 extension
 *
 * @copyright 2019 ETES GmbH
 * @license LGPLv3
 */

declare(strict_types=1);

/**
 * New DCA palette for the CCM19 fields
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['ccm19_declaration'] = '{title_legend},name,headline,type;{template_legend:hide},ccm19_declaration_template;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID';


$GLOBALS['TL_DCA']['tl_module']['fields']['ccm19_declaration_template'] = [
    'label_'           => &$GLOBALS['TL_LANG']['tl_module']['ccm19_declaration_template'],
    'exclude'          => true,
    'inputType'        => 'select',
    'options_callback' => array('Systemhaus\Ccm19\Modules\ModCookieDeclaration', 'getCcm19DeclarationTemplates'),
    'eval'             => array('includeBlankOption'=>true, 'chosen'=>true, 'tl_class' => 'w50'),
    'sql'              => "varchar(64) NOT NULL default ''",
];
