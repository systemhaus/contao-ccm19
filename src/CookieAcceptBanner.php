<?php

/**
 * Contao CCM19 extension
 *
 * @copyright 2019 ETES GmbH
 * @license LGPLv3
 */

declare(strict_types=1);

namespace Systemhaus\Ccm19;

use Contao\PageModel;

/**
 * Insert the CCM19 JS first place in the page <head>
 */
class CookieAcceptBanner
{
    public function insertJavascriptIntoFullPage($strBuffer, $strTemplate)
    {
        if (false === strpos($strTemplate, 'fe_', 0)) {
            return $strBuffer;
        }

        global $objPage;
        if (($objRootPage = PageModel::findByPk($objPage->rootId)) !== null && $objRootPage->ccm19_active) {
            $api_key = $objRootPage->ccm19_code_snippet;
            if ($api_key !== null) {
                $strBuffer = str_replace(
                    '</title>',
                    "</title>\n".str_replace('[&]', '&', $objRootPage->ccm19_code_snippet),
                    $strBuffer
                );
            }
        }
        return $strBuffer;
    }
}
