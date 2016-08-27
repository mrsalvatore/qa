<?php

class formAuthOptions extends cmsForm {

    public $is_tabbed = true;

    public function init() {

        $auth_redirect_items = array(
            'none'        => LANG_REG_CFG_AUTH_REDIRECT_NONE,
            'index'       => LANG_REG_CFG_AUTH_REDIRECT_INDEX,
            'profile'     => LANG_REG_CFG_AUTH_REDIRECT_PROFILE,
            'profileedit' => LANG_REG_CFG_AUTH_REDIRECT_PROFILEEDIT
        );

        return array(

            array(
                'type' => 'fieldset',
                'title' => LANG_REGISTRATION,
                'childs' => array(

                    new fieldCheckbox('is_reg_enabled', array(
                        'title' => LANG_REG_CFG_IS_ENABLED,
                    )),

                    new fieldString('reg_reason', array(
                        'title' => LANG_REG_CFG_DISABLED_NOTICE,
                    )),

                    new fieldCheckbox('is_reg_invites', array(
                        'title' => LANG_REG_CFG_IS_INVITES,
                    )),

                    new fieldCheckbox('reg_captcha', array(
                        'title' => LANG_REG_CFG_REG_CAPTCHA,
                    )),

                    new fieldCheckbox('verify_email', array(
                        'title' => LANG_REG_CFG_VERIFY_EMAIL,
                        'hint' => LANG_REG_CFG_VERIFY_EMAIL_HINT,
                    )),

                    new fieldCheckbox('reg_auto_auth', array(
                        'title'   => LANG_REG_CFG_REG_AUTO_AUTH,
                        'default' => 1
                    )),

                    new fieldListGroups('def_groups', array(
                        'title' => LANG_REG_CFG_DEF_GROUP_ID,
                        'show_all' => false,
						'default' => array(3)
                    )),

//                    new fieldNumber('verify_exp', array(
//                        'title' => LANG_REG_CFG_VERIFY_EXPIRATION,
//                        'default' => 48
//                    )),

                )
            ),

            array(
                'type' => 'fieldset',
                'title' => LANG_AUTHORIZATION,
                'childs' => array(

                    new fieldCheckbox('auth_captcha', array(
                        'title' => LANG_REG_CFG_AUTH_CAPTCHA,
                    )),

                    new fieldList('first_auth_redirect', array(
                        'title'   => LANG_REG_CFG_FIRST_AUTH_REDIRECT,
                        'default' => 'profileedit',
                        'items'   => $auth_redirect_items
                    )),

                    new fieldList('auth_redirect', array(
                        'title'   => LANG_REG_CFG_AUTH_REDIRECT,
                        'default' => 'none',
                        'items'   => $auth_redirect_items
                    )),

                )
            ),

            array(
                'type' => 'fieldset',
                'title' => LANG_AUTH_RESTRICTIONS,
                'childs' => array(

                    new fieldText('restricted_emails', array(
                        'title' => LANG_AUTH_RESTRICTED_EMAILS,
                        'hint' => LANG_AUTH_RESTRICTED_EMAILS_HINT,
                    )),

                    new fieldText('restricted_names', array(
                        'title' => LANG_AUTH_RESTRICTED_NAMES,
                        'hint' => LANG_AUTH_RESTRICTED_NAMES_HINT,
                    )),

                    new fieldText('restricted_ips', array(
                        'title' => LANG_AUTH_RESTRICTED_IPS,
                        'hint' => LANG_AUTH_RESTRICTED_IPS_HINT,
                    )),

                )
            ),

            array(
                'type' => 'fieldset',
                'title' => LANG_AUTH_INVITES,
                'childs' => array(

                    new fieldCheckbox('is_invites', array(
                        'title' => LANG_AUTH_INVITES_AUTO,
                        'hint' => LANG_AUTH_INVITES_AUTO_HINT

                    )),

                    new fieldCheckbox('is_invites_strict', array(
                        'title' => LANG_AUTH_INVITES_STRICT,
                        'hint' => LANG_AUTH_INVITES_STRICT_HINT

                    )),

                    new fieldNumber('invites_period', array(
                        'title' => LANG_AUTH_INVITES_PERIOD,
                        'units' => LANG_DAY10,
                        'default' => 7
                    )),

                    new fieldNumber('invites_qty', array(
                        'title' => LANG_AUTH_INVITES_QTY,
                    )),

                    new fieldNumber('invites_min_karma', array(
                        'title' => LANG_AUTH_INVITES_KARMA,
                    )),

                    new fieldNumber('invites_min_rating', array(
                        'title' => LANG_AUTH_INVITES_RATING,
                    )),

                    new fieldNumber('invites_min_days', array(
                        'title' => LANG_AUTH_INVITES_DATE,
                        'units' => LANG_DAY10,
                    )),

                )
            ),

        );

    }

}
