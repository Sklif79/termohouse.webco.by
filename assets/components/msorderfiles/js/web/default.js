(function () {
    function msOrderFiles(options) {
        //
        ['propkey', 'vendorUrl', 'actionUrl', 'ctx'].forEach(function (val, i, arr) {
            if (typeof(options[val]) == 'undefined' || options[val] == '') {
                console.error('[msOrderFiles] Bad config', arr);
                return;
            }
        });

        //
        var self = this;
        self.initialized = false;
        self.running = false;

        /**
         * Инициализирует класс.
         * @returns {boolean}
         */
        self.initialize = function (options) {
            if (!self.initialized) {
                //
                self.config = {
                    dropzone: {},
                };
                self.selectors = {
                    form: '.js-msof-form',
                };

                //
                Object.keys(options).forEach(function (key) {
                    if (['selectors'].indexOf(key) !== -1) {
                        return;
                    }
                    self.config[key] = options[key];
                });

                //
                self.config['dropzone'] = $.extend(true, {}, {
                    url: self.config['actionUrl'],
                    maxFiles: self.config['maxFiles'] || 2,
                    maxFilesize: self.config['maxFilesize'] || 2,
                    timeout: self.config['timeout'] || 90000,
                    parallelUploads: 1,
                    addRemoveLinks: true,
                    createImageThumbnails: false,
                    errors: [],

                    dictDefaultMessage: self.config.lexicon['dictDefaultMessage'] || '',
                    dictFallbackMessage: self.config.lexicon['dictFallbackMessage'] || '',
                    dictFileTooBig: self.config.lexicon['dictFileTooBig'] || '',
                    dictInvalidFileType: self.config.lexicon['dictInvalidFileType'] || '',
                    dictResponseError: self.config.lexicon['dictResponseError'] || '',
                    dictCancelUpload: self.config.lexicon['dictCancelUpload'] || '',
                    dictCancelUploadConfirmation: self.config.lexicon['dictCancelUploadConfirmation'] || '',
                    dictRemoveFile: self.config.lexicon['dictRemoveFile'] || '',
                    dictMaxFilesExceeded: self.config.lexicon['dictMaxFilesExceeded'] || '',
                    dictDefaultCanceled: self.config.lexicon['dictDefaultCanceled'] || '',
                }, self.config['dropzone']);

                //
                ['selectors'].forEach(function (key) {
                    if (options[key]) {
                        Object.keys(options[key]).forEach(function (i) {
                            self.selectors[i] = options.selectors[i];
                        });
                    }
                });

                // Подключаем сторонние библиотеки
                if (!jQuery().dropzone) {
                    document.writeln('<style data-compiled-css>@import url(' + self.config['vendorUrl'] + 'dropzone/dist/min/dropzone.min.css); </style>');
                    document.writeln('<script src="' + self.config['vendorUrl'] + 'dropzone/dist/dropzone.js"><\/script>');
                }
            }
            self.initialized = true;

            return self.initialized;
        };

        /**
         * Запускает основные действия.
         * @returns {boolean}
         */
        self.run = function () {
            if (self.initialized && !self.running) {
                $(document).ready(function () {
                    // Инициализируем DropZone форму
                    $(self.selectors['form'] + '[data-msof-propkey="' + self.config['propkey'] + '"]').each(function () {
                        var $form = $(this);
                        var ctx = self.config['ctx'];
                        var propkey = $form.data('msof-propkey');
                        var dropzoneConfig = $.extend({}, self.config['dropzone']);

                        // console.log('self.config[dropzone]', self.config['dropzone']);
                        // console.log('dropzoneConfig', dropzoneConfig);

                        // Добавляем в форму файлы при загрузке страницы
                        dropzoneConfig.reload = function ($this) {
                            var thisDropzone = $this;

                            $.ajax({
                                type: 'GET',
                                url: self.config['actionUrl'],
                                data: {
                                    action: 'getlist',
                                    propkey: propkey,
                                    ctx: ctx,
                                },
                                contentType: "application/json; charset=utf-8",
                                dataType: "json",
                                success: function (r) {
                                    if (r['success'] && r['results']) {
                                        thisDropzone.files = [];

                                        $.each(r['results'], function (idx, item) {
                                            var addFile = {
                                                name: item['file'],
                                                size: item['size'],
                                                type: item['mime'],
                                                accepted: true,
                                            };
                                            thisDropzone.options.addedfile.call(thisDropzone, addFile);
                                            addFile.previewElement.classList.add('dz-complete');
                                            $(addFile.previewElement).attr('data-msof-id', item['id']);
                                            thisDropzone.files.push(addFile);
                                        });
                                    } else if (!r['success']) {
                                        self.Message.error(r['message']);
                                    }
                                },
                                failure: function (r) {
                                    console.error('[msOrderFiles] Ajax failure', r);
                                }
                            });
                        };

                        //
                        dropzoneConfig.init = function () {
                            dropzoneConfig.reload(this);
                            // $(document).trigger('dropzone_init', [dropzoneConfig, self.config]);
                        };

                        //
                        dropzoneConfig.removedfile = function (file) {
                            var _ref;
                            var thisDropzone = this;

                            if (!file.previewElement) {
                                return thisDropzone._updateMaxFilesReachedClass();
                            }
                            var id = $(file.previewElement).attr('data-msof-id');
                            if (!id && ((_ref = file.previewElement) != null)) {
                                _ref.parentNode.removeChild(file.previewElement);
                                return thisDropzone._updateMaxFilesReachedClass();
                            }

                            $.ajax({
                                type: 'POST',
                                url: this.options['url'],
                                data: {
                                    action: 'remove',
                                    id: id,
                                    propkey: this.options.params['propkey'] || '',
                                    ctx: this.options.params['ctx'] || '',
                                },
                                dataType: "json",
                                success: function (r) {
                                    if (r['success']) {
                                        if ((_ref = file.previewElement) != null) {
                                            _ref.parentNode.removeChild(file.previewElement);
                                        }
                                        return thisDropzone._updateMaxFilesReachedClass();
                                    } else {
                                        self.Message.error(r['message']);
                                    }
                                },
                                failure: function (r) {
                                    console.error('[msOrderFiles] Ajax failure', r);
                                }
                            });
                        };

                        //
                        dropzoneConfig.canceled = function (file) {
                            return this.emit("error", file, dropzoneConfig.dictDefaultCanceled);
                        };

                        //
                        dropzoneConfig.params = {
                            action: 'upload',
                            propkey: propkey,
                            ctx: ctx,
                        };

                        var dropzone = new Dropzone(this, dropzoneConfig);
                        var DropzoneEvents = Dropzone.prototype['events'] || [
                            "drop",
                            "dragstart",
                            "dragend",
                            "dragenter",
                            "dragover",
                            "dragleave",
                            "addedfile",
                            "addedfiles",
                            "removedfile",
                            "thumbnail",
                            "error",
                            "errormultiple",
                            "processing",
                            "processingmultiple",
                            "uploadprogress",
                            "totaluploadprogress",
                            "sending",
                            "sendingmultiple",
                            "success",
                            "successmultiple",
                            "canceled",
                            "canceledmultiple",
                            "complete",
                            "completemultiple",
                            "reset",
                            "maxfilesexceeded",
                            "maxfilesreached",
                            "queuecomplete"
                        ];

                        DropzoneEvents.filter(function (e) {
                            if (self.Dropzone[e]) {
                                dropzone.on(e, self.Dropzone[e]);
                            }
                        }, this);

                        Dropzone.options[propkey] = dropzone;
                    });

                });
            }
            self.running = true;

            return self.running;
        };

        /**
         * Dropzone обработчики.
         * @type {object}
         */
        self.Dropzone = {
            addedfile: function (file) {
                this.errors = [];
            },

            queuecomplete: function () {
                if (this.errors.length > 0) {
                    self.Message.error(this.errors.join('<br>'));
                }
            },

            error: function (file, message) {
                self.Message.error(message);

                setTimeout(function () {
                    this.removeFile(file);
                }.bind(this), 1000);
            },

            success: function (file, response) {
                response = response ? JSON.parse(response) : {};
                if (response['success'] === false && response['message'] != '') {
                    this.errors.push(file['name'] + ': ' + response['message']);
                    setTimeout(function () {
                        this.removeFile(file);
                    }.bind(this), 1000);
                } else if (response['object'] && response.object['id']) {
                    $(file.previewElement).attr('data-msof-id', response.object['id']);
                }
            },

            processing: function (file) {
            },

            uploadprogress: function (file, progress, bytesSent) {
            },

            complete: function (file) {
            },

            removedfile: function (file) {
            },
        };

        /**
         * Сообщения.
         * @type {object}
         */
        self.Message = {
            success: function (message) {
            },
            error: function (message) {
                alert(message);
            }
        };

        // Initialize && Run!
        if (self.initialize(options)) {
            self.run();
        }
    }

    window.msOrderFiles = msOrderFiles;
})();