<?php

namespace App\Jobs;

use Exception;
use Michalsn\CodeIgniterQueue\BaseJob;
use Michalsn\CodeIgniterQueue\Interfaces\JobInterface;

class EmailSimpleMessage extends BaseJob implements JobInterface
{
    public function process()
    {
        $email  = service('email', null, false);
        $result = $email
            ->setTo($this->data['to'])
            ->setSubject($this->data['subject'])
            ->setMessage($this->data['message'])
            ->send(false);

        if (! $result) {
            throw new Exception($email->printDebugger('headers'));
        }

        return $result;
    }
}