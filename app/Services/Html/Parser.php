<?php

namespace App\Services\Html;


use App\Services\Html\ParserStates\TextNodeState;

class Parser
{

    /**
     * @var \App\Services\Html\ParserStates\ParsingState $state
     */
    protected $state;

    public function __construct()
    {
        $this->state = new TextNodeState();
    }

    public function textNode()
    {
        $this->state = $this->state->textNode();
    }

    public function probablyOpenTag()
    {
        $this->state = $this->state->probablyOpenTag();
    }

    public function tagNameStart()
    {
        $this->state = $this->state->tagNameStart();
    }

    public function tagNameEnd()
    {
        $this->state = $this->state->tagNameEnd();
    }

    public function probablyTagEnd()
    {
        $this->state = $this->state->probablyTagEnd();
    }

    public function tagEnd()
    {
        $this->state = $this->state->tagEnd();
    }

    public function closingTag()
    {
        $this->state = $this->state->closingTag();
    }

    public function attrNameStart()
    {
        $this->state = $this->state->attrNameStart();
    }

    public function attrNameEnd()
    {
        $this->state = $this->state->attrNameEnd();
    }

    public function attrValueStart()
    {
        $this->state = $this->state->attrValueStart();
    }

    public function attrValueEnd()
    {
        $this->state = $this->state->attrValueEnd();
    }

    public function singleQuotedAttrValStart()
    {
        $this->state = $this->state->singleQuotedAttrValStart();
    }

    public function singleQuotedAttrValEnd()
    {
        $this->state = $this->state->singleQuotedAttrValEnd();
    }

    public function doubleQuotedAttrValStart()
    {
        $this->state = $this->state->doubleQuotedAttrValStart();
    }

    public function doubleQuotedAttrValEnd()
    {
        $this->state = $this->state->doubleQuotedAttrValEnd();
    }

    public function probablyCommentStart()
    {
        $this->state = $this->state->probablyCommentStart();
    }

    public function probablyCommentEnd()
    {
        $this->state = $this->state->probablyCommentEnd();
    }

    public function commentStart()
    {
        $this->state = $this->state->commentStart();
    }

    public function commentEnd()
    {
        $this->state = $this->state->commentEnd();
    }


    public function parseChar($char)
    {

    }
}