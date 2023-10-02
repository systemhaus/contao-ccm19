<?php

/**
 * Contao CCM19 extension
 *
 * @copyright 2019 ETES GmbH
 * @license LGPLv3
 */

declare(strict_types=1);

namespace Systemhaus\Ccm19\Modules;

use Contao\BackendTemplate;
use Contao\FrontendTemplate;
use Contao\Module;
use Contao\PageModel;

/**
 * Frontend module for displaying the CCM19 details in a privacy page
 */
class CookieDeclaration extends Module
{
    protected $strTemplate = 'mod_ccm19_declaration';

    public function generate()
    {
        if (TL_MODE === 'BE') {
            $objTemplate = new BackendTemplate('be_wildcard');
            $objTemplate->wildcard = '###' . utf8_strtoupper($GLOBALS['TL_LANG']['FMD']['ccm19_declaration'][0] . '###');
            $objTemplate->id = $this->id;
            $objTemplate->link = $this->name;
            $objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;
            return $objTemplate->parse();
        }

        return parent::generate();
    }

    protected function compile()
    {
        global $objPage;

        if (($objRootPage = PageModel::findByPk($objPage->rootId)) !== null) {
            if ($this->ccm19_declaration_template && $this->ccm19_declaration_template !== 'mod_ccm19_declaration') {
                $this->Template = new FrontendTemplate($this->ccm19_declaration_template);
            }

            $additional_classes = 'mod_ccm19';

            $this->Template->additional_classes = $additional_classes;
            $this->Template->active = $objRootPage->ccm19_active;
        }
    }
}
