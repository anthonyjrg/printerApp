<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit801121e3d5f1e30594a84ce487b1ae3c
{
    public static $prefixLengthsPsr4 = array (
        'Z' => 
        array (
            'ZxcvbnPhp\\' => 10,
        ),
        'P' => 
        array (
            'PHPAuth\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'ZxcvbnPhp\\' => 
        array (
            0 => __DIR__ . '/..' . '/bjeavons/zxcvbn-php/src',
        ),
        'PHPAuth\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpauth/phpauth',
        ),
    );

    public static $classMap = array (
        'Database' => __DIR__ . '/../..' . '/logic/Database.php',
        'Dept' => __DIR__ . '/../..' . '/logic/Dept.php',
        'Display' => __DIR__ . '/../..' . '/logic/Display.php',
        'EasyPeasyICS' => __DIR__ . '/..' . '/phpmailer/phpmailer/extras/EasyPeasyICS.php',
        'Inks' => __DIR__ . '/../..' . '/logic/Inks.php',
        'PHPAuth\\Auth' => __DIR__ . '/..' . '/phpauth/phpauth/Auth.php',
        'PHPAuth\\Config' => __DIR__ . '/..' . '/phpauth/phpauth/Config.php',
        'PHPMailer' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmailer.php',
        'PHPMailerOAuth' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmaileroauth.php',
        'PHPMailerOAuthGoogle' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmaileroauthgoogle.php',
        'POP3' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.pop3.php',
        'PageDisplay' => __DIR__ . '/../..' . '/logic/PageDisplay.php',
        'Printers' => __DIR__ . '/../..' . '/logic/Printers.php',
        'SMTP' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.smtp.php',
        'SubDepts' => __DIR__ . '/../..' . '/logic/SubDepts.php',
        'ZxcvbnPhp\\Matcher' => __DIR__ . '/..' . '/bjeavons/zxcvbn-php/src/Matcher.php',
        'ZxcvbnPhp\\Matchers\\Bruteforce' => __DIR__ . '/..' . '/bjeavons/zxcvbn-php/src/Matchers/Bruteforce.php',
        'ZxcvbnPhp\\Matchers\\DateMatch' => __DIR__ . '/..' . '/bjeavons/zxcvbn-php/src/Matchers/DateMatch.php',
        'ZxcvbnPhp\\Matchers\\DictionaryMatch' => __DIR__ . '/..' . '/bjeavons/zxcvbn-php/src/Matchers/DictionaryMatch.php',
        'ZxcvbnPhp\\Matchers\\DigitMatch' => __DIR__ . '/..' . '/bjeavons/zxcvbn-php/src/Matchers/DigitMatch.php',
        'ZxcvbnPhp\\Matchers\\L33tMatch' => __DIR__ . '/..' . '/bjeavons/zxcvbn-php/src/Matchers/L33tMatch.php',
        'ZxcvbnPhp\\Matchers\\Match' => __DIR__ . '/..' . '/bjeavons/zxcvbn-php/src/Matchers/Match.php',
        'ZxcvbnPhp\\Matchers\\MatchInterface' => __DIR__ . '/..' . '/bjeavons/zxcvbn-php/src/Matchers/MatchInterface.php',
        'ZxcvbnPhp\\Matchers\\RepeatMatch' => __DIR__ . '/..' . '/bjeavons/zxcvbn-php/src/Matchers/RepeatMatch.php',
        'ZxcvbnPhp\\Matchers\\SequenceMatch' => __DIR__ . '/..' . '/bjeavons/zxcvbn-php/src/Matchers/SequenceMatch.php',
        'ZxcvbnPhp\\Matchers\\SpatialMatch' => __DIR__ . '/..' . '/bjeavons/zxcvbn-php/src/Matchers/SpatialMatch.php',
        'ZxcvbnPhp\\Matchers\\YearMatch' => __DIR__ . '/..' . '/bjeavons/zxcvbn-php/src/Matchers/YearMatch.php',
        'ZxcvbnPhp\\Scorer' => __DIR__ . '/..' . '/bjeavons/zxcvbn-php/src/Scorer.php',
        'ZxcvbnPhp\\ScorerInterface' => __DIR__ . '/..' . '/bjeavons/zxcvbn-php/src/ScorerInterface.php',
        'ZxcvbnPhp\\Searcher' => __DIR__ . '/..' . '/bjeavons/zxcvbn-php/src/Searcher.php',
        'ZxcvbnPhp\\Zxcvbn' => __DIR__ . '/..' . '/bjeavons/zxcvbn-php/src/Zxcvbn.php',
        'ntlm_sasl_client_class' => __DIR__ . '/..' . '/phpmailer/phpmailer/extras/ntlm_sasl_client.php',
        'phpmailerException' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmailer.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit801121e3d5f1e30594a84ce487b1ae3c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit801121e3d5f1e30594a84ce487b1ae3c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit801121e3d5f1e30594a84ce487b1ae3c::$classMap;

        }, null, ClassLoader::class);
    }
}