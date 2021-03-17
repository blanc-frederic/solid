<?php

declare(strict_types=1);

namespace solid;

use solid\Contract\UserListInterface;

class Mailer
{
    private UserListInterface $userList;
    
    public function __construct(UserListInterface $userList)
    {
        $this->userList = $userList;
    }

    public function send(): int
    {
        $users = $this->userList->getActives();
        $mails = 0;

        foreach ($users as $user) {
            // ...

            $mails++;
        }

        return $mails;
    }
}
