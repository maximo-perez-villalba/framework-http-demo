<?php
namespace demo\ui\components\listables;

use demo\ui\components\ComponentHtml;

abstract class ListableComponent extends ComponentHtml
{
    /**
     *
     * @var string
     */
    private ?string $id = NULL;
    
    /**
     *
     * @var ComponentHtml[]
     */
    protected array $list = [];
    
    /**
     *
     * @var string
     */
    private ?string $itemSelected = NULL;

    /**
     *
     * @param string $id|NULL
     * @param string $itemSelected|NULL
     */
    public function __construct( string $id = NULL, string $itemSelected = NULL )
    {
        $this->list = [];
        $this->id( $id ?? md5( uniqid( self::class, TRUE ) ) );
        $this->itemSelected( $itemSelected );
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
     * @param string $anItemSelected
     * @return string|NULL
     */
    public function itemSelected( string $anItemSelected = NULL ): ?string
    {
        if( isset( $anItemSelected ) )
        {
            $this->itemSelected = $anItemSelected;
        }
        return $this->itemSelected;
    }
}