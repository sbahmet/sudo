<?php

namespace App\Services\Html\ParserStates;


abstract class AbstractParsingState implements ParsingState
{
    const WRONG_STATE_CHANGE_EXCEPTION = 'Wrong state change: ';

    public function textNode()
    {
        throw new \DomainException(self::WRONG_STATE_CHANGE_EXCEPTION . static::class . ' -> ' . __METHOD__);
    }

    public function probablyOpenTag()
    {
        throw new \DomainException(self::WRONG_STATE_CHANGE_EXCEPTION . static::class . ' -> ' . __METHOD__);
    }

    public function tagNameStart()
    {
        throw new \DomainException(self::WRONG_STATE_CHANGE_EXCEPTION . static::class . ' -> ' . __METHOD__);
    }

    public function tagNameEnd()
    {
        throw new \DomainException(self::WRONG_STATE_CHANGE_EXCEPTION . static::class . ' -> ' . __METHOD__);
    }

    public function probablyTagEnd()
    {
        throw new \DomainException(self::WRONG_STATE_CHANGE_EXCEPTION . static::class . ' -> ' . __METHOD__);
    }

    public function tagEnd()
    {
        throw new \DomainException(self::WRONG_STATE_CHANGE_EXCEPTION . static::class . ' -> ' . __METHOD__);
    }

    public function closingTag()
    {
        throw new \DomainException(self::WRONG_STATE_CHANGE_EXCEPTION . static::class . ' -> ' . __METHOD__);
    }

    public function attrNameStart()
    {
        throw new \DomainException(self::WRONG_STATE_CHANGE_EXCEPTION . static::class . ' -> ' . __METHOD__);
    }

    public function attrNameEnd()
    {
        throw new \DomainException(self::WRONG_STATE_CHANGE_EXCEPTION . static::class . ' -> ' . __METHOD__);
    }

    public function attrValueStart()
    {
        throw new \DomainException(self::WRONG_STATE_CHANGE_EXCEPTION . static::class . ' -> ' . __METHOD__);
    }

    public function attrValueEnd()
    {
        throw new \DomainException(self::WRONG_STATE_CHANGE_EXCEPTION . static::class . ' -> ' . __METHOD__);
    }

    public function singleQuotedAttrValStart()
    {
        throw new \DomainException(self::WRONG_STATE_CHANGE_EXCEPTION . static::class . ' -> ' . __METHOD__);
    }

    public function singleQuotedAttrValEnd()
    {
        throw new \DomainException(self::WRONG_STATE_CHANGE_EXCEPTION . static::class . ' -> ' . __METHOD__);
    }

    public function doubleQuotedAttrValStart()
    {
        throw new \DomainException(self::WRONG_STATE_CHANGE_EXCEPTION . static::class . ' -> ' . __METHOD__);
    }

    public function doubleQuotedAttrValEnd()
    {
        throw new \DomainException(self::WRONG_STATE_CHANGE_EXCEPTION . static::class . ' -> ' . __METHOD__);
    }

    public function probablyCommentStart()
    {
        throw new \DomainException(self::WRONG_STATE_CHANGE_EXCEPTION . static::class . ' -> ' . __METHOD__);
    }

    public function probablyCommentEnd()
    {
        throw new \DomainException(self::WRONG_STATE_CHANGE_EXCEPTION . static::class . ' -> ' . __METHOD__);
    }

    public function commentStart()
    {
        throw new \DomainException(self::WRONG_STATE_CHANGE_EXCEPTION . static::class . ' -> ' . __METHOD__);
    }

    public function commentEnd()
    {
        throw new \DomainException(self::WRONG_STATE_CHANGE_EXCEPTION . static::class . ' -> ' . __METHOD__);
    }
}