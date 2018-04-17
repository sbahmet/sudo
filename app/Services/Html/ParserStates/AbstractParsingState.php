<?php

namespace App\Services\Html\ParserStates;


abstract class AbstractParsingState implements ParsingState
{

    public function textNode()
    {
        throw new \DomainException(static::class . ' -> ' . __METHOD__);
    }

    public function probablyOpenTag()
    {
        throw new \DomainException(static::class . ' -> ' . __METHOD__);
    }

    public function tagNameStart()
    {
        throw new \DomainException(static::class . ' -> ' . __METHOD__);
    }

    public function tagNameEnd()
    {
        throw new \DomainException(static::class . ' -> ' . __METHOD__);
    }

    public function probablyTagEnd()
    {
        throw new \DomainException(static::class . ' -> ' . __METHOD__);
    }

    public function tagEnd()
    {
        throw new \DomainException(static::class . ' -> ' . __METHOD__);
    }

    public function closingTag()
    {
        throw new \DomainException(static::class . ' -> ' . __METHOD__);
    }

    public function AttrNameStart()
    {
        throw new \DomainException(static::class . ' -> ' . __METHOD__);
    }

    public function attrNameEnd()
    {
        throw new \DomainException(static::class . ' -> ' . __METHOD__);
    }

    public function attrValueStart()
    {
        throw new \DomainException(static::class . ' -> ' . __METHOD__);
    }

    public function attrValueEnd()
    {
        throw new \DomainException(static::class . ' -> ' . __METHOD__);
    }

    public function singleQuotedAttrValStart()
    {
        throw new \DomainException(static::class . ' -> ' . __METHOD__);
    }

    public function singleQuotedAttrValEnd()
    {
        throw new \DomainException(static::class . ' -> ' . __METHOD__);
    }

    public function doubleQuotedAttrValStart()
    {
        throw new \DomainException(static::class . ' -> ' . __METHOD__);
    }

    public function doubleQuotedAttrValEnd()
    {
        throw new \DomainException(static::class . ' -> ' . __METHOD__);
    }

    public function probablyCommentStart()
    {
        throw new \DomainException(static::class . ' -> ' . __METHOD__);
    }

    public function probablyCommentEnd()
    {
        throw new \DomainException(static::class . ' -> ' . __METHOD__);
    }

    public function commentStart()
    {
        throw new \DomainException(static::class . ' -> ' . __METHOD__);
    }

    public function commentEnd()
    {
        throw new \DomainException(static::class . ' -> ' . __METHOD__);
    }
}