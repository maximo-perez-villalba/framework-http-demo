<?php
namespace demo\ui\models;

class ItemMenu
{
    
    /**
     * @var string
     */
    private $id = NULL;

    /**
     * @var string
     */
    private $url = NULL;

    /**
     * @var string
     */
    private $path = NULL;
    
    /**
     * @var string
     */
    private $label = NULL;
    
    /**
     * @var string
     */
    private $sourcePath = NULL;

    /**
     * 
     * @param string $anId
     * @param string $anUrl
     * @param string $aPath
     * @param string $aLabel
     * @param string $aSourcePath
     */
    public function __construct
    (
        string $anId,
        string $anUrl,
        string $aPath,
        string $aLabel,
        string $aSourcePath = NULL
    )
    {
        $this->id = $anId;
        $this->url = $anUrl;
        $this->path = $aPath;
        $this->label = $aLabel;
        $this->sourcePath = $aSourcePath;
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
     * @param string $aPath
     * @return string|NULL
     */
    public function path( string $aPath = NULL ): ?string
    {
        if( isset( $aPath ) )
        {
            $this->path = $aPath;
        }
        return $this->path;
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
     * @param string $aSourcePath
     * @return string|NULL
     */
    public function sourcePath( string $aSourcePath = NULL ): ?string
    {
        if( isset( $aSourcePath ) )
        {
            $this->sourcePath = $aSourcePath;
        }
        return $this->sourcePath;
    }
    
}
