<?php

namespace App\Services;

class TextToHtmlParser
{
  /**
   * Convert plain text to formatted HTML
   * Handles:
   * - Headers (numbered, asterisks, bold, markdown style)
   * - Bullet points and nested lists
   * - Numbered lists
   * - Tables (markdown and pipe-delimited)
   * - Code blocks
   * - Bold, italic, links
   * - Blockquotes
   * - Line breaks
   */
  public static function parse($text)
  {
    if (empty($text)) {
      return '';
    }

    // Preserve HTML tags that come from AI responses
    $preserveTags = ['<strong>', '</strong>', '<em>', '</em>', '<br>', '<p>', '</p>', '<ul>', '</ul>', '<li>', '</li>', '<table>', '</table>', '<tr>', '</tr>', '<td>', '</td>', '<th>', '</th>', '<code>', '</code>', '<pre>', '</pre>'];
    $placeholders = [];

    // Replace tags temporarily with placeholders to preserve them
    foreach ($preserveTags as $tag) {
      $placeholder = '###PLACEHOLDER_' . count($placeholders) . '###';
      $text = str_replace($tag, $placeholder, $text);
      $placeholders[$placeholder] = $tag;
    }

    $html = '';
    $lines = explode("\n", $text);
    $inTable = false;
    $inList = false;
    $inNumberedList = false;
    $inCodeBlock = false;
    $inBlockquote = false;

    $i = 0;
    while ($i < count($lines)) {
      $line = $lines[$i];
      $trimmed = trim($line);
      $i++;

      // Skip empty lines but add spacing
      if (empty($trimmed)) {
        if ($inList) {
          $html .= "</ul>\n";
          $inList = false;
        }
        if ($inNumberedList) {
          $html .= "</ol>\n";
          $inNumberedList = false;
        }
        if ($inBlockquote) {
          $html .= "</blockquote>\n";
          $inBlockquote = false;
        }
        $html .= "<br>\n";
        continue;
      }

      // Handle code blocks (triple backticks)
      if (strpos($trimmed, '```') === 0) {
        if ($inCodeBlock) {
          $html .= "</code></pre>\n";
          $inCodeBlock = false;
        } else {
          $html .= "<pre><code>\n";
          $inCodeBlock = true;
        }
        continue;
      }

      if ($inCodeBlock) {
        $html .= htmlspecialchars($trimmed) . "\n";
        continue;
      }

      // Handle blockquotes (lines starting with >)
      if (strpos($trimmed, '>') === 0) {
        if (!$inBlockquote) {
          $html .= "<blockquote style='border-left: 4px solid #ddd; padding-left: 15px; margin: 15px 0; color: #666;'>\n";
          $inBlockquote = true;
        }
        $content = substr($trimmed, 1);
        $content = self::parseInlineFormatting(trim($content));
        $html .= "<p>" . $content . "</p>\n";
        continue;
      } elseif ($inBlockquote) {
        $html .= "</blockquote>\n";
        $inBlockquote = false;
      }

      // Handle tables (lines with |)
      if (strpos($trimmed, '|') !== false && !preg_match('/^\s*\*\*/', $trimmed)) {
        $html .= self::parseTableRow($trimmed, $inTable);
        $inTable = true;
        continue;
      } elseif ($inTable && strpos($trimmed, '|') === false) {
        $html .= "</table>\n";
        $inTable = false;
      }

      // Handle headers (markdown style #, numbered, or bold pattern)
      if (preg_match('/^(#{1,6})\s+(.+)/', $trimmed, $matches)) {
        if ($inList) {
          $html .= "</ul>\n";
          $inList = false;
        }
        if ($inNumberedList) {
          $html .= "</ol>\n";
          $inNumberedList = false;
        }
        $level = strlen($matches[1]);
        $level = min($level, 6);
        $content = self::parseInlineFormatting($matches[2]);
        $html .= "<h{$level}>" . $content . "</h{$level}>\n";
        continue;
      }

      // Handle headers with pattern like "1. Header" or "**Header**"
      if (preg_match('/^(\d+\.|###|\*\*)\s+(.+?)(\*\*)?$/', $trimmed, $matches)) {
        if ($inList) {
          $html .= "</ul>\n";
          $inList = false;
        }
        if ($inNumberedList) {
          $html .= "</ol>\n";
          $inNumberedList = false;
        }
        $content = $matches[2] ?? $trimmed;
        $content = self::parseInlineFormatting($content);
        $html .= "<h3><strong>" . $content . "</strong></h3>\n";
        continue;
      }

      // Handle numbered lists (lines starting with 1., 2., etc)
      if (preg_match('/^\d+\.\s+(.+)/', $trimmed, $matches)) {
        if ($inList) {
          $html .= "</ul>\n";
          $inList = false;
        }
        if (!$inNumberedList) {
          $html .= "<ol style='margin-left: 20px;'>\n";
          $inNumberedList = true;
        }
        $content = $matches[1];
        $content = self::parseInlineFormatting($content);
        $html .= "<li>" . $content . "</li>\n";
        continue;
      } elseif ($inNumberedList && !preg_match('/^\d+\./', $trimmed)) {
        $html .= "</ol>\n";
        $inNumberedList = false;
      }

      // Handle bullet points and lists (*, -, •)
      if (preg_match('/^(\s*)(\*|-|\•|\+)\s+(.+)/', $line, $matches)) {
        $indent = strlen($matches[1]);
        $content = $matches[3];

        if ($indent === 0) {
          if (!$inList) {
            $html .= "<ul style='margin-left: 20px;'>\n";
            $inList = true;
          }
          $content = self::parseInlineFormatting($content);
          $html .= "<li>" . $content . "</li>\n";
        } else {
          // Nested list
          if (!$inList) {
            $html .= "<ul style='margin-left: 20px;'>\n";
            $inList = true;
          }
          $content = self::parseInlineFormatting($content);
          $html .= "<li style='margin-left: " . ($indent * 15) . "px;'>" . $content . "</li>\n";
        }
        continue;
      } elseif ($inList && !preg_match('/^(\s*)(\*|-|\•|\+)\s+/', $line)) {
        $html .= "</ul>\n";
        $inList = false;
      }

      // Handle regular paragraphs
      $content = self::parseInlineFormatting($trimmed);
      $html .= "<p>" . $content . "</p>\n";
    }

    // Close any open tags
    if ($inList) {
      $html .= "</ul>\n";
    }
    if ($inNumberedList) {
      $html .= "</ol>\n";
    }
    if ($inTable) {
      $html .= "</table>\n";
    }
    if ($inBlockquote) {
      $html .= "</blockquote>\n";
    }
    if ($inCodeBlock) {
      $html .= "</code></pre>\n";
    }

    // Restore placeholders back to HTML tags
    foreach ($placeholders as $placeholder => $tag) {
      $html = str_replace($placeholder, $tag, $html);
    }

    return $html;
  }

  /**
   * Parse table rows
   */
  private static function parseTableRow($line, $isHeader = false)
  {
    $cells = array_map('trim', explode('|', $line));
    $cells = array_filter($cells); // Remove empty cells

    // Detect if this is a separator row
    $isSeparator = true;
    foreach ($cells as $cell) {
      if (!preg_match('/^-+$/', $cell) && !preg_match('/^:-+:?$/', $cell) && !preg_match('/^-+:$/', $cell)) {
        $isSeparator = false;
        break;
      }
    }

    if ($isSeparator) {
      return ''; // Skip separator rows
    }

    $tag = $isHeader ? 'th' : 'td';
    $row = "<tr>";

    foreach ($cells as $cell) {
      // Parse inline formatting within cells
      $cellContent = self::parseInlineFormatting($cell);
      $row .= "<{$tag}>" . $cellContent . "</{$tag}>";
    }

    $row .= "</tr>\n";

    // Start table if first row
    if (!$isHeader) {
      $row = "<table border='1' cellpadding='12' cellspacing='0' style='width: 100%; border-collapse: collapse; margin: 15px 0;'>\n" . $row;
    }

    return $row;
  }

  /**
   * Parse inline formatting (bold, italic, links, code, etc.)
   */
  private static function parseInlineFormatting($text)
  {
    // First escape HTML but preserve certain tags
    $text = htmlspecialchars($text, ENT_QUOTES, 'UTF-8');

    // Unescape already valid HTML tags that we want to preserve
    $text = str_replace('&lt;strong&gt;', '<strong>', $text);
    $text = str_replace('&lt;/strong&gt;', '</strong>', $text);
    $text = str_replace('&lt;em&gt;', '<em>', $text);
    $text = str_replace('&lt;/em&gt;', '</em>', $text);
    $text = str_replace('&lt;br&gt;', '<br>', $text);
    $text = str_replace('&lt;br/&gt;', '<br/>', $text);
    $text = str_replace('&lt;p&gt;', '<p>', $text);
    $text = str_replace('&lt;/p&gt;', '</p>', $text);
    $text = str_replace('&lt;code&gt;', '<code>', $text);
    $text = str_replace('&lt;/code&gt;', '</code>', $text);

    // Bold: **text** or __text__ (greedy)
    $text = preg_replace('/\*\*(.+?)\*\*/', '<strong>$1</strong>', $text);
    $text = preg_replace('/__(.+?)__/', '<strong>$1</strong>', $text);

    // Italic: *text* or _text_ (but not inside words)
    $text = preg_replace('/(?<!\w)\*([^\*]+?)\*(?!\w)/', '<em>$1</em>', $text);
    $text = preg_replace('/(?<!\w)_([^_]+?)_(?!\w)/', '<em>$1</em>', $text);

    // Links: [text](url)
    $text = preg_replace('/\[([^\]]+?)\]\(([^\)]+?)\)/', '<a href="$2" target="_blank" style="color: #0066cc; text-decoration: underline;">$1</a>', $text);

    // Inline code: `code`
    $text = preg_replace('/`([^`]+?)`/', '<code style="background-color: #f5f5f5; padding: 2px 5px; border-radius: 3px; font-family: monospace;">$1</code>', $text);

    return $text;
  }

  /**
   * Parse markdown-like syntax
   */
  public static function parseMarkdown($text)
  {
    return self::parse($text);
  }

  /**
   * Strip HTML tags and return plain text
   */
  public static function stripHtml($html)
  {
    $text = strip_tags($html);
    return html_entity_decode($text, ENT_QUOTES, 'UTF-8');
  }
}
