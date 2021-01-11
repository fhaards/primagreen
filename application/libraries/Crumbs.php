<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
class Crumbs
{
    private $breadcrumbs = array();
    private $separator = ' &nbsp; / &nbsp; ';
    private $start = '<ol id="breadcrumb" class="breadcrumb flex flex-row text-xs font-semibold text-gray-500 space-x-2">';
    private $end = '</ol>';
    
    public function __construct($params = array())
    {
        if (count($params) > 0) {
            $this->initialize($params);
        }
    }
    
    private function initialize($params = array())
    {
        if (count($params) > 0) {
            foreach ($params as $key => $val) {
                if (isset($this->{'_' . $key})) {
                    $this->{'_' . $key} = $val;
                }
            }
        }
    }
    
    function add($title, $href)
    {
        if (!$title OR !$href)
            return;
        
        $this->breadcrumbs[] = array(
            'title' => $title,
            'href' => $href
        );
    }
    
    function output()
    {
        if ($this->breadcrumbs) {
            $output = $this->start;
            $output .= '<li><a href="'.base_url("dashboard").'" class="hover:text-gray-700 hover:underline"> Home  </a></li>';
            $output .= $this->separator;
            foreach ($this->breadcrumbs as $key => $crumb) {
                if ($key) {
                    $output .= $this->separator;
                }
                $lastBreadcrumb=(array_keys($this->breadcrumbs));
                if (end($lastBreadcrumb) == $key) {
                    $output .= '<li class="text-green-500 font-bold"><span>' . $crumb['title'] . '</span><li>';
                } else {
                    $output .= '<li><a href="' . $crumb['href'] . '" class="hover:text-gray-700 hover:underline">' . $crumb['title'] . '</a><li>';
                }
            }
            return $output . $this->end . PHP_EOL;
        }
        return '';
    }
}