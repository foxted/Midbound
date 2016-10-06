<?php

namespace Midbound\Sequences\URLCleaner;

/**
 * Class RemoveUnwantedQueryParams
 * @package Midbound\Strategies\URLCleaner
 */
class RemoveUnwantedQueryParams
{
    /**
     * @var array
     */
    protected $unwanted = [
        'utm_*'
    ];

    /**
     * @param string $url
     * @return string
     */
    public function apply(string $url)
    {
        $elements = $this->explode($url);

        $elements['query'] = $this->filterQueryParams($elements);

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
     * @param array $url
     * @return array
     */
    protected function filterQueryParams(array $url)
    {
        $queryParams = explode('&', $url['query'] ?? []);

        $queryParams = array_filter($queryParams, function($param) {
            $param = explode('=', $param);

            foreach($this->unwanted as $pattern) {
                $pattern = str_replace('*', '\\w*', $pattern);
                if(preg_match("/{$pattern}/", $param[0])) {
                    return null;
                };
            }

            return $param;
        });

        return implode('&', $queryParams);
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