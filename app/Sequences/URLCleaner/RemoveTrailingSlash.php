<?php

namespace Midbound\Sequences\URLCleaner;

/**
 * Class RemoveTrailingSlash
 * @package Midbound\Strategies\URLCleaner
 */
class RemoveTrailingSlash
{
    /**
     * @param string $url
     * @return string
     */
    public function apply(string $url)
    {
        $elements = $this->explode($url);

        $elements['path'] = rtrim($elements['path'], '/');

        return $this->rebuild($elements);
    }

    /**
     * @param string $url
     * @return array
     */
    public function explode(string $url)
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