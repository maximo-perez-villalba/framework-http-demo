<?php
namespace demo\ui\components\listables\lists\navs;

use demo\ui\components\listables\ListableComponent;
use stdClass;

class NavigatorMenu extends ListableComponent
{
    
    /**
     * 
     * @param string $id
     * @param array $component
     * @param string $menuSelectedId
     */
    public function addSubmenu( string $id, array $component )
    {
        $submenu = new stdClass();
        $submenu->id = $id;
        $submenu->component = $component;
        $this->list[ $id ] = $submenu;
    }
    
    /**
     * 
     * {@inheritDoc}
     * @see \demo\ui\components\ComponentHtml::toHtml()
     */
    public function toHtml(): string
    {
        
    }
}

