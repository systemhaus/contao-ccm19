<?php

/**
 * Contao CCM19 extension
 *
 * @copyright 2019 ETES GmbH
 * @license LGPLv3
 */

declare(strict_types=1);

namespace Systemhaus\Ccm19\Modules;

use Contao\Backend;

class ModCookieDeclaration extends Backend
{

    /**
     * Return custom ccm19 declaration templates as array
     *
     * @return array
     */
    public function getCcm19DeclarationTemplates()
    {
        return $this->getTemplateGroup('mod_ccm19_declaration_');
    }
}
