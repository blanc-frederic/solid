<?php

declare(strict_types=1);

namespace tests;

use PHPUnit\Framework\TestCase;
use solid\Mailer;
use solid\Repository\UsersRepository;

class MailerTest extends TestCase
{
    public function testMailer(): void
    {
        $mailer = new Mailer(
            new UsersRepository(TestsFacility::createDb())
        );

        $mailsSent = $mailer->send();

        $this->assertSame(2, $mailsSent);
    }
}
