<?php

/**
 * Contao Cookiebot extension
 *
 * @copyright 2019 ETES GmbH
 * @license LGPLv3
 */

declare(strict_types=1);

namespace Systemhaus\Cookiebot;

use Contao\PageModel;

/**
 * Insert the Cookiebot JS first place in the page <head>
 */
class CookieAcceptBanner
{
    const JS_STRING = '<script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="%s" type="text/javascript" %s%s></script>';

    public function insertJavascriptIntoFullPage($strBuffer, $strTemplate)
    {
        if (false === strpos($strTemplate, 'fe_', 0)) {
            return $strBuffer;
        }

        global $objPage;
        if (($objRootPage = PageModel::findByPk($objPage->rootId)) !== null && $objRootPage->cookiebot_active && $objRootPage->cookiebot_show_banner) {
            $api_key = $objRootPage->cookiebot_api_key;
            if ($api_key !== null) {
                $blockingmode = '';
                if ((int)$objRootPage->cookiebot_blockingmode_auto === 1) {
                    $blockingmode = 'data-blockingmode="auto"';
                }
                $culture = '';
                if (!empty($objRootPage->cookiebot_culture)) {
                    $culture = ' data-culture="'.$objRootPage->cookiebot_culture.'"';
                }
                $html = sprintf(self::JS_STRING, $api_key, $blockingmode, $culture);
                $strBuffer = str_replace(
                    '</title>',
                    "</title>\n$html",
                    $strBuffer
                );
            }
        }
        return $strBuffer;
    }
}
