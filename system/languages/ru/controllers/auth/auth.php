<?php

    define('LANG_AUTH_CONTROLLER',          'Авторизация и регистрация');

    define('LANG_AUTHORIZATION',            'Авторизация');

    define('LANG_AUTH_RESTRICTIONS',            'Ограничения и запреты');
    define('LANG_AUTH_RESTRICTED_EMAILS',       'Запрещенные адреса e-mail');
    define('LANG_AUTH_RESTRICTED_EMAILS_HINT',  'Один адрес на строке, можно использовать символ * для подстановки любого значения');
    define('LANG_AUTH_RESTRICTED_EMAIL',        'Использование e-mail адреса <b>%s</b> запрещено');

    define('LANG_AUTH_RESTRICTED_NAMES',        'Запрещенные никнеймы');
    define('LANG_AUTH_RESTRICTED_NAMES_HINT',   'Один никнейм на строке, можно использовать символ * для подстановки любого значения');
    define('LANG_AUTH_RESTRICTED_NAME',         'Использование никнейма <b>%s</b> запрещено');

    define('LANG_AUTH_RESTRICTED_IPS',          'Запрещенные IP-адреса для регистрации');
    define('LANG_AUTH_RESTRICTED_IPS_HINT',     'Один адрес на строке, можно использовать символ * для подстановки любого значения');
    define('LANG_AUTH_RESTRICTED_IP',           'Регистрация с IP-адреса <b>%s</b> запрещена');

    define('LANG_AUTH_INVITES',                 'Приглашения');
    define('LANG_AUTH_INVITES_AUTO',            'Выдавать приглашения зарегистрированным пользователям');
    define('LANG_AUTH_INVITES_AUTO_HINT',       'Пользователи смогут отправлять приглашения своим знакомым');
    define('LANG_AUTH_INVITES_STRICT',          'Привязывать приглашение к e-mail');
    define('LANG_AUTH_INVITES_STRICT_HINT',     'Если включено, зарегистрироваться по коду приглашения можно будет только с тем e-mail, на который этот код был отправлен');
    define('LANG_AUTH_INVITES_PERIOD',          'Выдавать приглашения раз в период');
    define('LANG_AUTH_INVITES_QTY',             'Сколько приглашений выдавать');
    define('LANG_AUTH_INVITES_KARMA',           'Выдавать приглашения только пользователям с репутацией выше');
    define('LANG_AUTH_INVITES_RATING',          'Выдавать приглашения только пользователям с рейтингом выше');
    define('LANG_AUTH_INVITES_DATE',            'Выдавать приглашения только пользователям находящимся на сайте не менее');

    define('LANG_REG_INVITED_ONLY',             'Регистрация производится только по приглашениям');
    define('LANG_REG_INVITE_CODE',              'Код приглашения');
    define('LANG_REG_WRONG_INVITE_CODE',        'Код приглашения указан неправильно');
    define('LANG_REG_WRONG_INVITE_CODE_EMAIL',  'Код приглашения предназначен для другого e-mail');

    define('LANG_REG_CFG_IS_ENABLED',           'Регистрация включена');
    define('LANG_REG_CFG_DISABLED_NOTICE',      'Причина отключения регистрации');
    define('LANG_REG_CFG_IS_INVITES',           'Регистрация только по приглашениям');

    define('LANG_REG_CFG_REG_CAPTCHA',          'Показывать капчу для защиты от спамовых регистраций');
    define('LANG_REG_CFG_AUTH_CAPTCHA',         'Показывать капчу после неудачной авторизации');
    define('LANG_REG_CFG_FIRST_AUTH_REDIRECT',  'После первой авторизации на сайте');
    define('LANG_REG_CFG_AUTH_REDIRECT',        'После следующих авторизаций на сайте');
    define('LANG_REG_CFG_AUTH_REDIRECT_NONE',        'Оставаться на странице, с которой авторизовались');
    define('LANG_REG_CFG_AUTH_REDIRECT_INDEX',       'Открыть главную страницу');
    define('LANG_REG_CFG_AUTH_REDIRECT_PROFILE',     'Открыть профиль');
    define('LANG_REG_CFG_AUTH_REDIRECT_PROFILEEDIT', 'Открыть настройки профиля');

    define('LANG_REG_CFG_VERIFY_EMAIL',         'Требовать подтверждения e-mail при регистрации');
    define('LANG_REG_CFG_VERIFY_EMAIL_HINT',    'После регистрации пользователь блокируется до перехода по ссылке из полученного письма');
	define('LANG_REG_CFG_REG_AUTO_AUTH',        'Авторизовать пользователя сразу после регистрации на сайте');
    define('LANG_REG_CFG_VERIFY_EXPIRATION',   'Удалять неподтвержденные аккаунты через, часов');
    define('LANG_REG_CFG_VERIFY_LOCK_REASON',  'Требуется подтверждение адреса e-mail');
    define('LANG_REG_CFG_DEF_GROUP_ID',		   'Помещать новых пользователей в группы');

    define('LANG_REG_INCORRECT_EMAIL',       'Некорректный адрес электронной почты');
    define('LANG_REG_EMAIL_EXISTS',          'Указанный адрес электронной почты уже зарегистрирован');
    define('LANG_REG_PASS_NOT_EQUAL',        'Пароли не совпали');
    define('LANG_REG_PASS_EMPTY',            'Необходимо указать пароль');
    define('LANG_REG_SUCCESS',               'Регистрация прошла успешно');
    define('LANG_REG_SUCCESS_NEED_VERIFY',   'На адрес <b>%s</b> отправлено письмо. Перейдите по ссылке из письма чтобы активировать Ваш аккаунт');
    define('LANG_REG_SUCCESS_VERIFIED',      'Адрес e-mail успешно подтвержден. Вы можете авторизоваться на сайте');
	define('LANG_REG_SUCCESS_VERIFIED_AND_AUTH', 'Адрес e-mail успешно подтвержден. Добро пожаловать!');

    define('LANG_PASS_RESTORE',              'Восстановление пароля');
    define('LANG_EMAIL_NOT_FOUND',           'Указанный E-mail не найден в нашей базе');
    define('LANG_TOKEN_SENDED',              'На указанный адрес E-mail отправлены инструкции по восстановлению пароля');
    define('LANG_RESTORE_NOTICE',            'Пожалуйста укажите адрес E-mail который вы вводили при регистрации.<br/>На указанный адрес будут высланы инструкции по восстановлению пароля.');
