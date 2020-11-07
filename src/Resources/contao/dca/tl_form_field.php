<?php

/*
 * This file is part of the CssStyleSelector Bundle.
 *
 * (c) Daniel Kiesel <https://github.com/iCodr8>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Contao\CoreBundle\DataContainer\PaletteManipulator;
use Craffft\CssStyleSelectorBundle\DCA\Field\CssStyleSelector;

if (isset($GLOBALS['TL_DCA']['tl_form_field'])) {
    if (isset($GLOBALS['TL_DCA']['tl_form_field']['palettes'])) {
        foreach ($GLOBALS['TL_DCA']['tl_form_field']['palettes'] as $k => $v) {
            if ($k === '__selector__') {
                continue;
            }

            PaletteManipulator::create()
                ->addField('cssStyleSelector', 'class', PaletteManipulator::POSITION_PREPEND)
                ->applyToPalette($k, 'tl_form_field');
        }
    }

    $GLOBALS['TL_DCA']['tl_form_field']['fields']['cssStyleSelector'] = CssStyleSelector::getFieldConfig();
}
