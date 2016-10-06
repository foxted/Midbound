<?php

namespace Midbound\Sequences\URLCleaner;

/**
 * Class FormatURL
 * @package Midbound\Strategies\URLCleaner
 */
class FormatURL
{
    /**
     * @param string $url
     * @return string
     */
    public function apply(string $url)
    {
        if(empty($url)) {
            return $url;
        }

        $elements = $this->explode($url);

        return $this->rebuild($elements);
    }

    /**
     * @param string $url
     * @return array
     */
    protected function explode(string $url)
    {
        $elements = ['host' => '', 'path' => '', 'query' => ''];

        return array_merge($elements, parse_url($url));
    }

    /**
     * @param array $elements
     * @return string
     */
    protected function rebuild(array $elements)
    {
        $newUrl = "{$elements['host']}{$elements['path']}";

        if(!empty($elements['query'])) {
            $newUrl .= "?{$elements['query']}";
        }

        return $newUrl;
    }
}