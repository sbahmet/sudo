<?php

namespace App\Services\Html\ParserStates;


class AttrValueStart extends AbstractParsingState
{
    public function probablyTagEnd()
    {
        //trigger /
        return new ProbablyTagEnd();
    }

    public function tagEnd()
    {
        //trigger >
        return new TagEnd();
    }

    public function attrValueStart()
    {
        //trigger {else}
        return $this;
    }

    public function attrValueEnd()
    {
        //trigger WS or transited from Single(Double)QuotedAttrValueEnd
        return new AttrValueEnd();
    }

    public function singleQuotedAttrValStart()
    {
        //trigger '
        return new SingleQuotedAttrValueStart();
    }

    public function doubleQuotedAttrValStart()
    {
        //trigger "
        return new DoubleQuotedAttrValueStart();
    }
}