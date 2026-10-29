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


