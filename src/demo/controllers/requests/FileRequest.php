<?php
namespace demo\controllers\requests;

use demo\controllers\responses\FileResponse;
use framework\http\controller\request\HTTPRequest;

class FileRequest extends HTTPRequest
{
    
    public function __construct()
    {
        $this->response = new FileResponse();
    }

    public function execute()
    {}
}

