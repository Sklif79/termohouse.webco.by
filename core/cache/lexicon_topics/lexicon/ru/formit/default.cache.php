<?php  return array (
  'formit' => 'FormIt',
  'formit.desc' => 'Просмотреть все заполненные формы',
  'area_formit' => 'FormIt',
  'area_formit_recaptcha' => 'FormIt reCaptcha',
  'formit.form' => 'форму',
  'formit.forms' => 'Формы',
  'formit.forms_desc' => 'View all submitted forms.',
  'formit.form_view' => 'Посмотреть форму',
  'formit.form_remove' => 'Удалить форму',
  'formit.form_remove_confirm' => 'Are you sure you want to remove this form?',
  'formit.forms_remove' => 'Remove forms',
  'formit.forms_remove_confirm' => 'Are you sure you want to remove all forms?',
  'formit.forms_clean' => 'Clean forms',
  'formit.forms_clean_confirm' => 'Are you sure you want to clean all old forms?',
  'formit.forms_export' => 'Экспорт Формы',
  'formit.form_encrypt' => 'Encrypt form(s)',
  'formit.form_encrypt_confirm' => 'Are you sure you want to encrypt the form(s)?',
  'formit.form_decrypt' => 'Undo form encryption(s)',
  'formit.form_decrypt_confirm' => 'Are you sure you want to undo the form encryption(s)?',
  'formit.view_ip' => 'View all forms from this IP',
  'formit.encryption' => 'Encrypted form',
  'formit.encryptions' => 'Encrypted forms',
  'formit.encryptions_desc' => 'View all encrypted and non encrypted forms.',
  'formit.label_form_name' => 'Name',
  'formit.label_form_name_desc' => 'The name of the form.',
  'formit.label_form_values' => 'Значения',
  'formit.label_form_values_desc' => 'The values of the form.',
  'formit.label_form_ip' => 'IP адрес',
  'formit.label_form_ip_desc' => 'The IP number of the visitor that has submitted the form.',
  'formit.label_form_date' => 'Дата',
  'formit.label_form_date_desc' => 'The date when the form is submitted.',
  'formit.label_form_encrypted' => 'Encrypted',
  'formit.label_form_encrypted_desc' => '',
  'formit.label_form_decrypted' => 'Not encrypted',
  'formit.label_form_decrypted_desc' => '',
  'formit.label_form_total' => 'Total',
  'formit.label_form_total_desc' => '',
  'formit.label_clean_label' => 'Remove forms older than',
  'formit.label_clean_desc' => 'days',
  'formit.label_export_form' => 'Form',
  'formit.label_export_form_desc' => 'Select a form to export.',
  'formit.label_export_start_date' => 'Date from',
  'formit.label_export_start_date_desc' => 'Select a date to export forms from that date.',
  'formit.label_export_end_date' => 'Date till',
  'formit.label_export_end_date_desc' => 'Select a date to export forms till that date.',
  'formit.label_export_delimiter' => 'CSV delimiter',
  'formit.label_export_delimiter_desc' => 'The Het CSV delimiter to separate the columns. Default is ";".',
  'formit.filter_form' => 'Выберите форму',
  'formit.filter_start_date' => 'Выберите начальную дату',
  'formit.filter_end_date' => 'Выберите конечную дату',
  'formit.encryption_unavailable' => 'PHP OpenSSL functions openssl_encrypt and openssl_decrypt are not available. Please install PHP OpenSSL on your server. See http://www.php.net/manual/en/openssl.requirements.php for more information.',
  'formit.encryption_unavailable_warning' => '<strong>Warning</strong>: PHP OpenSSL functions openssl_encrypt and openssl_decrypt are not available. This means that you cannot use encryption on your forms. Please install PHP OpenSSL on your server. Visit <a href="http://www.php.net/manual/en/openssl.requirements.php" target="_blank">this page</a> for more information.',
  'formit.forms_clean_desc' => 'The European <a href="https://ec.europa.eu/commission/priorities/justice-and-fundamental-rights/data-protection/2018-reform-eu-data-protection-rules_en" target="_blank">General Data Protection Regulation (GDPR)</a> requires that personal data, which is no longer necessary to possess, is removed. This tool makes it possible to remove saved forms with an age older than the given days. This action can not be undone!',
  'formit.forms_clean_executing' => 'Cleaning up forms',
  'formit.forms_clean_success' => '[[+amount]] form(s) removed.',
  'formit.export_failed' => 'The export of the forms failed, please try again.',
  'formit.export_dir_failed' => 'An error occurred while exporting the form, the export folder could not be created.',
  'formit.contains' => 'Поле должно содержать фразу "[[+value]]".',
  'formit.email_invalid' => 'Пожалуйста, введите правильный адрес электронной почты.',
  'formit.email_invalid_domain' => 'Ваш адрес электронной почты не является допустимым именем домена.',
  'formit.email_no_recipient' => 'Пожалуйста, укажите получателя или получателей электронной почты.',
  'formit.email_not_sent' => 'Произошла ошибка при попытке отправить почту.',
  'formit.email_tpl_nf' => 'Пожалуйста, укажите шаблон письма.',
  'formit.field_not_empty' => 'Это поле должно быть пустым.',
  'formit.field_required' => 'Это поле обязательно для заполнения.',
  'formit.math_incorrect' => 'Неправильный ответ!',
  'formit.math_field_nf' => '[[+field]] input field not specified in form.',
  'formit.max_length' => 'Это поле не может быть длиннее, чем [[+length]] символов.',
  'formit.max_value' => 'Это поле не может быть больше, чем [[+value]].',
  'formit.min_length' => 'Это поле должно быть не меньше [[+length]] символов.',
  'formit.min_value' => 'Это поле не может быть меньше, чем [[+value]].',
  'formit.not_date' => 'Это поле должно быть действительной датой.',
  'formit.not_lowercase' => 'Все символы в этом поле должны быть в нижнем регистре.',
  'formit.not_number' => 'Это поле должно быть допустимым числом.',
  'formit.not_uppercase' => 'Все символы в этом поле должны быть заглавными.',
  'formit.password_dont_match' => 'Пароли не совпадают.',
  'formit.password_not_confirmed' => 'Пожалуйста, подтвердите свой пароль',
  'formit.prioritized_group_text' => 'Frequent Visitors',
  'formit.range_invalid' => 'Неверный диапазон.',
  'formit.range' => 'Ваше значение должно быть между [[+min]] и [[+max]].',
  'formit.recaptcha_err_load' => 'Невозможно загрузить класс reCaptcha.',
  'formit.spam_blocked' => 'Ваше сообщение было заблокировано спам фильтром: ',
  'formit.spam_marked' => ' - помечено как спам.',
  'formit.username_taken' => 'Имя пользователя уже занято. Пожалуйста, выберите другое.',
  'formit.not_regexp' => 'Ваше значение не совпадает с предполагаемым форматом.',
  'formit.all_group_text' => 'Все страны',
  'formit.storeAttachment_mediasource_error' => 'Источник медиа не найден! Id источник: ',
  'formit.storeAttachment_access_error' => 'Папка не доступна для загрузки! Проверьте права на папку: ',
  'formit.migrate' => 'Migrate encrypted form submissions',
  'formit.migrate_desc' => 'Upgrading to FormIt 3.0 will also update the encryption method used for encrypting submitted form data. FormIt 2.x used mcrypt for encrypting and decrypting, but 3.0 uses the openssl methods. For this to work correctly the currently encrypted forms need to be migrated from mcrypt to openssl.',
  'formit.migrate_alert' => 'FormIt was updated, but your encrypted form submissions need to be migrated. Click here to start the migration.',
  'formit.migrate_status' => 'Status',
  'formit.migrate_running' => 'Currently running migration process in the background. Please keep this page open in your browser. DO NOT CLOSE THIS PAGE!',
  'formit.migrate_success' => 'Migration completed',
  'formit.migrate_success_msg' => 'All your encrypted forms have been successfully migrated.',
);