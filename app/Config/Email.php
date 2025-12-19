<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    public string $fromEmail = 'thesparshcollection@gmail.com'; // Your email address
    public string $fromName = 'Sparsh Collection'; // Your name or company name
    public string $recipients = '';

    public string $userAgent = 'CodeIgniter';
    public string $protocol = 'smtp'; // Use 'smtp' for sending emails via SMTP
    public string $mailPath = '/usr/sbin/sendmail';
    public string $SMTPHost = 'smtp.gmail.com'; // SMTP server address
    public string $SMTPUser = 'thesparshcollection@gmail.com'; // SMTP username
    public string $SMTPPass = 'usxk pflj fkfg nyqp'; // SMTP password (use app password for Gmail)
    public int $SMTPPort = 587; // SMTP port
    public int $SMTPTimeout = 5;
    public bool $SMTPKeepAlive = false;
    public string $SMTPCrypto = 'tls'; // Encryption type
    public bool $wordWrap = true;
    public int $wrapChars = 76;
    public string $mailType = 'html'; // Use 'html' for HTML emails
    public string $charset = 'UTF-8';
    public bool $validate = false;
    public int $priority = 3;
    public string $CRLF = "\r\n";
    public string $newline = "\r\n";
    public bool $BCCBatchMode = false;
    public int $BCCBatchSize = 200;
    public bool $DSN = false;
}