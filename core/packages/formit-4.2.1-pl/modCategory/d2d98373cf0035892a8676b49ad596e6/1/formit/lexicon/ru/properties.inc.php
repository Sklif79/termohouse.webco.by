<?php

/**
 * FormIt
 *
 * Copyright 2019 by Sterc <modx@sterc.nl>
 */

$_lang['prop_formit.hooks_desc']                                = 'Разделённый запятыми список хуков которые будут выполнятся по очереди после того как форма пройдёт проверку. Если какой-то из хуков вернёт false, то следующии хуки не будут выполнены. Хук также может быть именем сниппета, этот сниппет будет выполнен как хук.';
$_lang['prop_formit.prehooks_desc']                             = 'Разделённый запятыми список хуков которые будут выполнятся по очереди после того как форма будет загружена. Если какой-то из хуков вернёт false, то следующие хуки не будут выполнены. Например: можно предварительно устанавливать значения полей формы с помощью $scriptProperties[`hook`]->fields[`fieldname`]. Хук также может быть именем сниппета, этот сниппет будет выполнен как хук.';
$_lang['prop_formit.submitvar_desc']                            = 'Если установлено значение, то обработка формы не начнётся пока  POST параметр с этим именем не будет передан.';
$_lang['prop_formit.validate_desc']                             = 'Разделённый запятыми список полей для проверки, для каждого поля пишется имя:валидатор (т.е.: username:required,email:required). Валидаторы могут быть объединены через двоеточие, например email:email:required. Этот параметр может быть задан на нескольких строках.';
$_lang['prop_formit.errtpl_desc']                               = 'Шаблон сообщения об ошибке.';
$_lang['prop_formit.validationerrormessage_desc']               = 'A general error message to set to a placeholder if validation fails. Can contain [[+errors]] if you want to display a list of all errors at the top.';
$_lang['prop_formit.validationerrorbulktpl_desc']               = 'HTML tpl that is used for each individual error in the generic validation error message value.';
$_lang['prop_formit.customvalidators_desc']                     = 'Разделённый запятыми список имён пользовательских валидаторов(сниппетов), которые вы планируете использовать в этой форме. Пользовательские валидаторы должны быть обязательно указаны в этом параметре, иначе они не будут работать.';
$_lang['prop_formit.trimvaluesdeforevalidation_desc']           = 'Whether or not to trim spaces from the beginning and end of values before attempting validation. Defaults to true.';
$_lang['prop_formit.clearfieldsonsuccess_desc']                 = 'Если установлено значение true, то поля формы будут очищатся после успешной отправки формы.';
$_lang['prop_formit.successmessage_desc']                       = 'Значение подстановщика для сообщения об успехе. Имя подстановщика устанавливается в параметре &successMessagePlaceholder, по умолчанию «fi.successMessage».';
$_lang['prop_formit.successmessageplaceholder_desc']            = 'Подстановщик для сообщения об успехе.';
$_lang['prop_formit.store_desc']                                = 'Если установлено true,  данные переданные через форму будет сохранятcя в кэше, для дальнейшего их использования с помощью сниппета FormItRetriever.';
$_lang['prop_formit.storetime_desc']                            = 'Если выбрано `запоминание` данных формы, то этот параметр указывает время(в секундах)  для хранения данных из отправленной формы. По умолчанию пять минут.';
$_lang['prop_formit.storelocation_desc']                        = 'If `store` is set to true, this specifies the cache location of the data from the form submission. Defaults to MODX cache.';
$_lang['prop_formit.allowfiles_desc']                           = 'If set to 0, will prevent files from being submitted on the form.';
$_lang['prop_formit.placeholderprefix_desc']                    = 'Префикс который используется всеми подстановщиками установлеными FormIt для полей. По умолчанию «fi.»';
$_lang['prop_formit.redirectto_desc']                           = 'Хук «redirect». В этом параметре надо указать идентификатор ресурса на который будет происходить редирект после успешной отправки формы.';
$_lang['prop_formit.redirectparams_desc']                       = ' JSON array of parameters to pass to the redirect hook that will be passed when redirecting.';
$_lang['prop_formit.recaptchajs_desc']                          = 'Хук «recaptcha».  JSON объект который содержит в себе  настройки для виджета reCaptcha.';
$_lang['prop_formit.recaptchaheight_desc']                      = 'Хук «recaptcha». Высота виджета reCaptcha.';
$_lang['prop_formit.recaptchatheme_desc']                       = 'Хук «recaptcha». Тема оформления для виджета reCaptcha.';
$_lang['prop_formit.recaptchawidth_desc']                       = 'Хук «recaptcha». Ширина виджета reCaptcha.';
$_lang['prop_formit.spamemailfields_desc']                      = 'Хук «spam». Разделённый запятыми список полей содержащих адреса электронной почты для проверки на причастность к спаму.';
$_lang['prop_formit.spamcheckip_desc']                          = 'Хук «spam». Если это параметр установлен в true, то будет проверяться ip-адресс отправителя формы на причастность к спаму.';
$_lang['prop_formit.emailbcc_desc']                             = 'Хук «email».  Разделённый запятыми список адресов  электронной почты на которые надо послать скрытую копию письма.';
$_lang['prop_formit.emailbccname_desc']                         = 'Хук «email». Необязательный параметр. Разделённый запятыми список имён владельцев адресов электронной почты указанных в параметре «emailBCC».';
$_lang['prop_formit.emailcc_desc']                              = 'Хук «email». Разделённый запятыми список адресов электронной почты на которые надо послать копию письма.';
$_lang['prop_formit.emailccname_desc']                          = 'Хук «email». Необязательный параметр. Разделённый запятыми список имён владельцев адресов электронной почты указанных в параметре «emailCC».';
$_lang['prop_formit.emailto_desc']                              = 'Хук «email». Разделённый запятыми список адресов электронной почты на которые надо послать письмо.';
$_lang['prop_formit.emailtoname_desc']                          = 'Хук «email». Необязательный параметр. Разделённый запятыми список имён владельцев адресов электронной почты указанных в параметре «emailTo».';
$_lang['prop_formit.emailfrom_desc']                            = 'Хук «email». Необязательный параметр. Если этот параметр установлен, то он будет определять адрес электронной почты отправителя письма. Если не установлен, то сначала адрес электронной почты будет искаться в данных формы  в поле с именем «email», если это поле не будет найдено, то будет использоваться  адрес электронной почты из системной настройки «emailsender».';
$_lang['prop_formit.emailfromname_desc']                        = 'Хук «email». Необязательный параметр. Имя отправителя письма.';
$_lang['prop_formit.emailreplyto_desc']                         = 'Хук «email». Необязательный параметр. Адрес электронной почты для ответа на письмо.';
$_lang['prop_formit.emailreplytoname_desc']                     = 'Хук «email». Необязательный параметр. Имя владельца адреса электронной почты который используется для ответа на письмо.';
$_lang['prop_formit.emailreturnpath_desc']                      = 'Optional. If `email` is set as a hook, and this is set, will specify the Return-path: address for the email. If not set, will take the value of `emailFrom` property.';
$_lang['prop_formit.emailsubject_desc']                         = 'Хук «email». В этом параметре можно указать тему электронного письма.';
$_lang['prop_formit.emailusefieldforsubject_desc']              = 'Если поле «subject» используется в форме, и это параметр установлен в true,то содержимое этого поля будет использоваться как тема электронного письма.';
$_lang['prop_formit.emailhtml_desc']                            = 'Хук «email». Необязательный параметр. Этот параметр включает использование html разметки в электронном письме. По умолчанию включено.';
$_lang['prop_formit.emailconvertnewlines_desc']                 = 'If true and emailHtml is set to 1, will convert newlines to BR tags in the email.';
$_lang['prop_formit.emailmultiseparator_desc']                  = 'The default separator for collections of items sent through checkboxes/multi-selects. Defaults to a newline.';
$_lang['prop_formit.emailmultiwrapper_desc']                    = 'Will wrap each item in a collection of fields sent via checkboxes/multi-selects. Defaults to just the value.';

$_lang['prop_fiar.fiartpl_desc']                                = 'Хук «FormItAutoResponder». Обязательный параметр. Имя чанка который будет использоватся как шаблон письма для автоматического ответа.';
$_lang['prop_fiar.fiartofield_desc']                            = 'Хук «FormItAutoResponder».  Поле формы которое будет использовано как адрес на который надо отправить автоматический ответ.';
$_lang['prop_fiar.fiarbcc_desc']                                = 'Хук «FormItAutoResponder». Разделённый запятыми список адресов электронной почты на которые надо послать скрытую копию письма.';
$_lang['prop_fiar.fiarbccname_desc']                            = 'Хук «FormItAutoResponder».  Необязательный параметр.  Разделённый запятыми список имён владельцев адресов электронной почты указанных в параметре «emailBCC».';
$_lang['prop_fiar.fiarcc_desc']                                 = 'Хук «FormItAutoResponder».  Разделённый запятыми список адресов электронной почты на которые надо послать копию письма.';
$_lang['prop_fiar.fiarccname_desc']                             = 'Хук «FormItAutoResponder». Необязательный параметр.  Разделённый запятыми список имён владельцев адресов электронной почты указанных в параметре «emailCC».';
$_lang['prop_fiar.fiarfrom_desc']                               = 'Хук «FormItAutoResponder». Необязательный параметр.   Если этот параметр установлен, то он будет определять адрес электронной почты отправителя письма. Если не установлен, то сначала адрес электронной почты будет искаться в данных формы  в поле с именем «email», если это поле не будет найдено, то будет использоваться  адрес электронной почты из системной настройки «emailsender».';
$_lang['prop_fiar.fiarfromname_desc']                           = 'Хук «FormItAutoResponder». Необязательный параметр.  Имя отправителя письма.';
$_lang['prop_fiar.fiarreplyto_desc']                            = 'Хук «FormItAutoResponder». Необязательный параметр.  Адрес электронной почты для ответа на письмо.';
$_lang['prop_fiar.fiarreplytoname_desc']                        = 'Хук «FormItAutoResponder». Необязательный параметр.   Имя владельца адреса электронной почты который используется для ответа на письмо.';
$_lang['prop_fiar.fiarsubject_desc']                            = 'Хук «FormItAutoResponder». Тема письма.';
$_lang['prop_fiar.fiarhtml_desc']                               = 'Хук «FormItAutoResponder».  Необязательный параметр. Включает или выключает использование html разметки в электронном письме. По умолчанию включено.';

$_lang['prop_fir.placeholderprefix_desc']                       = 'Префикс который используется подстановщиками выводящими сохранённые данные формы.';
$_lang['prop_fir.redirecttoonnotfound_desc']                    = 'Идентификатор ресурса на который произойдёт редирект, если данные не найдены.';
$_lang['prop_fir.eraseonload_desc']                             = 'Если включено, сохранённые данные будут стираться при первой загрузке. Настоятельно рекомендуется оставить этот параметр выключенным. Включите его если вы хотите чтобы данные загружались только один раз.';
$_lang['prop_fir.storelocation_desc']                           = 'If `store` is set to true, this specifies the cache location of the data from the form submission. Defaults to MODX cache.';

$_lang['prop_math.mathminrange_desc']                           = 'Хук «math». Минимальный диапазон для каждого числа в примере.';
$_lang['prop_math.mathmaxrange_desc']                           = 'Хук «math». Максимальный диапазон для каждого числа в примере.';
$_lang['prop_math.mathfield_desc']                              = 'Хук «math». Имя поля ввода для ответа.';
$_lang['prop_math.mathop1field_desc']                           = 'Хук «math». Имя поля для первого числа в примере.';
$_lang['prop_math.mathop2field_desc']                           = 'Хук «math». Имя поля для второго числа в примере.';
$_lang['prop_math.mathoperatorfield_desc']                      = 'Хук «math». Имя поля для оператора в примере.';

$_lang['prop_fico.allgrouptext_desc']                           = 'Optional. If set and &prioritized is in use, will be the text label for the all other countries option group.';
$_lang['prop_fico.optgrouptpl_desc']                            = 'Optional. If set and &prioritized is in use, will be the chunk tpl to use for the option group markup.';
$_lang['prop_fico.limited_desc']                                = 'Optional. A comma-separated list of ISO codes for selected countries the full list will be limited to.';
$_lang['prop_fico.prioritized_desc']                            = 'Optional. A comma-separated list of ISO codes for countries that will move them into a prioritized "Frequent Visitors" group at the top of the dropdown. This can be used for your commonly-selected countries.';
$_lang['prop_fico.prioritizedgrouptext_desc']                   = 'Optional. If set and &prioritized is in use, will be the text label for the prioritized option group.';
$_lang['prop_fico.selected_desc']                               = 'The country value to select.';
$_lang['prop_fico.selectedattribute_desc']                      = 'Optional. The HTML attribute to add to a selected country.';
$_lang['prop_fico.toplaceholder_desc']                          = 'Optional. Use this to set the output to a placeholder instead of outputting directly.';
$_lang['prop_fico.tpl_desc']                                    = 'Optional. The chunk to use for each country dropdown option.';
$_lang['prop_fico.useisocode_desc']                             = 'If 1, will use the ISO country code for the value. If 0, will use the country name.';
$_lang['prop_fico.country_desc']                                = 'Optional. Set to use a different countries file when loading a list of countries.';

$_lang['prop_fiso.country_desc']                                = 'Optional. Set to use a different states file when loading a list of states.';
$_lang['prop_fiso.selected_desc']                               = 'The country value to select.';
$_lang['prop_fiso.selectedattribute_desc']                      = 'Optional. The HTML attribute to add to a selected country.';
$_lang['prop_fiso.toplaceholder_desc']                          = 'Optional. Use this to set the output to a placeholder instead of outputting directly.';
$_lang['prop_fiso.tpl_desc']                                    = 'Optional. The chunk to use for each country dropdown option.';
$_lang['prop_fiso.useabbr_desc']                                = 'If 1, will use the state abbreviation for the value. If 0, will use the full state name.';

$_lang['formit.opt_blackglass']                                 = 'Black Glass';
$_lang['formit.opt_clean']                                      = 'Clean';
$_lang['formit.opt_red']                                        = 'Red';
$_lang['formit.opt_white']                                      = 'White';
$_lang['formit.opt_cache']                                      = 'MODX Cache';
$_lang['formit.opt_session']                                    = 'Session';
$_lang['prop_formit.savetmpfiles_desc']                         = 'If set to 1, FormIt will store submitted files in a temporary folder.';
$_lang['prop_formit.attachfiles_desc']                          = 'If true, FormIt will add all file fields as attachments in the email.';
