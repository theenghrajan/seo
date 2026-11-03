<?php

// SS Gravity Form Listener
add_filter('gform_confirmation', function ($confirmation, $form, $entry) {
    $formPublicData = array_intersect_key($form, array_flip(['id', 'title']));
    $dataLayerData = [
        'event' => 'gform_submission',
        'form' => $formPublicData,
        'entry' => $entry
    ];

    $dataLayerJson = wp_json_encode($dataLayerData);

    // Text-type confirmation
    if (is_string($confirmation)) {
        $confirmation .= <<<HTML
<script>
window.dataLayer = window.dataLayer || [];
dataLayer.push({$dataLayerJson});
</script>
HTML;
        return $confirmation;
    }

    // Redirect-type confirmation
    if (is_array($confirmation) && !empty($confirmation['redirect'])) {
        $url = esc_url_raw($confirmation['redirect']);
        $url_js = wp_json_encode($url);

        $html = <<<HTML
<script>
window.dataLayer = window.dataLayer || [];
(function() {
  var go = function() { window.location.href = {$url_js}; };
  var data = {$dataLayerJson};
  data.eventCallback = go;
  data.eventTimeout = 3000;
  dataLayer.push(data);
  setTimeout(go, 3200);
})();
</script>
<noscript>
  <meta http-equiv="refresh" content="0;url={$url}">
</noscript>
HTML;
        return $html;
    }

    return $confirmation;
}, PHP_INT_MAX, 3);


// SS Gravity Form Listener (This is old version, but kept for backward compatibility don't to use it)
add_filter('gform_confirmation', function ($confirmation, $form) {
    $isRedirect = isset($confirmation['redirect']) && $confirmation['redirect'];

    $trackingCode = "<script>
    window.dataLayer = window.dataLayer || [];
    window.dataLayer.push({
        event: 'FormSubmission',
        formId: 'gf_{$form['id']}',
        formName: '{$form['title']}'"
        . ($isRedirect ? ",\neventCallback: function(){window.location.href = '" . esc_url_raw($confirmation['redirect']) . "';}" : "") . "
    });
</script>";

    if ($isRedirect) {
        $confirmation = $trackingCode;
    } else {
        $confirmation .= $trackingCode;
    }

    return $confirmation;
}, 10, 2);


?>

<!-- LeadTracker Script (Without Conditional Replacer) -->
<script>
    (function() {
        function loadScript(src, callback) {
            var script = document.createElement('script');
            script.src = src;
            script.async = true;
            script.defer = true;
            script.onreadystatechange = callback;
            script.onload = callback;
            document.body.append(script);
        }

        loadScript("//leadtracker.smartsites.com/jquery-local-2.2.3.js", function() {
            window.jqueryLocal.noConflict(true);

            (function($) {
                /**
                 * Loading LeadTracker script only after the user interacts with the form
                 */
                $(document).on('click mouseenter', 'form', function(event) {
                    if (typeof LeadTracker == 'undefined') {
                        loadScript("//leadtracker.smartsites.com/leadtracker-6.js", function() {
                            /**
                             * Standard LeadTracker code
                             */
                            LeadTracker($)
                                .setGa4Options({
                                    sendTo: ['G-6MN2MED0Y5'],
                                    dimensionKey: 'form_data'
                                })
                                .run();
                        });
                        $(this).off(event);
                    }
                });

            })(window.jqueryLocal);
        });
    })();
</script>


<!-- LeadTracker with Conditional replacer -->
<script>
    (function() {
        function loadScript(src, callback) {
            var script = document.createElement('script');
            script.src = src;
            script.async = true;
            script.defer = true;
            script.onreadystatechange = callback;
            script.onload = callback;
            document.body.append(script);
        }

        loadScript("//leadtracker.smartsites.com/jquery-local-2.2.3.js", function() {
            window.jqueryLocal.noConflict(true);

            (function($) {
                /**
                 * Loading LeadTracker script only after the user interacts with the form
                 */
                $(document).on('click mouseenter', 'form', function(event) {
                    if (typeof LeadTracker == 'undefined') {
                        loadScript("//leadtracker.smartsites.com/leadtracker-6.js", function() {
                            /**
                             * Standard LeadTracker code
                             */
                            LeadTracker($)
                                .setGa4Options({
                                    sendTo: ['G-N0Z2S7CR1G'],
                                    dimensionKey: 'form_data'
                                })
                                .run();
                        });
                        $(this).off(event);
                    }
                });


                loadScript("//leadtracker.smartsites.com/conditional-replacer-3.js", function() {
                    /**
                     * Standard ConditionalReplacer code:
                     */
                    $("[href^='tel:']").each(function() {
                        $(this).attr('href', 'tel:' + $(this).attr('href').replace(/\D/g, ''));
                    });
                    $.each([
                        '(201) 641-2130',
                        '2016412130'

                    ], function(key, phone) {
                        ConditionalReplacer({
                            rootSelector: $('a[href^="tel:"]'),
                            placeholder: phone,
                            conditions: {
                                BY_PARAMS: {
                                    text: "",
                                    params: {
                                        "id": "ppc"
                                    }
                                },
                                SEARCH_ENGINE: {
                                    text: ""
                                },
                                SOCIAL_MEDIA: {
                                    text: "",
                                    domains: ["facebook", "twitter", "linkedin", "instagram", "houzz", "pinterest"]
                                },
                                DIRECT: {
                                    text: ""
                                }
                            }
                        }).run($);
                    });
                });
            })(window.jqueryLocal);
        });
    })();
</script>

<script>
    (function() {
        function loadScript(src, callback) {
            var script = document.createElement('script');
            script.src = src;
            script.async = true;
            script.defer = true;
            script.onreadystatechange = callback;
            script.onload = callback;
            document.body.append(script);
        }

        loadScript("//leadtracker.smartsites.com/jquery-local-2.2.3.js", function() {
            window.jqueryLocal.noConflict(true);

            (function($) {
                /**
                 * Loading LeadTracker script only after the user interacts with the form
                 */
                $(document).on('click mouseenter', 'form', function(event) {
                    if (typeof LeadTracker == 'undefined') {
                        loadScript("//leadtracker.smartsites.com/leadtracker-6.js", function() {

                            /**
                             * Standard LeadTracker code
                             */
                            $('.wpbc_button_light').click(function() {
                                LeadTracker($).sendData($(this).closest('form'));
                            });
                            $('.form-form-submit').click(function() {
                                LeadTracker($).sendData($(this).closest('form'));
                            });
                            LeadTracker($)
                                .setGa4Options({
                                    sendTo: ['G-N43KKE7VE8'],
                                    dimensionKey: 'form_data'
                                })
                                .run();
                        });
                        $(this).off(event);
                    }
                });

                loadScript("//leadtracker.smartsites.com/conditional-replacer-3.js", function() {
                    /**
                     * Standard ConditionalReplacer code:
                     */
                    $("[href^='tel:']").each(function() {
                        $(this).attr('href', 'tel:' + $(this).attr('href').replace(/\D/g, ''));
                    });
                    $.each([
                        '(651) 420-5089',
                        '651-420-5089',
                        '6514205089',
                        '(440) 799-5563',
                        '440-799-5563',
                        '4407995563'
                    ], function(key, phone) {
                        ConditionalReplacer({
                            rootSelector: $('a[href^="tel:"]'),
                            placeholder: phone,
                            conditions: {
                                BY_PARAMS: {
                                    text: "",
                                    params: {
                                        "id": "ppc"
                                    }
                                }
                            }
                        }).run($);
                    });
                });
            })(window.jqueryLocal);
        });
    })();
</script>


<!-- For Review -->
<script>
    (function() {
        function loadScript(src, callback) {
            var script = document.createElement('script');
            script.src = src;
            script.async = true;
            script.defer = true;
            script.onreadystatechange = callback;
            script.onload = callback;
            document.body.append(script);
        }

        loadScript("//leadtracker.smartsites.com/jquery-local-2.2.3.js", function() {
            window.jqueryLocal.noConflict(true);

            (function($) {
                /**
                 * Loading LeadTracker script only after the user interacts with the form
                 */
                $(document).on('click mouseenter', 'form, .form-commercial', function(event) {
                    if (typeof LeadTracker == 'undefined') {
                        loadScript("//leadtracker.smartsites.com/leadtracker-6.js", function() {

                            /**
                             * Standard LeadTracker code
                             */
                            $('.elementor-button-text').click(function() {
                                LeadTracker($).sendData($(this).closest('form'));
                            });
                            $(document).on('click', '#finishbtn', function() {
                                try {
                                    var $src = $(this).closest('.form-commercial');


                                    var $tmpForm = $('<form>', {
                                        style: 'display:none'
                                    });
                                    $src.find('input, textarea, select').each(function() {
                                        if (!this.name) return;
                                        if ((this.type === 'radio' || this.type === 'checkbox') && !this.checked) return;
                                        var val = $(this).val();
                                        if (val === null || val === '') return;
                                        $('<input>', {
                                            type: 'hidden',
                                            name: this.name
                                        }).val(val).appendTo($tmpForm);
                                    });

                                    $('body').append($tmpForm);
                                    LeadTracker($).sendData($tmpForm);
                                    $tmpForm.remove();
                                } catch (e) {
                                    console.warn('LeadTracker sendData error:', e);
                                }
                            });
                            LeadTracker($)
                                .setGa4Options({
                                    sendTo: ['{{SS - GA4 ID}}'],
                                    dimensionKey: 'form_data'
                                })
                                .run();
                        });
                        $(this).off(event);
                    }
                });
                loadScript("//leadtracker.smartsites.com/conditional-replacer-3.js", function() {
                    /**
                     * Standard ConditionalReplacer code:
                     */
                    $("[href^='tel:']").each(function() {
                        $(this).attr('href', 'tel:' + $(this).attr('href').replace(/\D/g, ''));
                    });

                    $.each([
                        '(954) 222-7663',
                        '954-222-7663',
                        '9542227663'
                    ], function(key, phone) {
                        ConditionalReplacer({
                            rootSelector: $('a[href^="tel:"],.phoneinnova, .elementor-icon-box-description'),
                            placeholder: phone,
                            conditions: {
                                BY_PARAMS: {
                                    text: "954-686-6064",
                                    params: {
                                        "id": "ppc"
                                    }
                                },
                            }
                        }).run($);

                        ConditionalReplacer({
                            rootSelector: $('a[href^="tel:"],.phoneinnova, .elementor-icon-box-description'),
                            placeholder: phone,
                            conditions: {
                                BY_PARAMS: {
                                    text: "561-800-0019",
                                    params: {
                                        "id": "ppc2"
                                    }
                                }
                            }
                        }).run($);
                    });

                    window.dataLayer = window.dataLayer || [];
                    window.dataLayer.push({
                        event: "ConditionalReplacer.end"
                    });

                });
            })(window.jqueryLocal);
        });
    })();
</script>

<!-- For Test -->
<script>
    (function() {
        function loadScript(src, callback) {
            var script = document.createElement('script');
            script.src = src;
            script.async = true;
            script.defer = true;
            script.onreadystatechange = callback;
            script.onload = callback;
            document.body.append(script);
        }

        loadScript("//leadtracker.smartsites.com/jquery-local-2.2.3.js", function() {
            window.jqueryLocal.noConflict(true);

            (function($) {
                /**
                 * Loading LeadTracker script only after the user interacts with the form
                 */
                $(document).on('click mouseenter', 'form', function(event) {
                    if (typeof LeadTracker == 'undefined') {
                        loadScript("//leadtracker.smartsites.com/leadtracker-6.js", function() {

                            /**
                             * Standard LeadTracker code
                             */
                            $('.gform_button').click(function() {
                                LeadTracker($).sendData($(this).closest('form'));
                            });
                            LeadTracker($)
                                .setGa4Options({
                                    sendTo: ['G-62XERHQRCR'],
                                    dimensionKey: 'form_data'
                                })
                                .run();
                        });
                        $(this).off(event);
                    }
                });
                loadScript("//leadtracker.smartsites.com/conditional-replacer-3.js", function() {
                    /**
                     * Standard ConditionalReplacer code:
                     */
                    $("[href^='tel:']").each(function() {
                        $(this).attr('href', 'tel:' + $(this).attr('href').replace(/\D/g, ''));
                    });
                    $.each([
                        '(937) 705-9430',
                        '937-705-9430',
                        '9377059430'

                    ], function(key, phone) {
                        ConditionalReplacer({
                            rootSelector: $('a[href^="tel:"]'),
                            placeholder: phone,
                            conditions: {
                                BY_PARAMS: {
                                    text: "937-800-9755",
                                    params: {
                                        "id": "ppc"
                                    }
                                }
                            }
                        }).run($);
                    });

                    $.each([
                        '(561) 922-7888',
                        '561-922-7888',
                        '5619227888'

                    ], function(key, phone) {
                        ConditionalReplacer({
                            rootSelector: $('a[href^="tel:"]'),
                            placeholder: phone,
                            conditions: {
                                BY_PARAMS: {
                                    text: "561-867-0205",
                                    params: {
                                        "id": "ppc"
                                    }
                                }
                            }
                        }).run($);
                    });

                    $.each([
                        '(614) 421-7546',
                        '614-421-7546',
                        '6144217546'

                    ], function(key, phone) {
                        ConditionalReplacer({
                            rootSelector: $('a[href^="tel:"]'),
                            placeholder: phone,
                            conditions: {
                                BY_PARAMS: {
                                    text: "614-612-9936",
                                    params: {
                                        "id": "ppc"
                                    }
                                }
                            }
                        }).run($);
                    });

                });
            })(window.jqueryLocal);
        });
    })();
</script>