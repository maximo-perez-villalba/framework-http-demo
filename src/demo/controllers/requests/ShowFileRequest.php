<?php
namespace demo\controllers\requests;

use demo\controllers\responses\ShowFileResponse;
use framework\http\controller\request\HTTPRequest;

class ShowFileRequest extends HTTPRequest
{
    
    public function __construct()
    {
        $this->response = new ShowFileResponse();
    }

    public function execute()
    {}
}

