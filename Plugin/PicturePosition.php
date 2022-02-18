<?php
/**
 * @author magefast@gmail.com www.magefast.com
 */

declare(strict_types=1);

namespace Strekoza\FixPicturePosition\Plugin;

use Magento\Catalog\Block\Adminhtml\Product\Helper\Form\Gallery;

/**
 *
 */
class PicturePosition
{
    /**
     * @param Gallery $subject
     * @param $return
     * @return mixed
     */
    public function afterGetImages(Gallery $subject, $return)
    {
        $checkPosition = [];
        foreach ($return['images'] as $key => $value) {
            $position = intval($value['position']);
            while (isset($checkPosition[$position])) {
                $position = $position + 1;
            }

            $return['images'][$key]['position'] = $position;
            $checkPosition[$position] = $position;
        }

        return $return;
    }
}