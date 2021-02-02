<?php

if (!defined('BASEPATH'))  exit('No direct script access allowed');

class Components
{
    public function isButtonSubmit($type, $color, $icon, $textBtn)
    {
        $getType = $this->setType($type);
        $getColor = $this->setColor($color);
        $getSvg = $this->setSvg($icon);
        $output = "<button type='submit' class='flex space-x-2 rounded-md font-bold items-center text-white transition-colors duration-150 $getType $getColor'>";
        $output .= "<div class=''>$getSvg</div>";
        $output .= "<span class=''>$textBtn</span>";
        $output .= "</button>";
        return $output;
    }

    public function isHref($type, $color, $icon, $textBtn, $target)
    {
        $getType = $this->setType($type);
        $getColor = $this->setColor($color);
        $getSvg = $this->setSvg($icon);
        $setTarget = base_url($target);
        $output = "<a href='$setTarget' class='flex space-x-2 rounded-md font-bold items-center text-white transition-colors duration-150 $getType $getColor'>";
        $output .= "<div class=''>$getSvg</div>";
        $output .= "<span class=''>$textBtn</span>";
        $output .= "</a>";
        return $output;
    }

    public function setColor($color)
    {
        if ($color == "colorPrimary") {
            $isColor = "bg-gray-800 active:bg-gray-900 hover:shadow-none hover:bg-gray-900 focus:outline-none focus:shadow-outline-gray";
        } else if ($color == "colorDelete") {
            $isColor = "bg-red-600 active:bg-red-800 hover:shadow-none hover:bg-red-700 focus:outline-none focus:shadow-outline-red";
        } else {
            $isColor = "bg-gray-100";
        }
        return $isColor;
    }

    public function setType($type)
    {
        if ($type == "typeStandard") {
            $isType = "px-4 py-2";
        } else if ($type == "typeStandard-full") {
            $isType = "px-4 py-2 w-full";
        } else if ($type == "typeSmall") {
            $isType = "px-1 py-1";
        } else {
            $isType = "";
        }

        return $isType;
    }

    public function setSvg($svg)
    {
        if ($svg == "iconAdd") {
            $setSvg = '<svg class="w-4 h-4" fill="" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>';
        } else if ($svg == "iconFilter") {
            $setSvg = '<svg class="w-4 h-4" fill="" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>';
        } else if ($svg == "iconSubmit") {
            $setSvg = '<svg class="w-4 h-4" fill="" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                    </svg>';
        } else {
            $setSvg = '';
        }
        return $setSvg;
    }
}
