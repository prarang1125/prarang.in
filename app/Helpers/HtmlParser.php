<?php

if (!function_exists('parseToHtml')) {
    /**
     * Parse plain text to HTML using TextToHtmlParser
     *
     * @param string $text
     * @return string HTML formatted text
     */
    function parseToHtml($text)
    {
        return \App\Services\TextToHtmlParser::parse($text);
    }
}

if (!function_exists('parseMarkdown')) {
    /**
     * Parse markdown text to HTML
     *
     * @param string $text
     * @return string HTML formatted text
     */
    function parseMarkdown($text)
    {
        return \App\Services\TextToHtmlParser::parseMarkdown($text);
    }
}
