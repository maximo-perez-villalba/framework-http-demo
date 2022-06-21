<?php
namespace demo\controllers\responses;

use demo\functional\DemoApp;
use demo\ui\models\ItemMenu;
use framework\environment\Env;
use framework\http\controller\response\HTTPResponse;

class ShowFileResponse extends HTTPResponse
{

    /**
     * 
     * @var ItemMenu
     */
    private $itemSelected = NULL;

    /**
     * 
     * {@inheritDoc}
     * @see \framework\http\controller\response\HTTPResponse::execute()
     */
    public function execute()
    {
        $this->itemSelected = DemoApp::itemMenuSelected();
    }
    
    /**
     * 
     * @return string
     */
    public function titlePage(): string
    {
        return $this->itemSelected()->label();
    }
    
    /**
     * 
     * @return ItemMenu|NULL
     */
    public function itemSelected(): ?ItemMenu
    {
        return $this->itemSelected;
    }
    
    /**
     * 
     * @return string
     */
    public function pathFileSource(): string
    {
        return $this->itemSelected()->sourcePath();
    }
}

