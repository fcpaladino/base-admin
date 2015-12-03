<?php

namespace App\Libs\DataOperation;

use Illuminate\Support\Facades\Config;

/**
 * Class DataOperation
 * @package App\Libs\DataOperation
 */
class DataOperation
{
    /**
     * @var array
     */
    private $data = [];
    /**
     * @var GridView
     */
    public $gridView;

    public function __construct(GridView $gridView)
    {
        $this->gridView = $gridView;
    }

    /**
     * @param null $value
     */
    public function setTitle($value = null)
    {
        (is_null($value)) or (empty($value)) ? $this->setValue('title', Config::get('website.global.title')) : $this->setValue('title', $value . " - " . Config::get('website.global.title'));
    }

    /**
     * @param null $value
     */
    public function setDescription($value = null)
    {
        is_null($value) or (empty($value)) ? $this->setValue('seoDescription', Config::get('website.global.seo.description')) : $this->setValue('seoDescription', $value);
    }

    /**
     * @param null $value
     */
    public function setKeywords($value = null)
    {
        if (is_array($value))
            is_null($value) or (empty($value)) ? $this->setValue('seoKeywords', implode(',', Config::get('website.global.seo.description'))) : $this->setValue('seoKeywords', implode(',', $value));

        if (is_string($value))
            is_null($value) or (empty($value)) ? $this->setValue('seoKeywords', Config::get('website.global.seo.description')) : $this->setValue('seoKeywords', $value);

    }

    /**
     * @param null $value
     */
    public function setSeoCanonicalLink($value = null)
    {
        $this->setValue('seoCanonicalLink', $value);
    }

    /**
     * @param null $value
     */
    public function setSetRobots($value = null)
    {
        if (is_array($value))
            $this->setValue('seoRobots', implode(',', $value));

        if (is_string($value))
            $this->setValue('seoRobots', $value);
    }

    /**
     * @param null $value
     */
    public function setSeoAuthor($value = null)
    {
        $this->setValue('seoAuthor', $value);
    }

    /**
     * @param null $index
     * @param null $value
     */
    public function setValue($index = null, $value = null)
    {
        $this->data[$index] = $value;
    }

    /**
     * @param null $page
     * @return \Illuminate\View\View
     */
    public function view($page = null)
    {
        if (!is_null($page))
            return view($page, $this->data);

    }

}