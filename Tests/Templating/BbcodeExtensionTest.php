<?php

namespace FM\BbcodeBundle\Tests\Templating;

use FM\BbcodeBundle\Tests\TwigBasedTestCase;

class BbcodeExtensionTest extends TwigBasedTestCase
{
    /**
     * @dataProvider dataDefaultTags
     */
    public function testDefaultFilter($value, $expected)
    {
        $this->assertSame($expected,
            $this->getTwig()->render('FunctionalTestBundle:filters:default.html.twig', array(
                'value' => $value,
            )));
    }

    public function dataDefaultTags()
    {
        return array(
            array('[b]bold[/b]', "<strong>bold</strong>"),
            array('[i]italic[/i]', "<em>italic</em>"),
            array('[u]underline[/u]', "<u>underline</u>"),
            array('[s]strikeout[/s]', "<del>strikeout</del>"),
            array('[sub]subscript[/sub]', "<sub>subscript</sub>"),
            array('[sup]superscript[/sup]', "<sup>superscript</sup>"),
            array('[abbr="Object relational mapper"]ORM[/abbr]', '<abbr title="Object relational mapper">ORM</abbr>'),

        );
    }

    /**
     * @dataProvider dataUrlTags
     */
    public function testUrlFilter($value, $expected)
    {
        $this->assertSame($expected,
            $this->getTwig()->render('FunctionalTestBundle:filters:url.html.twig', array(
                'value' => $value,
            )));
    }

    public function dataUrlTags()
    {
        return array(
            array('[url]http://example.org[/url]','<a href="http://example.org">http://example.org</a>'),
            array('[url="http://example.com"]Example[/url]','<a href="http://example.com">Example</a>')
        );
    }

    /**
     * @dataProvider dataImgTags
     */
    public function testImgFilter($value, $expected)
    {
        $this->assertSame($expected,
            $this->getTwig()->render('FunctionalTestBundle:filters:image.html.twig', array(
                'value' => $value,
            )));
    }

    public function dataImgTags()
    {
        return array(
            array('[img]http://github.com/picture.jpg[/img]','<img src="http://github.com/picture.jpg" alt="" />'),
            array('[img width="500"]http://github.com/picture.jpg[/img]','<img width="500" src="http://github.com/picture.jpg" alt="" />')
        );
    }

    /**
     * @dataProvider dataQuoteTags
     */
    public function testQuoteFilter($value, $expected)
    {
        $this->assertSame($expected,
            $this->getTwig()->render('FunctionalTestBundle:filters:quote.html.twig', array(
                'value' => $value,
            )));
    }

    public function dataQuoteTags()
    {
        return array(
            array('[quote]text[/quote]','text'),
        );
    }

    /**
     * @dataProvider dataStrict
     */
    public function testStrict($value, $expected)
    {
        $this->assertSame($expected,
            $this->getTwig()->render('FunctionalTestBundle:filters:strict_test.html.twig', array(
                'value' => $value,
            )));
    }

    public function dataStrict()
    {
        return array(
            array('[url]http://example.org[/url]','<a href="http://example.org">http://example.org</a>'),
            array('[url=http://example.com]Example[/url]','<a href="http://example.com">Example</a>')
        );
    }

    /**
     * @dataProvider dataDefaultTags
     */
    public function testFooFilter($value, $expected)
    {
        $this->assertSame($expected,
            $this->getTwig()->render('FunctionalTestBundle:filters:foo_filter.html.twig', array(
                'value' => $value,
            )));
    }

    /**
     * @dataProvider dataDefaultTags
     */
    public function testBarFilter($value, $expected)
    {
        $this->assertSame($expected,
            $this->getTwig()->render('FunctionalTestBundle:filters:bar_filter.html.twig', array(
                'value' => $value,
            )));
    }

    /**
     * @dataProvider dataClickableHook
     */
    public function testFooHook($value, $expected)
    {
        $this->assertSame($expected,
            $this->getTwig()->render('FunctionalTestBundle:filters:foo_hook.html.twig', array(
                'value' => $value,
            )));
    }


    /**
     * @dataProvider dataClickableHook
     */
    public function testBarHook($value, $expected)
    {
        $this->assertSame($expected,
            $this->getTwig()->render('FunctionalTestBundle:filters:bar_hook.html.twig', array(
                'value' => $value,
            )));
    }

    public function dataClickableHook()
    {
        return array(
            array('http://domain.com', '<a href="http://domain.com">http://domain.com</a>'),
        );
    }

    /**
     * @dataProvider dataDefaultFilterSet
     */
    public function testDefaultFilterSet($value, $expected)
    {
        $this->assertSame($expected,
            $this->getTwig()->render('FunctionalTestBundle:filters:default_filter_set.html.twig', array(
                'value' => $value,
            )));
    }

    public function dataDefaultFilterSet()
    {
        return array(
            array('[b]Bold[/b]', "<b>Bold</b>"),
            array('[i]Italic[/i]', "<i>Italic</i>"),
            array('[u]Underline[/u]', "<u>Underline</u>"),
            array('[s]strikeout[/s]', "<del>strikeout</del>"),
            array('[sub]subscript[/sub]', "<sub>subscript</sub>"),
            array('[sup]superscript[/sup]', "<sup>superscript</sup>"),
            array('[abbr="Object relational mapper"]ORM[/abbr]', '<abbr title="Object relational mapper">ORM</abbr>'),
            array('[url]http://example.org[/url]','<a href="http://example.org">http://example.org</a>'),
            array('[url="http://example.com"]Example[/url]','<a href="http://example.com">Example</a>'),
            array('[email]email@domain.com[/email]', '<a href="mailto:&#101;&#109;&#97;&#105;&#108;&#64;&#100;&#111;&#109;&#97;&#105;&#110;&#46;&#99;&#111;&#109;">&#101;&#109;&#97;&#105;&#108;&#64;&#100;&#111;&#109;&#97;&#105;&#110;&#46;&#99;&#111;&#109;</a>'),
        );
    }
}
