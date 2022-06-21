<?php
namespace demo\ui\components\listables\lists;

use demo\ui\components\listables\ListableComponent;
use demo\ui\components\listables\accordions\ItemAccordion;

class ListGroupComponent extends ListableComponent
{

    /**
     * 
     * @param string $label
     * @param string $url
     * @param bool $active
     * @param string $id
     */
    public function addItem( string $label, string $url, bool $active = FALSE, string $id = NULL )
    {
        if ( is_null( $id ) )
        {
            $id = md5( uniqid( $label.$url, TRUE ) );
        }
        $this->list[ $id ] = new ItemListGroup( $id, $label, $url, $active );
    }

    /**
     * 
     * {@inheritDoc}
     * @see \demo\ui\components\ComponentHtml::toHtml()
     */
    public function toHtml(): string
    {
        $code = "<div id=\"{$this->id()}\" class=\"list-group\" >";
        foreach ( $this->list as $item )
        {
            $code .= $item->toHtml();
        }
        $code .= '</div>';
        return $code;
    }
}

