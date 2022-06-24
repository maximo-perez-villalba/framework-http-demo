<?php
namespace demo\ui\components\listables\lists\groups;

use demo\functional\DemoApp;
use demo\ui\components\ComponentHtml;

class ItemListGroup extends ComponentHtml
{

    /**
     * 
     * @var string
     */
    private ?string $id = NULL;
    
    /**
     *
     * @var string
     */
    private ?string $label = NULL;
    
    /**
     *
     * @var string
     */
    private ?string $url = NULL;
    
    /**
     *
     * @var bool
     */
    private bool $active = FALSE;
    
    /**
     * 
     * @param string $id
     * @param string $label
     * @param string $url
     * @param bool $isActive
     */
    public function __construct
    (
        string $id = null,
        string $label = null,
        string $url = null,
        bool $isActive = FALSE
    )
    {
        $this->id( $id );
        $this->label( $label );
        $this->url( $url );
        $this->active( $isActive );
    }
    
    /**
     * @param string $anId
     * @return string|NULL
     */
    public function id( string $anId = NULL ): ?string
    {
        if( isset( $anId ) )
        {
            $this->id = $anId;
        }
        return $this->id;
    }
    
    /**
     * @param string $aLabel
     * @return string|NULL
     */
    public function label( string $aLabel = NULL ): ?string
    {
        if( isset( $aLabel ) )
        {
            $this->label = $aLabel;
        }
        return $this->label;
    }
    
    /**
     * @param string $anUrl
     * @return string|NULL
     */
    public function url( string $anUrl = NULL ): ?string
    {
        if( isset( $anUrl ) )
        {
            $this->url = $anUrl;
        }
        return $this->url;
    }
    
    /**
     * @param bool $isActive
     * @return bool|NULL
     */
    public function active( bool $isActive = NULL ): bool
    {
        if( isset( $isActive ) )
        {
            $this->active = $isActive;
        }
        return $this->active;
    }

    /**
     * 
     * {@inheritDoc}
     * @see \demo\ui\components\ComponentHtml::toHtml()
     */
    public function toHtml(): string
    {
        $activeItem =  ( "/{$this->id()}" == DemoApp::urnCurrent() ) ? 'active' : '';
        return <<<ILGCODE
            <a href="{$this->url()}" class="list-group-item list-group-item-action {$activeItem}" aria-current="true">
                {$this->label()}
    		</a>
ILGCODE;        
    }
}

