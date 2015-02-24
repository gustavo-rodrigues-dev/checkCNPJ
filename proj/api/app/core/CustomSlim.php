<?php
/**
 * Created by PhpStorm.
 * User: gusatvodasilvarodrigues
 * Date: 23/02/15
 * Time: 21:49
 */

namespace Core;


use Slim\Slim;

class CustomSlim extends Slim{

    public function __construct(array $userSettings = array()){
        parent::__construct($userSettings);
    }
    /** Render a JSON
     * @param array $data   Associative array of data made available to the view
     * @param int $status   The HTTP response status code to use (optional)
     */
    public function renderJSON(Array $data, $status = null)
    {
        if (!is_null($status)) {
            $this->response->status($status);
        }
        $this->contentType('application/json');
        echo json_encode($data);
    }

} 