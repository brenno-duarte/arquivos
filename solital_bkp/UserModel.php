<?php

namespace Solital\Components\Model;

class UserModel
{
    private $contact;

    public function __construct(ContactModel $contact)
    {
        $this->contact = $contact;
    }

    public function run()
    {
        $this->contact->execute();
    }
}